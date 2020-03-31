<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card-header">
                Form Edit Data Transaksi
            </div>
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors() ?>
                    </div>
                <?php endif ?>
                <p class="card-text">
                    <label for=""><b>Tenant Name :</b></label>
                    <?php echo $transaksi->nama_penyewa; ?>
                </p>
                <p class="card-text">
                    <label for=""><b>Room Booked :</b></label>
                    <?= $transaksi->nama_kamar; ?>
                </p>
                <p class="card-text">
                    <label for=""><b>Room Type :</b></label>
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
                <form action="" method="POST">
                    <input type="hidden" name="id_kamar" value="<?= $transaksi->id_kamar; ?>">
                    <input type="hidden" name="id_transaksi" value="<?= $transaksi->id_transaksi; ?>">
                    <div class="form-group">
                        <label for="tgl_checkout">Check Out :</label>
                        <input type="date" class="form-control" id="tgl_checkout" name="tgl_checkout">
                    </div>
                    <div class="form-group">
                        <label for="status">Status Peminjaman</label>
                        <select name="status" class="form-control" id="status" name="status">
                            <option selected>Pilih Status</option>
                            <option value="Ready">Ready</option>
                            <option value="Booked">Booked</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success float-right">Submit</button>
                </form>
                <a href="<?= base_url(); ?>transaksi" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</div>