<?php echo $this->extend('admin/layout/main'); ?>

<?php echo $this->section('container'); ?>

<div class="main-panel">
    <div id="viewmodal"></div>
    <div class="content-wrapper">
        <?php if (session()->getFlashdata('ahai') != '') { ?>
            <div class="alert alert-success" role="success">
                <?= session()->getFlashdata('ahai'); ?>
            </div>
        <?php } ?>
        <?php if (session()->getFlashdata('congrats') != '') { ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('congrats'); ?>
            </div>
        <?php } ?>

        <div class="row">
            <?php foreach ($ruangan as $r) : ?>
                <div class="col-lg-4 d-flex flex-column">
                    <div class="row flex-grow">
                        <div class="grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body card-rounded">
                                    <div class="align-items-center justify-content-between mb-2 text-center">
                                        <h4 class="card-title card-title-dash"><?php echo $r['nama_ruangan']; ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="image text-center">
                                            <img src="<?= base_url('img/logo/' . $r['image']) ?>" alt="" width="200px">
                                        </div>

                                        <!-- <i class="mdi mdi-monitor icon-lg"></i> -->
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th class="card-title card-title-dash">Kode</th>
                                                    <td>:</td>
                                                    <td><?php echo $r['kode_ruangan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="card-title card-title-dash">Nama</th>
                                                    <td>:</td>
                                                    <td><?php echo $r['nama_ruangan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="text-center">
                                                        <a href="#" onclick="ubahruangan(<?= $r['id_ruangan'] ?>)" class="btn btn-success">Ubah Ruangan</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>
<!-- page-body-wrapper ends -->
</div>

<script>
    function ubahruangan(id_ruangan) {
        $.ajax({
            url: "<?= base_url('/ubahruangan/') ?>" + id_ruangan,
            dataType: "json",
            success: function(response) {
                $('#viewmodal').html(response.data).show();
                $('#ubahruanganmodal').modal('show');
                // Set nilai opsi ruangan yang dipilih secara otomatis
                $('#id_ruangan').val(id_ruangan); // Mengatur nilai opsi yang dipilih
            }
        });

    };

    $(document).ready(function() {
        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(response) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: response.sukses,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })
                    $('#pinjammodal').modal('hide');
                }
            });
        });

    });
</script>
<?php echo $this->endSection(); ?>