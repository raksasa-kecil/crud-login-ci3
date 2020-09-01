<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="rounded mt-4 mb-3 p-4 bg-white shadow-lg ">
        <h1 class="h3 text-black"><?= $title; ?></h1>
    </div>

    <div class="rounded mt-4 mb-5 p-4 bg-white shadow-lg ">
        <?= form_open_multipart(); ?>

        <div class="form-group">
            <label for="nama">Nama Lengkap <span class="text-danger">*</span></label>
            <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : null; ?>" id="nama" name="nama" autocomplete="off" value="<?= $user->nama; ?>">
            <?= form_error('nama'); ?>
        </div>
        <div class="form-group">
            <label for="level">Level <span class="text-danger">*</span></label>
            <select id="level" class="form-control <?= form_error('level') ? 'is-invalid' : null; ?>" name="level">
                <option value="">-- Pilih Level --</option>
                <option value="Admin" <?= $user->level == 'Admin' ? 'selected' : ''; ?>>Admin</option>
                <option value="Operator" <?= $user->level == 'Operator' ? 'selected' : ''; ?>>Operator</option>
            </select>
            <?= form_error('level'); ?>
        </div>
        <div class="form-group">
            <label for="foto">File <span class="text-danger">* (Max Size 500kb)</span></label>
            <input type="file" class="form-control-file" name="foto" id="foto">
            <img src="<?= base_url('assets/uploads/profile/' . $user->foto); ?>" width="250">

            <input type="hidden" name="fotoLama" value="<?= $user->foto; ?>">
        </div>

        <input type="hidden" name="id_user" value="<?= $user->id_user; ?>">

        <a class="mr-2 mt-3 btn btn-warning " href="<?= base_url('user'); ?>" role="button"> Kembali</a>
        <button class="mt-3 btn btn-primary" type="submit">Ubah </button>

        </form>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php require_once('application/views/templates/footer.php'); ?>