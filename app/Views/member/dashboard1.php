<?php echo $this->extend('member/layout/main'); ?>

<?php echo $this->section('container'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 d-flex flex-column">
                <div class="row flex-grow">
                    <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                        <div class="card card-rounded">
                            <div class="card-body card-rounded">
                                <?php foreach ($ruangan as $r) : ?>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h4 class="card-title  card-title-dash"><?php echo $r['nama_ruangan']; ?></h4>
                                    </div>
                                    
                                <?php endforeach; ?>

                                <!-- <div class="d-flex align-items-center justify-content-between mb-3">

                                    <h4 class="card-title  card-title-dash">Ruangan Software Engineering</h4>

                                </div> -->
                                <div class="card-body">
                                    <img src="<?php echo base_url('img/logo/monitor.png') ?>" alt="" width="300px">
                                    <!-- <i class="mdi mdi-monitor icon-lg"></i> -->
                                </div>
                                <div class="list align-items-center pt-3">
                                    <div class="wrapper w-100">
                                        <center>
                                            <p class="mb-0">
                                                <button type="button" class="btn btn-success">Pinjam Ruangan</button>
                                            </p>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                        <div class="card card-rounded">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h4 class="card-title card-title-dash">Ruangan Multimedia Studio</h4>
                                </div>
                                <div class="card-body">
                                    <img src="<?php echo base_url('img/logo/monitor.png') ?>" alt="" width="300px">
                                    <!-- <i class="mdi mdi-monitor icon-lg"></i> -->
                                </div>

                                <div class="list align-items-center pt-3">
                                    <div class="wrapper w-100">
                                        <center>
                                            <p class="mb-0">
                                                <button type="button" class="btn btn-success">Pinjam Ruangan</button>
                                            </p>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex flex-column">
                <div class="row flex-grow">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card card-rounded">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between align-items-center">

                                            <h4 class="card-title card-title-dash">Ruangan Computer Network and Instrumentation</h4>

                                        </div>
                                        <div class="card-body">
                                            <img src="<?php echo base_url('img/logo/monitor.png') ?>" alt="" width="300px">
                                            <!-- <i class="mdi mdi-monitor icon-lg"></i> -->
                                        </div>
                                    </div>
                                    <div class="list align-items-center pt-3">
                                        <div class="wrapper w-100">
                                            <center>
                                                <p class="mb-0">
                                                    <button type="button" class="btn btn-success">Pinjam Ruangan</button>
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
    </div>

    <?php echo $this->endSection(); ?>