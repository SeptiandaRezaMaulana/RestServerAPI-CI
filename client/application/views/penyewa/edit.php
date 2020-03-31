<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card-header">
                Form Edit Tenant Data
            </div>
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors() ?>
                    </div>
                <?php endif ?>
                <form action="" method="POST">
                    <input type="hidden" name="id_penyewa" value="<?= $penyewa->id_penyewa; ?>">
                    <div class="form-group">
                        <label for="nama">Tenant Name :</label>
                        <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa" value="<?= $penyewa->nama_penyewa; ?>">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Phone :</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $penyewa->no_hp; ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Gender :</label>
                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $penyewa->jenis_kelamin; ?>">
                    </div>
                    <a href="<?= base_url('penyewa'); ?>" class="btn btn-primary">Back</a>
                    <button type="submit" name="submit" class="btn btn-success float-right">Update Data</button>
                </form>
            </div>
        </div>
    </div>
</div>