<table id="datatabel" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>NIP</th>
            <th>Level</th>
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
                <td><?php echo $u['nip']; ?></td>
                <td><?php echo $u['level']; ?></td>
                <td>
                    <a href="#" class="btn btn-danger btn-rounded btn-fw" id="delete" onclick="hapus(<?php echo $u['id_user'] ?>)">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    new DataTable('#datatabel');
</script>