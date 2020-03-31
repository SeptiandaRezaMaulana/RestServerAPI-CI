<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12">
            <h2>Daftar Transaksi</h2>
            <table class="table table-striped table-bordered" id="listTransaksi">
                <thead style="background-color: #6e3158;color:white">
                    <tr>
                        <th scope="col">Tenant Name</th>
                        <th scope="col">Booked Room</th>
                        <th scope="col">Check In</th>
                        <th scope="col">Check Out</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($transaksi as $tr) :
                    ?>
                        <tr>
                            <td><?= $tr['nama_penyewa'] ?></td>
                            <td><?= $tr['nama_kamar'] ?></td>
                            <td><?= $tr['tgl_sewa'] ?></td>
                            <td><?= $tr['tgl_checkout'] ?></td>
                            <td><?= $tr['status'] ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>