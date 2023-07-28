<?php 



class Berita extends CI_Controller
{
    function listBerita() {
        $dataBerita = $this->mBerita->selectAll('id_berita,judul,gambar,tanggal_post');

        if (count($dataBerita) > 0) {
            foreach ($dataBerita as $index => $value) {
                $dataBerita[$index]->gambar = base_url('images/'.$value->gambar);
            }
            $response = [
                "data" => $dataBerita,
                "status" => 200,
                "error" => "OK",
                "message" => "Fetched all data"
            ];
            die(json_encode($response));
        } else {
             $response = [
                "data" => null,
                "status" => 400,
                "error" => "EMPTY_DATA",
                "message" => "Data is empty"
            ];
            die(json_encode($response));
        }
    }

    function detailBerita($idBerita) {
         $dataBerita = $this->mBerita->selectBy($idBerita);

         //update data gambarnya dengan gabungan baseurl(), sama seperti diatas
         $dataBerita->gambar = base_url('images/'.$dataBerita->gambar);

        if (!empty($dataBerita)) {
            $response = [
                "data" => $dataBerita,
                "status" => 200,
                "error" => "OK",
                "message" => "Fetched all data"
            ];
            die(json_encode($response));
        } else {
             $response = [
                "data" => null,
                "status" => 400,
                "error" => "EMPTY_DATA",
                "message" => "Data is empty"
            ];
            die(json_encode($response));
        }
    }
}



?>