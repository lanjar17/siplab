<div class="modal fade" id="pinjammodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Pinjam Ruangan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">

                <form class="form-sample" method="POST" action="/pinjam" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="form-group mb-3">
                        <label for="nama_lengkap">Username</label>
                        <input type="text" name="username" class="form-control form-control-md" id="username" placeholder="" readonly value="<?= $user ?>">
                        <div class="invalid-feedback" id="errornama_lengkap"></div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Ruangan</label>
                        <!-- <input type="text" name="nip" class="form-control form-control-md" id="nip" placeholder="NIM"> -->
                        <select id="id_ruangan" name="id_ruangan" class="form-control">
                            <?php foreach ($ruang as $r) { ?>
                                <option value="<?= $r['id_ruangan'] ?>"><?= $r['kode_ruangan'] ?> - <?= $r['nama_ruangan'] ?></option>
                            <?php } ?>
                        </select>

                    </div>

                    <div class="form-group mb-3">
                        <label for="telepon">Jam Mulai</label>
                        <input type="text" name="telepon" class="form-control form-control-md" id="telepon" value="<?php $time = new DateTime(date('H:i'));
                                                                                                                    $time->modify('+1 hours');
                                                                                                                    echo $time->format('H:i'); ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="username">Jam Selesai</label>
                        <input type="text" name="username" class="form-control form-control-md" id="username" value="<?php $time = new DateTime(date('H:i'));
                                                                                                                        $time->modify('+2 hours');
                                                                                                                        echo $time->format('H:i'); ?>">
                        <div class="invalid-feedback" id="errorusername"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Tanggal</label>
                        <input type="date" name="password" class="form-control form-control-lg" id="password" value="<?php echo date('Y-m-d', time()); ?>">
                        <div class="invalid-feedback" id="errorpassword"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="instansi">Keterangan Peminjaman</label>
                        <select class="form-control" name="instansi">
                            <option value="">Keterangan</option>
                            <option value="UNS">UNS</option>
                            <option value="Non-UNS">Non UNS</option>
                        </select>
                        <!-- <input type="text" name="instansi" class="form-control form-control-md" id="instansi" placeholder="Instansi"> -->
                    </div>
                    <div class="form-group mb-3">
                        <label for="avatar">Bukti Pembayaran</label>
                        <input type="file" name="avatar" class="form-control form-control-lg" id="avatar" placeholder="Bukti Pembayaran">
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-block btn-success btn-md font-weight-medium auth-form-btn" type="submit">Daftar</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>