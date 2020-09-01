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

        <a href="<?= base_url('file/tambah'); ?>" class="btn btn-primary">Tambah </a>

        <div class="table-responsive my-3">
            <table class="table table-striped table-bordered text-center" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">File</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($file as $u) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><img src="<?= base_url('assets/uploads/' . $u->file); ?>" width="50"></td>
                            <td><?= $u->keterangan; ?></td>
                            <td>
                                <a class="btn btn-warning" href="<?= base_url('file/ubah/' . $u->id_file); ?>" role="button">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-danger" href="<?= base_url('file/hapus/' . $u->id_file); ?>" onclick="return confirm('Anda Yakin?')" role="button">
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