<?php echo $this->extend('admin/layout/main'); ?>

<?php echo $this->section('container'); ?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row pt-4">
            <div class="col-lg-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h2>
                            <i class=" mdi mdi-account-outline "></i>
                        </h2>
                        <h3>
                            <?= $count_user[0]->total ?> User
                        </h3>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h2>
                            <i class="mdi mdi-monitor "></i>
                        </h2>
                        <h3>
                            <?= $count_ruangan[0]->total ?> Ruangan
                        </h3>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h2>
                            <i class="mdi mdi-book "></i>
                        </h2>
                        <h3>
                            <?= $count_peminjaman[0]->total ?> Total Peminjaman
                        </h3>
                    </div>
                </div>

            </div>


            <div class="row pt-4">
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h2>
                                <i class=" mdi mdi-calendar-clock "></i>
                            </h2>
                            <h3>
                                <?= $count_jadwal[0]->total ?> Jadwal
                            </h3>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h2>
                                <i class="mdi mdi-account-plus"></i>
                            </h2>
                            <h3>
                                <?= $count[0]->total ?> Pendaftar Baru
                            </h3>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h2>
                                <i class="mdi mdi-account-plus"></i>
                            </h2>
                            <h3>
                                <?= $count_reqpeminjaman[0]->total ?> Request Peminjaman
                            </h3>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row pt-4">
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title card-title-dash">
                                Pengunjung
                            </h4>
                        </div>
                        <div class="card-body">
                            <h3>
                                <?= $visits_today ?> Pengunjung Hari Ini
                            </h3>
                            <h3>
                                <?= $visits_last_week ?> Pengunjung Minggu Ini
                            </h3>
                        </div>
                    </div>

                </div>
            </div>

        </div>



    </div>
</div>

<!-- content-wrapper ends -->

</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<?php echo $this->endSection(); ?>