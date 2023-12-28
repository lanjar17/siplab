<?php echo $this->extend('admin/layout/main'); ?>

<?php echo $this->section('container'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        
        <div id="viewdata"></div>


        <!-- content-wrapper ends -->

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
    function tampilkanData() {
        $.ajax({
            url: "<?= base_url('/userdata/') ?>",
            dataType: "json",
            success: function(response) {
                $('#viewdata').html('');
                $('#viewdata').html(response.data);
            }
        });
    }

    function hapus(id_user) {
        Swal.fire({
            title: 'Hapus User',
            text: "Apakah Anda yakin hapus User?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "delete",
                    url: "<?= base_url('/hapus/') ?>" + id_user,
                    success: function(response) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.sukses,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        })
                        tampilkanData();
                    }
                });
            }
        })
    }

    $(document).ready(function() {
        tampilkanData();
    });
</script>
<?php echo $this->endSection(); ?>