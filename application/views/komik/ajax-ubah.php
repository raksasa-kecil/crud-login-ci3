<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="rounded mt-4 mb-3 p-4 bg-white shadow-lg ">
        <h1 class="h3 text-black"><?= $title; ?></h1>
    </div>

    <div class="rounded mt-4 mb-5 p-4 bg-white shadow-lg ">
        <?= form_open(); ?>
        <!-- Button -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cariGenre">
            Cari Genre
        </button>
        <!-- Akhir Button -->

        <div class="form-group">
            <label for="genre">Genre <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="genre" name="genre" value="<?= $komik->genre; ?>" readonly>

            <input type="hidden" name="id_genre" id="id_genre" value="<?= $komik->id_genre ?>">
        </div>
        <div class="form-group">
            <label for="judul">Judul <span class="text-danger">*</span></label>
            <input type="text" class="form-control <?= form_error('judul') ? 'is-invalid' : null; ?>" id="judul" name="judul" value="<?= $komik->judul; ?>">
            <?= form_error('judul') ?>
        </div>
        <div class="form-group">
            <label for="penulis">Penulis <span class="text-danger">*</span></label>
            <input type="text" class="form-control <?= form_error('penulis') ? 'is-invalid' : null; ?>" id="penulis" name="penulis" value="<?= $komik->penulis; ?>">
            <?= form_error('penulis') ?>
        </div>

        <input type="hidden" name="id_komik" value="<?= $komik->id_komik; ?>">

        <a class="mr-2 mt-3 btn btn-warning " href="<?= base_url('komik'); ?>" role="button"> Kembali</a>
        <button class="mt-3 btn btn-primary" type="submit">Ubah </button>

        </form>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="cariGenre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Genre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered text-center" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($genre as $u) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $u->genre ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary getGenre" data-dismiss="modal" data-genre="<?= $u->genre; ?>" data-id="<?= $u->id_genre; ?>">Pilih</button>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal -->

<?php require_once('application/views/templates/footer.php'); ?>

<script>
    $('.getGenre').on('click', function() {
        $('#genre').val($(this).data('genre'))
        $('#id_genre').val($(this).data('id'))
    });
</script>