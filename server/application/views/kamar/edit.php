<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card-header">
                Form Edit Data Room
            </div>
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors() ?>
                    </div>
                <?php endif ?>
                <form action="" method="POST">
                    <input type="hidden" name="id_kamar" value="<?= $kamar->id_kamar; ?>">
                    <div class="form-group">
                        <label for="nama_kamar">Room Name :</label>
                        <input type="text" class="form-control" id="nama_kamar" name="nama_kamar" value="<?= $kamar->nama_kamar; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kamar">Type Room :</label>
                        <input type="text" class="form-control" id="jenis_kamar" name="jenis_kamar" value="<?= $kamar->jenis_kamar; ?>">
                    </div>
                    <div class="form-group">
                        <label for="harga">Price :</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?= $kamar->harga; ?>">
                    </div>
                    <a href="<?= base_url('kamar'); ?>" class="btn btn-primary">Back</a>
                    <button type="submit" name="submit" class="btn btn-success float-right">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>