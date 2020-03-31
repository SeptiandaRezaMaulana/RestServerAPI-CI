<div class="container mt-3">
    <?php if ($this->session->flashdata('hasil')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('result'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="row mt-4">
            <div class="col-md-6">
                <a href="<?= base_url(); ?>penyewa/tambah" class="btn btn-primary">Added Tenant Data</a>
            </div>
        </div>
        <div class="col-lg-12">
            <h2>List Tenant</h2>
            <table class="table table-striped table-bordered" id="listPenyewa">
                <thead style="background-color: #73326b;color:white">
                    <tr>
                        <th scope="col">Tenant Name</th>
                        <th scope="col">No Handphone</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($penyewa as $pyw) :
                    ?>
                        <tr>
                            <td><?= $pyw['nama_penyewa'] ?></td>
                            <td><?= $pyw['no_hp'] ?></td>
                            <td><?= $pyw['jenis_kelamin'] ?></td>
                            <td><a href="<?= base_url() ?>penyewa/edit/<?= $pyw['id_penyewa'] ?>" class="btn btn-success">Edit</a>
                                <a href="<?= base_url() ?>penyewa/hapus/<?= $pyw['id_penyewa'] ?>" onclick="return confirm('Are you sure you want to delete this data, <?= $pyw['nama_penyewa'] ?> ?');" class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>