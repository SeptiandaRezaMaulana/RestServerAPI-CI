<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data User<strong> Success </strong><?php echo $this->session->flashdata('flash-data'); ?>
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
                    Data User<strong> Success </strong><?php echo $this->session->flashdata('flash-data-hapus'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row mt-3">

        <div class="col-lg-12" style="margin: 0 auto;">
            <h2>User List</h2>
            <?php if (empty($user)) : ?>
                <div class="alert alert-danger" role="alert">
                    User Data Not Found!
                </div>
            <?php endif; ?>
            <table class="table table-striped table-bordered" id="listUser">
                <thead>
                    <tr style="background-color:darkcyan;color:white;font-weight:bold">
                        <td>NIK</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Username</td>
                        <td>Position</td>
                        <td>Level</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($user as $usr) : ?>
                        <tr>
                            <td>
                                <?= $usr->nik ?>
                            </td>
                            <td>
                                <?= $usr->nama ?>
                            </td>
                            <td>
                                <?= $usr->email ?>
                            </td>
                            <td>
                                <?= $usr->username ?>
                            </td>
                            <td>
                                <?= $usr->jabatan ?>
                            </td>
                            <td>
                                <?= $usr->level ?>
                            </td>
                            <td>
                                Success
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>