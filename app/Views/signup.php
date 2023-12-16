<div class="modal fade" id="daftarmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Daftar Member</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form class="form-sample" method="POST" action="/daftar" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group mb-3">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control form-control-md" id="nama_lengkap" placeholder="Nama Lengkap">
                        <div class="invalid-feedback" id="errornama_lengkap"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nip">NIM</label>
                        <input type="text" name="nip" class="form-control form-control-md" id="nip" placeholder="NIM">
                    </div>
                    <div class="form-group mb-3">
                        <label for="telepon">Telepon</label>
                        <input type="number" name="telepon" class="form-control form-control-md" id="telepon" placeholder="Telepon">
                    </div>
                    <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control form-control-md" id="username" placeholder="Username">
                        <div class="invalid-feedback" id="errorusername"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control form-control-md" id="password" placeholder="Password">
                        <div class="invalid-feedback" id="errorpassword"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="konfirmasi">Konfirmasi Password</label>
                        <input type="password" name="konfirmasi" class="form-control form-control-md" id="konfirmasi" placeholder="Konfirmasi Password">
                        <div class="invalid-feedback" id="errorkonfirmasi"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="instansi">Instansi</label>
                        <select class="form-control" name="instansi">
                            <option value="">Pilih Instansi</option>
                            <option value="UNS">UNS</option>
                            <option value="Non-UNS">Non UNS</option>
                        </select>
                        <!-- <input type="text" name="instansi" class="form-control form-control-md" id="instansi" placeholder="Instansi"> -->
                    </div>
                    <div class="form-group mb-3">
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" class="form-control form-control-lg" id="avatar" placeholder="Avatar">
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-block btn-success btn-md font-weight-medium auth-form-btn" type="submit">Daftar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                // type: $(this).attr('method'),
                // url: $(this).attr('action'),
                // data: new FormData(this),
                // processData: false,
                // contentType: false,
                // beforeSend: function() {
                //     $('#submit').attr('disable', 'disabled');
                //     $('#submit').html('<i class="fa fa-spin fa-spinner"></i>');
                // },
                // complete: function() {
                //     $('#submit').removeAttr('disable');
                //     $('#submit').html('Insert Data');
                // },
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
                        // Swal.fire({
                        //     title: 'Berhasil!',
                        //     text: response.sukses,
                        //     icon: 'success',
                        //     confirmButtonText: 'Ok'
                        // })
                        $('#daftarmodal').modal('hide');
                        
                    }

                }
            });
        });
    })
</script>