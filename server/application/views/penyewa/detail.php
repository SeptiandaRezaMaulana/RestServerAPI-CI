<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detailed Tenant Information
                </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                        <label for=""><b>Tenant Name :</b></label>
                        <?php echo $penyewa->nama_penyewa; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Phone :</b></label>
                        <?= $penyewa->no_hp; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Gender : </b></label>
                        <?= $penyewa->jenis_kelamin; ?>
                    </p>
                    <a href="<?= base_url('penyewa'); ?>" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>