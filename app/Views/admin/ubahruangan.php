<div class="modal fade" id="ubahruanganmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Ubah Ruangan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form class="form-sample" method="POST" action="" enctype="multipart/form-data">
                    <input type="hidden" id="id_ruangan" name="id_ruangan" value="<?=$id_ruangan ?>">
                    <?= csrf_field() ?>
                    <div class="form-group mb-3">
                        <label for="id_ruangan">Kode Ruangan</label>
                        <input type="text" name="id_ruangan" class="form-control form-control-md" id="id_ruangan" value="<?=$kode_ruangan ?>">
                        <div class="invalid-feedback" id="errornama_lengkap"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_ruangan">Nama Ruangan</label>
                        <input type="text" name="nama_ruangan" class="form-control form-control-md" id="nama_ruangan" value="<?=$nama_ruangan ?>">
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-block btn-success btn-md font-weight-medium auth-form-btn" type="submit">Ubah Ruangan</button>
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