<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Room Data<strong> Success </strong><?php echo $this->session->flashdata('flash-data'); ?>
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
                    Room Data<strong> Success </strong><?php echo $this->session->flashdata('flash-data-hapus'); ?>
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
                <a href="<?= base_url(); ?>kamar/laporan_pdf" class="btn btn-info">Print Room Data</a>
            <?php
            } else {
            ?>
                <a href="<?= base_url(); ?>kamar/tambah" class="btn btn-primary">Added Room Data</a>
                <a href="<?= base_url(); ?>kamar/laporan_pdf" class="btn btn-info">Print Room Data</a>
            <?php
            }
            ?>

        </div>
    </div>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Nama/Merk Kamar" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->
    <div class="row mt-3">

        <div class="col-lg-12" style="margin: 0 auto;">
            <h2>List Room</h2>
            <?php if (empty($kamar)) : ?>
                <div class="alert alert-danger" role="alert">
                    Room Data
                </div>
            <?php endif; ?>
            <table id="listKamar" class="table table-striped table-bordered">
                <thead>

                    <tr style="background-color:darksalmon;color:white">
                        <td>No</td>
                        <td>Room Name</td>
                        <td>Type</td>
                        <td>Price</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($kamar as $kmr) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <?= $kmr->nama_kamar ?>
                            </td>
                            <td>
                                <?= $kmr->jenis_kamar ?>
                            </td>
                            <td>
                                <?= $kmr->harga ?>
                            </td>
                            <td>
                                <?php
                                $status_login = $this->session->userdata('level');
                                if ($status_login == 'admin' || $status_login == 'user') {
                                ?>
                                    <a href=" <?php echo base_url(); ?>kamar/hapus/<?= $kmr->id_kamar ?>" class="btn btn-danger float-center" onclick="return confirm('Are you sure want to delete this data?')">Delete</a>
                                    <a href="<?= base_url(); ?>kamar/edit/<?= $kmr->id_kamar ?>" class="btn btn-success float-center">Edit</a>
                                    <a href="<?php echo base_url(); ?>kamar/detail/<?= $kmr->id_kamar ?>" class="btn btn-primary float-center">Detail</a>
                                <?php
                                } else {
                                ?>
                                    <a href="<?php echo base_url(); ?>kamar/detail/<?= $kamar->id_kamar ?>" class="btn btn-primary float-center">Detail</a>
                                <?php
                                }
                                ?>
                            </td>
                        <?php
                    }
                        ?>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>