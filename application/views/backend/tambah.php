<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Berita</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        <form action="<?= base_url('Berita/tambah')?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Judul</label>
                <input type="text" name="judul" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Gambar</label>
                <input type="file" name="gambar" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="">Content</label><br>
                <textarea name="content" id="" cols="30" rows="5" class="form-control"></textarea>
            </div><br>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</main>