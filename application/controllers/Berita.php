<?php 



class Berita extends CI_Controller
{
    function index() {
        $data['dataBerita'] = $this->mBerita->selectAll();

        //cara untuk manggil file viewnya
        $page = [
            "page" => $this->load->view('backend/berita', $data, true)
        ];

        //panggil file main dengan page berita
        return $this->load->view('backend/main', $page);
    }

    function formTambah() {
        $page = [
            "page" => $this->load->view('backend/tambah', null, true)
        ];

        //panggil file main dengan page berita
        return $this->load->view('backend/main', $page);
    }

    function tambah() {
        $data = $this->input->post();
        $data['id_berita'] = rand(11111,99999);

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = time() . '.png';
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar')) {
            $image = $this->upload->data();
            $data['gambar'] = $image['file_name'];

            $insert = $this->mBerita->insert($data);
            if ($insert > 0) {
                echo "
                    <script>
                        alert('Data berhasil di tambah');
                        window.location.href = '". base_url('Berita/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di tambah');
                        window.location.href = '". base_url('Berita/index') ."';
                    </script>
                ";
            }
        }
        echo "
            <script>
                alert('".$this->upload->display_errors()."');
                    window.location.href = '". base_url('Berita/index') ."';
                </script>
            ";
    }

    function formUbah($idBerita) {
        $data['dataBerita'] = $this->mBerita->selectBy($idBerita);
        // die(json_encode($data['dataBerita']));
        $page = [
            "page" => $this->load->view('backend/ubah', $data, true)
        ];

        //panggil file main dengan page berita
        return $this->load->view('backend/main', $page);
    }

    function ubah($idBerita) {
        $data = $this->input->post();

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = time() . '.png';
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        if (!file_exists($_FILES['gambar']['tmp_name'])) {
            $update = $this->mBerita->update($idBerita, $data);
            if ($update) {
                echo "
                    <script>
                        alert('Data berhasil di update');
                        window.location.href = '". base_url('Berita/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di update');
                        window.location.href = '". base_url('Berita/index') ."';
                    </script>
                ";
            }
        }
        if ($this->upload->do_upload('gambar')) {
            $image = $this->upload->data();
            $data['gambar'] = $image['file_name'];

            $update = $this->mBerita->update($idBerita, $data);
            if ($update) {
                echo "
                    <script>
                        alert('Data berhasil di update');
                        window.location.href = '". base_url('Berita/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di update');
                        window.location.href = '". base_url('Berita/index') ."';
                    </script>
                ";
            }
        }
        echo "
            <script>
                alert('".$this->upload->display_errors()."');
                    window.location.href = '". base_url('Berita/index') ."';
                </script>
            ";

    }

    function hapus($idBerita){
        $oldData = $this->mBerita->selectBy($idBerita);
        
        if (file_exists('images/'. $oldData->gambar)) {
            unlink('images/'. $oldData->gambar);
        }

        $delete = $this->mBerita->delete($idBerita);

        if ($delete) {
                echo "
                    <script>
                        alert('Data berhasil di hapus');
                        window.location.href = '". base_url('Berita/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di hapus');
                        window.location.href = '". base_url('Berita/index') ."';
                    </script>
                ";
            }
    }

}



?>