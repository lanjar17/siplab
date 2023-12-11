<?php echo $this->extend('admin/layout/main'); ?>

<?php echo $this->section('container'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                        <div>
                            <div class="btn-wrapper">
                                <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                                <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                                <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table id="datatabel">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>NIM</th>
                    <th>Telepon</th>
                    <th>Avatar</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($user as $u) : ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $u['nama_lengkap']; ?></td>
                        <td><?php echo $u['username']; ?></td>
                        <td><?php echo $u['nip']; ?></td>
                        <td><?php echo $u['no_telp']; ?></td>
                        <td>
                            <?php if (!file_exists(ROOTPATH . "public\img\avatar\\" . $u['image'])) { ?>
                                <img src="<?= $u['image'] ?>" width="100px">
                        </td> <?php } else { ?>
                        <img src="<?= base_url('/img/avatar/' . $u['image']) ?>" width="100px"></td>
                        <?php  } ?>

                        <td>
                        <button type="button" class="btn btn-success btn-rounded btn-fw">Terima</button>
                        <button type="button" class="btn btn-danger btn-rounded btn-fw">Tolak</button>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- <div class="row pt-4">
            <div class=" col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Default form</h4>
                        <p class="card-description">
                            Basic form layout
                        </p>
                        <form class="forms-sample">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Username</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Confirm Password</label>
                                <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                            </div>
                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- content-wrapper ends -->

    </div>
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<script>
    new DataTable('#datatabel');
</script>
<?php echo $this->endSection(); ?>