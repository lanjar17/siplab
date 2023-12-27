<?php echo $this->extend('member/layout/main'); ?>

<?php echo $this->section('container'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-3 d-flex flex-column">
            <div class="row flex-grow">
                <div class="grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body card-rounded">
                            <div class="align-items-center justify-content-between mb-2 text-center">
                                <h4 class="card-title card-title-dash mb-2"></h4>
                            </div>
                            <div class="card-body text-center">
                                <!-- <i class="mdi mdi-monitor icon-lg"></i> -->
                                <div class="list align-items-center">
                                    <div class="wrapper w-100">
                                        <center>
                                            <p class="mb-0">
                                                <a href="<?php echo "/profiluser/" . $id_user; ?>" class="btn btn-success">Lihat Profil</a>
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
    </div>
    <!-- Section: Main chart -->
</div>
</div>
</div>
</div>
</div>
</div>

<script>
    function tampilkanUser(id_user) {
        $.ajax({
            url: "<?= base_url('/profildata/') ?>" + id_user,
            dataType: "json",
            success: function(response) {
                $('#viewdata').html('');
                $('#viewdata').html(response.data);
            }
        });
    }

    $(document).ready(function() {
        tampilkanUser();
    });
</script>
<?php echo $this->endSection(); ?>