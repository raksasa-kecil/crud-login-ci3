<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="rounded mt-4 mb-3 p-4 bg-white shadow-lg ">
        <h1 class="h3 text-black"><?= $title; ?></h1>
    </div>

    <!-- Notofikasi -->
    <?php if ($this->session->flashdata('berhasil')) : ?>
        <div class="alert alert-primary my-3" role="alert">
            <?= $this->session->flashdata('berhasil'); ?>
        </div>
    <?php endif ?>
    <!-- End Notifikasi -->

    <div class="rounded mt-4 mb-5 p-4 bg-white shadow-lg ">

        <a href="<?= base_url('komik/tambah'); ?>" class="btn btn-primary">Tambah </a>
        <a href="<?= base_url('komik/ajaxtambah'); ?>" class="btn btn-success">Tambah </a>

        <div class="table-responsive my-3">
            <table class="table table-striped table-bordered text-center" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($komik as $u) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $u->genre; ?></td>
                            <td><?= $u->judul; ?></td>
                            <td><?= $u->penulis; ?></td>
                            <td>
                                <a class="btn btn-warning" href="<?= base_url('komik/ubah/' . $u->id_komik); ?>" role="button">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-success" href="<?= base_url('komik/ajaxubah/' . $u->id_komik); ?>" role="button">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-danger" href="<?= base_url('komik/hapus/' . $u->id_komik); ?>" onclick="return confirm('Anda Yakin?')" role="button">
                                    <i class="fa fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php require_once('application/views/templates/footer.php'); ?>