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