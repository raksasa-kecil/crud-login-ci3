<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="rounded mt-4 mb-3 p-4 bg-white shadow-lg ">
        <h1 class="h3 text-black"><?= $title; ?></h1>
    </div>

    <div class="rounded mt-4 mb-5 p-4 bg-white shadow-lg ">
        <?= form_open(); ?>

        <div class="form-group">
            <label for="genre">Genre <span class="text-danger">*</span></label>
            <input type="text" class="form-control <?= form_error('genre') ? 'is-invalid' : null; ?>" id="genre" name="genre" autocomplete="off" value="<?= $genre->genre; ?>">
            <?= form_error('genre'); ?>
        </div>

        <input type="hidden" name="id_genre" value="<?= $genre->id_genre; ?>">

        <a class="mr-2 mt-3 btn btn-warning " href="<?= base_url('genre'); ?>" role="button"> Kembali</a>
        <button class="mt-3 btn btn-primary" type="submit">Ubah </button>

        </form>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php require_once('application/views/templates/footer.php'); ?>