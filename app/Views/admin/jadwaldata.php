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
            <th>Aksi</th>
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
                            echo "<span class='text-danger text-bold'>Sudah lewat, harap hapus jadwal ini..</span>";
                        default:
                            # code...
                            break;
                    }
                    ?>
                </td>


                <td>
                    <a href="#" class="btn btn-danger btn-rounded btn-fw" id="delete" onclick="hapusJadwal(<?php echo $u['id_jadwal'] ?>)">Hapus Jadwal</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    new DataTable('#datatabel');
</script>