<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Berita</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Berita
                            </div>
                            <div class="card-body">

                                <a href="<?= base_url('Berita/formTambah')?>" class="btn btn-primary">Tambah Data Berita</a><br><br>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Tanggal Post</th>
                                            <th>Gambar</th>
                                            <th>Content</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataBerita as $index => $item) : ?>
                                        <tr>
                                            <td><?= $index += 1 ?></td>
                                            <td><?= $item->judul ?></td>
                                            <td><?= $item->tanggal_post ?></td>
                                            <td>
                                                <img src="<?= base_url('images/' . $item->gambar)?>" alt="<?= $item->gambar?>" width="150" height="150">
                                            </td>
                                            <td><?= $item->content ?></td>
                                            <td>
                                               <a href="<?= base_url('Berita/formUbah/' . $item->id_berita)?>" class="btn btn-warning">Ubah</a>
                                               <a href="<?= base_url('Berita/hapus/' . $item->id_berita)?>" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>