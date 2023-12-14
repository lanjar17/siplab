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
                <form class="form-sample">
                    <div class="form-group mb-3">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control form-control-md" id="nama" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group mb-3">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" class="form-control form-control-md" id="nim" placeholder="NIM">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Telepon">Telepon</label>
                        <input type="number" name="telepon" class="form-control form-control-md" id="telepon" placeholder="Telepon">
                    </div>
                    <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control form-control-md" id="username" placeholder="Username">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control form-control-md" id="password" placeholder="Password">
                    </div>
                    <div class="form-group mb-3">
                        <label for="konfirmasi">Konfirmasi Password</label>
                        <input type="password" name="konfirmasi" class="form-control form-control-md" id="konfirmasi" placeholder="Konfirmasi Password">
                    </div>
                    <div class="form-group mb-3">
                        <label for="instansi">Instansi</label>
                        <select class="form-control">
                            <option>UNS</option>
                            <option>Non UNS</option>
                        </select>
                        <!-- <input type="text" name="instansi" class="form-control form-control-md" id="instansi" placeholder="Instansi"> -->
                    </div>
                </form>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <a class="btn btn-block btn-success btn-md font-weight-medium auth-form-btn" href="#">Daftar</a>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="daftarmodal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Daftar Akun baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none" role="alert" id="alertdaftar"></div>
                    <span id="alertusername"></span>
                    <div class="input-group mb-3">
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-id-card"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" id="usernamedaftar" name="username" class="form-control usernamedaftar" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password2" id="password2" class="form-control" placeholder="Konfirmasi Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" id="nip" name="nip" class="form-control" onkeypress="return isNumberKey(event)" onkeyup="return ceknip()" placeholder="NIP/NIS">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-sort-numeric-up-alt"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="daftar" name="daftar" class="btn btn-primary btn-block btn-flat">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div> -->