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
                <form class="form-sample" method="POST" action="/updateruangan/<?= $id_ruangan ?>" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <?= csrf_field() ?>
                    <div class="form-group mb-3">
                        <label for="kode_ruangan">Kode Ruangan</label>
                        <input type="text" name="kode_ruangan" class="form-control form-control-md" id="kode_ruangan" value="<?= $kode_ruangan ?>">
                        <div class="invalid-feedback" id="errornama_lengkap"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_ruangan">Nama Ruangan</label>
                        <input type="text" name="nama_ruangan" class="form-control form-control-md" id="nama_ruangan" value="<?= $nama_ruangan ?>">
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-block btn-success btn-md font-weight-medium auth-form-btn" type="submit">Ubah Ruangan</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>