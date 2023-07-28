<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Berita</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Ubah</li>
            </ol>
        <form action="<?= base_url('Berita/ubah/'.$dataBerita->id_berita)?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Judul</label>
                <input type="text" name="judul" value="<?= $dataBerita->judul?>" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="">Gambar</label>
                <img src="<?= base_url('images/'.$dataBerita->gambar)?>" alt="" width="150" height="150"><br><br>
                <input type="file" name="gambar" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="">Content</label><br>
                <textarea name="content" id="" cols="30" rows="5" class="form-control"><?= $dataBerita->content?></textarea>
            </div><br>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
</main>