<?php echo $this->extend('member/layout/main'); ?>

<?php echo $this->section('container'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div id="viewmodal"></div>
        <?php if (session()->getFlashdata('yes') != '') { ?>
            <div class="alert alert-success" role="success">
                <?= session()->getFlashdata('yes'); ?>
            </div>
        <?php } ?>
        <?php if (session()->getFlashdata('eror1') != '') { ?>
            <div class="alert alert-danger" role="danger">
                <?= session()->getFlashdata('eror1'); ?>
            </div>
        <?php } ?>
        <div class="container pt-4">
            <section class="mb-4">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center"><strong><?= $nama ?></strong></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-8">
                            <table class="table table-striped">
                                <tr>
                                    <th>Nama</th>
                                    <td><?= $item['nama_lengkap'] ?></td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td><?= $item['username'] ?></td>
                                </tr>
                                <tr>
                                    <th>NIM</th>
                                    <td><?= $item['nip'] ?></td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <td><?= $item['telepon'] ?></td>
                                </tr>
                            </table>
                        </div>

                        <div class="col col-4">
                            <div class="card text-center">
                                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                    <img src="/img/avatar/<?= $item['avatar'] ?>" class="img-fluid" width="250px">
                                    <a href="">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <a href="#" class="btn btn-info" id="edit" onclick="edit(<?= $item['id_user'] ?>)">Edit Profil</a>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </section>
            <!-- Section: Main chart -->
        </div>
    </div>
    <!-- page-body-wrapper ends -->
</div>
</div>

<script>
    function edit(id_user) {
        $.ajax({
            url: "<?= base_url('editprofil/') ?>" + id_user,
            dataType: "json",
            success: function(response) {
                $('#viewmodal').html(response.data).show();
                $('#editmodal').modal('show');
            }
        });
    }
</script>

<script>
    $(document).ready(function() {
        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                success: function(response) {
                    if (response.error) {
                        if (response.error.nama_lengkap) {
                            $('#nama_lengkap').addClass('is-invalid');
                            $('#errornama_lengkap').html(response.error.nama_lengkap);
                        } else {
                            $('#nama_lengkap').removeClass('is-invalid');
                            $('#errornama_lengkap').html('');
                        }

                        if (response.error.username) {
                            $('#username').addClass('is-invalid');
                            $('#errorusername').html(response.error.username);
                        } else {
                            $('#username').removeClass('is-invalid');
                            $('#errorusername').html('');
                        }

                        if (response.error.password) {
                            $('#password').addClass('is-invalid');
                            $('#errorpassword').html(response.error.password);
                        } else {
                            $('#password').removeClass('is-invalid');
                            $('#errorpassword').html('');
                        }

                        if (response.error.konfirmasi) {
                            $('#konfirmasi').addClass('is-invalid');
                            $('#errorkonfirmasi').html(response.error.konfirmasi);
                        } else {
                            $('#konfirmasi').removeClass('is-invalid');
                            $('#errorkonfirmasi').html('');
                        }
                    } else {
                        alert(response.sukses);
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.sukses,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        })
                        $('#editmodal').modal('hide');

                    }

                }
            });
        });
    })
</script>
<?php echo $this->endSection(); ?>