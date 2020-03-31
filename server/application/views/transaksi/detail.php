<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Transaction Detail
                </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                        <label for=""><b>Name :</b></label>
                        <?php echo $transaksi->nama_penyewa; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Booked Room :</b></label>
                        <?= $transaksi->nama_kamar; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Type Room :</b></label>
                        <?= $transaksi->jenis_kamar; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Check In :</b></label>
                        <?= $transaksi->tgl_sewa; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Check Out :</b></label>
                        <?= $transaksi->tgl_checkout; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Status :</b></label>
                        <?= $transaksi->status; ?>
                    </p>

                    <a href="<?= base_url(); ?>transaksi" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>