<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Tenant Data<strong> Success </strong><?php echo $this->session->flashdata('flash-data'); ?>
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
                    Tenant Data<strong> Success </strong><?php echo $this->session->flashdata('flash-data-hapus'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-4">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>penyewa/tambah" class="btn btn-primary">Added Tenant Data</a>
            <a href="<?= base_url(); ?>penyewa/laporan_pdf" class="btn btn-info">Print Tenant Data</a>
        </div>
    </div>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Find a Tenant" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->
    <div class="row mt-3">

        <div class="col-lg-12" style="margin: 0 auto;">
            <h2>List Tenant</h2>
            <?php if (empty($penyewa)) : ?>
                <div class="alert alert-danger" role="alert">
                    Tenant Data
                </div>
            <?php endif; ?>
            <table class="table table-striped table-bordered" id="listPenyewa">
                <thead>
                    <tr style="background-color:lightblue ;color:white">
                        <td>Tenant Name</td>
                        <td>Gender</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($penyewa as $pyw) : ?>
                        <tr>
                            <td>
                                <?= $pyw->nama_penyewa; ?>
                            </td>
                            <td>
                                <?= $pyw->jenis_kelamin; ?>
                            </td>
                            <td>
                                <a href=" <?php echo base_url(); ?>penyewa/hapusDataPenyewa/<?= $pyw->id_penyewa ?>" class="btn btn-danger float-center" onclick="return confirm('Are you sure you want to delete this data?')">Delete</a>
                                <a href="<?= base_url(); ?>penyewa/edit/<?= $pyw->id_penyewa ?>" class="btn btn-success float-center">Edit</a>
                                <a href="<?php echo base_url(); ?>penyewa/detail/<?= $pyw->id_penyewa ?>" class="btn btn-primary float-center">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>