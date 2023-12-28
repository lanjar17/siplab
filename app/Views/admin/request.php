<?php echo $this->extend('admin/layout/main'); ?>

<?php echo $this->section('container'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        
        <div id="viewdata"></div>
        


    </div>
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->


<script>
    new DataTable('#datatabel');
</script>

<script>
    function tampilkanRequest() {
        $.ajax({
            url: "<?= base_url('/requestdata/') ?>",
            dataType: "json",
            success: function(response) {
                $('#viewdata').html('');
                $('#viewdata').html(response.data);
            }
        });
    }

    function accrequest(id_peminjaman) {
        Swal.fire({
            title: 'Terima Peminjaman Ruangan',
            text: "Apakah Anda yakin menerima Peminjaman?",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, terima'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "put",
                    url: "<?= base_url('/terimapeminjaman/') ?>" + id_peminjaman,
                    success: function(response) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.sukses,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        })
                        tampilkanRequest();
                    }
                });
            }
        })
    }

    function disaccrequest(id_peminjaman) {
        Swal.fire({
            title: 'Tolak Peminjaman Ruangan',
            text: "Apakah Anda yakin menolak Peminjaman?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, tolak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "delete",
                    url: "<?= base_url('/tolakpeminjaman/') ?>" + id_peminjaman,
                    success: function(response) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.sukses,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        })
                        tampilkanRequest();
                    }
                });
            }
        })
    }

    $(document).ready(function() {
        tampilkanRequest();
    });
</script>
<?php echo $this->endSection(); ?>