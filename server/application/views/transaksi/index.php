<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Transaction Data<strong> Success </strong><?php echo $this->session->flashdata('flash-data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('flash-data-hapus')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Transaction Data<strong> Success </strong><?php echo $this->session->flashdata('flash-data-hapus'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-4">
        <div class="col-md-6">
            <?php
            if ($this->session->userdata('level') == "user") {
            ?>
                <a href="<?= base_url(); ?>transaksi/laporan_pdf" class="btn btn-info">Print Transaction Data</a>
            <?php
            } else {
            ?>
                <a href="<?= base_url(); ?>transaksi/tambah" class="btn btn-primary">Added</a>
                <a href="<?= base_url(); ?>transaksi/laporan_pdf" class="btn btn-info">Print Transaction Data</a>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Transaksi" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->
    <div class="row mt-3">
        <div class="col-lg-12">
            <h2>Transaction List</h2>

            <?php if (empty($transaksi)) : ?>
                <div class="alert alert-danger" role="alert">
                    Transaction Data Not Found!
                </div>
            <?php endif; ?>
            <table class="table table-striped table-bordered" id="listTransaksi">
                <thead>
                    <tr style="background-color: pink;color:white">
                        <td>Tenant Name</td>
                        <td>Room Name</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($transaksi as $trans) :
                        // $tanggalAwal = $trans->tanggal_pinjam;
                        // $newDate = date("d-m-Y", strtotime($tanggalAwal));
                    ?>
                        <tr>
                            <!-- <td>
                                <?= $newDate ?>
                            </td> -->
                            <td>
                                <?= $trans->nama_penyewa ?>
                            </td>
                            <td>
                                <?= $trans->nama_kamar ?> <?= $trans->jenis_kamar ?>
                            </td>
                            <td>
                                <?= $trans->status ?>
                            </td>
                            <?php
                            if ($trans->status == "FREE" or $trans->status == "BOOKED") {
                            ?>
                                <td>
                                    <a href="<?php echo base_url(); ?>transaksi/detail/<?= $trans->id_transaksi ?>" class="btn btn-primary float-center">Detail</a>
                                </td>
                            <?php
                            } else {
                            ?>
                                <td>
                                    <?php
                                    $status_login = $this->session->userdata('level');
                                    if ($status_login == 'user') {
                                    ?>
                                        <a href="<?php echo base_url(); ?>transaksi/detail/<?= $trans->id_transaksi ?>" class="btn btn-primary float-center">Detail</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="<?= base_url(); ?>transaksi/edit/<?= $trans->id_transaksi ?>" class="btn btn-success float-center">Edit</a>
                                        <a href="<?php echo base_url(); ?>transaksi/detail/<?= $trans->id_transaksi ?>" class="btn btn-primary float-center">Detail</a>
                                    <?php
                                    }
                                    ?>
                                </td>
                        </tr>
                <?php
                            }
                        endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>