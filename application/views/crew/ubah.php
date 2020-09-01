<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="rounded mt-4 mb-3 p-4 bg-white shadow-lg ">
        <h1 class="h3 text-black"><?= $title; ?></h1>
    </div>

    <div class="rounded mt-4 mb-5 p-4 bg-white shadow-lg ">

        <?= form_open(); ?>

        <div class="form-group">
            <label for="nama">Nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : null; ?>" id="nama" name="nama" autocomplete="off" value="<?= $crew->nama; ?>">
            <?= form_error('nama'); ?>
        </div>
        <div class="form-group">
            <label for="gender">Gender <span class="text-danger">*</span></label>
            <select id="gender" class="form-control <?= form_error('gender') ? 'is-invalid' : null; ?>" name="gender">
                <option value="">-- Pilih Gender --</option>
                <option value="Laki-Laki" <?= $crew->gender == 'Laki-Laki' ? 'selected' : ''; ?>>Laki-Laki</option>
                <option value="Perempuan" <?= $crew->gender == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
            </select>
            <?= form_error('gender'); ?>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat <span class="text-danger">*</span></label>
            <input type="text" class="form-control <?= form_error('alamat') ? 'is-invalid' : null; ?>" id="alamat" name="alamat" autocomplete="off" value="<?= $crew->alamat; ?>">
            <?= form_error('alamat'); ?>
        </div>

        <input type="hidden" name="id_crew" value="<?= $crew->id_crew; ?>">

        <a class="mr-2 mt-3 btn btn-warning " href="<?= base_url('crew'); ?>" role="button"> Kembali</a>
        <button class="mt-3 btn btn-primary" type="submit">Ubah </button>

        </form>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php require_once('application/views/templates/footer.php'); ?>