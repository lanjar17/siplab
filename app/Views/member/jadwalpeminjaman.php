<?php echo $this->extend('member/layout/main'); ?>

<?php echo $this->section('container'); ?>
<?php
function aturjadwal($nowtime, $dbstart, $dbend, $id_jadwal)
{
    if ($nowtime >= $dbstart and $nowtime <= $dbend) {
        redirect('admin/hapusjadwal/1/' . $id_jadwal, 'refresh');
    }
}
?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                        <div>
                            <div class="btn-wrapper">
                                <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                                <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                                <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="viewdata"></div>
        <table id="datatabel" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Ruangan</th>
                    <th>Jam Mulai</th>
                    <th>Jam Berakhir</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($user as $u) : ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $u['nama_lengkap']; ?></td>
                        <td><?php echo $u['username']; ?></td>
                        <td><?php echo $u['nama_ruangan']; ?></td>
                        <td><?php echo $u['jam_mulai']; ?></td>
                        <td><?php echo $u['jam_berakhir']; ?></td>
                        <td><?php $date = date_create($u['tanggal']);
                            echo date_format($date, 'd-m-Y'); ?></td>
                        <td><?php echo $u['keterangan']; ?></td>
                        <td>
                            <?php
                            switch ($u['status_jadwal']) {
                                case 1:
                                    echo "<span class='text-success text-bold'>Sedang berlangsung...</span>";
                                    break;
                                case 2:
                                    echo "<span class='text-primary text-bold'>Akan datang...</span>";
                                    break;
                                case 3:
                                    echo "<span class='text-danger text-bold'>Sudah lewat</span>";
                                default:
                                    # code...
                                    break;
                            }
                            ?>
                        </td>


                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>



    </div>
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->


<script>
    new DataTable('#datatabel');
</script>


<?php echo $this->endSection(); ?>