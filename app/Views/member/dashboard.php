<?php echo $this->extend('member/layout/main'); ?>

<?php echo $this->section('container'); ?>

<div class="main-panel">
    <div id="viewmodal"></div>
    <div class="content-wrapper">
        <?php if (session()->getFlashdata('ahai') != '') { ?>
            <div class="alert alert-success" role="success">
                <?= session()->getFlashdata('ahai'); ?>
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
                                    <div class="card-body text-center">
                                        <img src="<?= base_url('img/logo/' . $r['image']) ?>" alt="" width="200px">
                                        <!-- <i class="mdi mdi-monitor icon-lg"></i> -->
                                        <div class="list align-items-center pt-3">
                                            <div class="wrapper w-100">


                                                <center>

                                                    <p class="mb-0">
                                                        <a href="#" onclick="formpinjam(<?= $r['id_ruangan'] ?>)" class="btn btn-success">Pinjam Ruangan</a>
                                                    </p>
                                                </center>
                                            </div>
                                        </div>
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
    function formpinjam(id_ruangan) {
        $.ajax({
            url: "<?= base_url('/formpinjam/') ?>/" + id_ruangan,
            dataType: "json",
            success: function(response) {
                $('#viewmodal').html(response.data).show();
                $('#pinjammodal').modal('show');
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