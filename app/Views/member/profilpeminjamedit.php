<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit Profil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form class="form-sample" method="POST" action="/editprofil/updateprofil/<?= $id_user ?>" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <?= csrf_field() ?>
                    <div class="form-group mb-3">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control form-control-md" id="nama_lengkap" value="<?= $nama_lengkap ?>">
                        <div class="invalid-feedback" id="errornama_lengkap"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nip">NIM</label>
                        <input type="text" name="nip" class="form-control form-control-md" id="nip" value="<?= $nip ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="telepon">Telepon</label>
                        <input type="number" name="telepon" class="form-control form-control-md" id="telepon" value="<?= $telepon ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" class="form-control form-control-lg" id="avatar" placeholder="Avatar">
                        <input type="hidden" id="avalama" name="avalama" value="<?= $avatar ?>" />
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-block btn-success btn-md font-weight-medium auth-form-btn" type="submit">Update</button>
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
                success: function(response) {
                    if (response.error) {
                        if (response.error.nama_lengkap) {
                            $('#nama_lengkap').addClass('is-invalid');
                            $('#errornama_lengkap').html(response.error.nama_lengkap);
                        } else {
                            $('#nama_lengkap').removeClass('is-invalid');
                            $('#errornama_lengkap').html('');
                        }
                    } else {
                        alert(response.sukses);
                        // Swal.fire({
                        //     title: 'Berhasil!',
                        //     text: response.sukses,
                        //     icon: 'success',
                        //     confirmButtonText: 'Ok'
                        // })
                        $('#editmodal').modal('hide');

                    }

                }
            });
        });
    })
</script>