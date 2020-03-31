<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detailed Room Information
                </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                        <label for=""><b>Room Name :</b></label>
                        <?php echo $kamar->nama_kamar; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Type Room :</b></label>
                        <?= $kamar->jenis_kamar; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Price :</b></label>
                        <?= $kamar->harga; ?>
                    </p>
                    <a href="<?= base_url('kamar'); ?>" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>