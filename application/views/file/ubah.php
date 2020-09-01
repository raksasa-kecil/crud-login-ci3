<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="rounded mt-4 mb-3 p-4 bg-white shadow-lg ">
        <h1 class="h3 text-black"><?= $title; ?></h1>
    </div>

    <div class="rounded mt-4 mb-5 p-4 bg-white shadow-lg ">
        <?= form_open_multipart(); ?>
        <div class="form-group">
            <label for="keterangan">Keterangan <span class="text-danger">*</span></label>
            <input type="text" class="form-control <?= form_error('keterangan') ? 'is-invalid' : null; ?>" id="keterangan" name="keterangan" autocomplete="off" value="<?= $file->keterangan; ?>">
            <?= form_error('keterangan'); ?>
        </div>
        <div class="form-group">
            <label for="file">File <span class="text-danger">* </span></label>
            <input type="file" class="form-control-file" name="file" id="file">
            <img src="<?= base_url('assets/uploads/' . $file->file); ?>" width="250">

            <input type="hidden" name="fileLama" value="<?= $file->file; ?>">
        </div>

        <input type="hidden" name="id_file" value="<?= $file->id_file; ?>">

        <a class="mr-2 mt-3 btn btn-warning " href="<?= base_url('file'); ?>" role="button"> Kembali</a>
        <button class="mt-3 btn btn-primary" type="submit">Ubah </button>

        </form>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php require_once('application/views/templates/footer.php'); ?>