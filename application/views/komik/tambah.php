<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="rounded mt-4 mb-3 p-4 bg-white shadow-lg ">
        <h1 class="h3 text-black"><?= $title; ?></h1>
    </div>

    <div class="rounded mt-4 mb-5 p-4 bg-white shadow-lg ">
        <?= form_open(); ?>
        <div class="form-group">
            <label for="id_genre">Pilih Genre <span class="text-danger">*</span></label>
            <select class="form-control <?= form_error('id_genre') ? 'is-invalid' : null; ?> " id="id_genre" name="id_genre">
                <option value="">--Pilih Genre--</option>
                <?php foreach ($genre as $k) : ?>
                    <option value="<?= $k->id_genre ?>"><?= $k->genre ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('id_genre') ?>
        </div>
        <div class="form-group">
            <label for="judul">Judul <span class="text-danger">*</span></label>
            <input type="text" class="form-control <?= form_error('judul') ? 'is-invalid' : null; ?>" id="judul" name="judul">
            <?= form_error('judul') ?>
        </div>
        <div class="form-group">
            <label for="penulis">Penulis <span class="text-danger">*</span></label>
            <input type="text" class="form-control <?= form_error('penulis') ? 'is-invalid' : null; ?>" id="penulis" name="penulis">
            <?= form_error('penulis') ?>
        </div>

        <a class="mr-2 mt-3 btn btn-warning " href="<?= base_url('komik'); ?>" role="button"> Kembali</a>
        <button class="mt-3 btn btn-primary" type="submit">Tambah </button>

        </form>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php require_once('application/views/templates/footer.php'); ?>