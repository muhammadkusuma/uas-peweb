<?php
include '../backend/function.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM user WHERE nama LIKE '%$keyword%' OR email LIKE '%$keyword%' OR level LIKE '%$keyword%'";
$pengguna = query($query);
?>
<table border="1" cellspacing="0" cellpadding="10" class="mt-5">
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Aksi</th>

    </tr>
    <?php $i = 1; ?>
    <?php foreach ($pengguna as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["nama"] ?></td>
            <td><?= $row["email"] ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin');">hapus</a>
            </td>

        </tr>
        <?php $i++; ?>
    <?php endforeach;; ?>
</table>