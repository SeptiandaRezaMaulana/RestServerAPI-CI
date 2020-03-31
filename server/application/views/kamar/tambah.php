<div class="container">
    <div class="row mt-3">
        <div class="col-md-6" style="margin: 0 auto;">
            <div class="card-header" style="background-color: limegreen;color:white">
                Form Add Data Room
            </div>
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors() ?>
                    </div>
                <?php endif ?>
                <?php echo form_open_multipart() ?>
                <!-- <form action="" method="POST"> -->
                    <div class="form-group">
                        <label for="nama">Room Name</label>
                        <input type="text" class="form-control" name="nama_kamar">
                        <label for="nama" style="margin-top: 10px">Type Room</label>
                        <input type="text" class="form-control" name="jenis_kamar">
                        <label for="no_hp" style="margin-top: 10px">Price</label>
                        <input type="number" class="form-control" name="harga">
                        <label for="gambar" style="margin-top: 10px">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary float-right">Add Data Room</button>
                <!-- </form> -->
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>