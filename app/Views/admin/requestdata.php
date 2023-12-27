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
                    <a href="#" class="btn btn-success btn-rounded btn-fw" id="update" onclick="accrequest(<?= $u['id_peminjaman'] ?>)">Terima</a>
                    <a href="#" class="btn btn-danger btn-rounded btn-fw" id="delete" onclick="disaccrequest(<?= $u['id_peminjaman'] ?>)">Tolak</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    new DataTable('#datatabel');
</script>