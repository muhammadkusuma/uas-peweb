<?php
require 'getConnection.php';
$conn = getConnection();
function unik()
{
    $kode_unik = rand(1000, 9999);
    return $kode_unik;
}
$unik = unik();

function query($query)
{
    global $conn;
    $result = $conn->query($query);
    $rows = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $rows[] = $row;
    }

    return $rows;
}

function buat_akun($data)
{
    global $conn;
    $email = $data["email"];
    $username = $data["username"];
    $password = $data["password"];


    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO daftar_akun (email, username, password,level) VALUES ('$email','$username','$password', 'pendaftar')";
    $conn->exec($sql);

    return $conn->lastInsertId();
}

function formulir($data)
{
    global $conn;
    global $unik;

    $foto_pendaftar = upload();
    if (!$foto_pendaftar) {
        return false;
    }

    $nama_lengkap = $data["nama"];
    $nisn = $data["nisn"];
    $tempat_lahir = $data["tempat_lahir"];
    $tanggal_lahir = $data["tanggal_lahir"];
    $jenis_kelamin = $data["jenis_kelamin"];
    $provinsi = $data["provinsi"];
    $kabupaten = $data["kabupaten"];
    $kecamatan = $data["kecamatan"];
    $kodepos = $data["kodepos"];
    $alamat = $data["alamat"];
    $agama = $data["agama"];
    $no_hp = $data["nohp"];
    $jumlah_saudara = $data["jumlah_saudara"];
    $foto = upload();
    $unik = $data['unik'];

    $sql = "INSERT INTO data_siswa 
    ( nama, nisn,  tempat_lahir, tanggal_lahir, jenis_kelamin, provinsi, 
    kabupaten, kecamatan, kode_pos, alamat, agama, no_hp, jmlh_saudara, upload_foto, status, kode_unik)
    VALUES ('$nama_lengkap','$nisn','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$provinsi',
    '$kabupaten','$kecamatan','$kodepos','$alamat','$agama','$no_hp','$jumlah_saudara','$foto','Diproses', '$unik')";

    $conn->exec($sql);

    return $conn->lastInsertId();
}


function upload()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
            </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 2000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function ayah($data)
{
    global $conn;

    $nama = $data["nama"];
    $nik = $data["nik"];
    $tempat_lahir = $data["tempat_lahir"];
    $tanggal_lahir = $data["tanggal_lahir"];
    $agama = $data["agama"];
    $pendidikan = $data["pendidikan"];
    $pekerjaan = $data["pekerjaan"];
    $penghasilan = $data["penghasilan"];
    $no_hp = $data["no_hp"];
    $alamat = $data["alamat"];
    $keterangan = $data["keterangan"];
    $unik = $data['unik'];


    $sql = "INSERT INTO ayah (nama,nik, tempat_lahir,tanggal_lahir,agama, pend_terakhir, pekerjaan, penghasilan, alamat, no_hp, keterangan, kode_unik)
    VALUES ('$nama','$nik','$tempat_lahir','$tanggal_lahir','$agama','$pendidikan','$pekerjaan','$penghasilan','$alamat','$no_hp','$keterangan', '$unik')";

    $conn->exec($sql);

    return $conn->lastInsertId();
}

function ibu($data)
{
    global $conn;

    $nama = $data["nama"];
    $nik = $data["nik"];
    $tempat_lahir = $data["tempat_lahir"];
    $tanggal_lahir = $data["tanggal_lahir"];
    $agama = $data["agama"];
    $pendidikan = $data["pendidikan"];
    $pekerjaan = $data["pekerjaan"];
    $penghasilan = $data["penghasilan"];
    $no_hp = $data["no_hp"];
    $alamat = $data["alamat"];
    $keterangan = $data["keterangan"];
    $unik = $data['unik'];


    $sql = "INSERT INTO ibu (nama,nik, tempat_lahir,tanggal_lahir,agama, pend_terakhir, pekerjaan, penghasilan, alamat, no_hp, keterangan, kode_unik)
    VALUES ('$nama','$nik','$tempat_lahir','$tanggal_lahir','$agama','$pendidikan','$pekerjaan','$penghasilan','$alamat','$no_hp','$keterangan', '$unik')";

    $conn->exec($sql);

    return $conn->lastInsertId();
}

function jurusan($data)
{
    global $conn;
    $pilihan1 = $data["pilihan1"];
    $pilihan2 = $data["pilihan2"];
    $unik = $data['unik'];

    $sql = "INSERT INTO jurusan_dituju (jurusan_1,jurusan_2, kode_unik)
    VALUES ('$pilihan1','$pilihan2', '$unik')";

    $conn->exec($sql);

    return $conn->lastInsertId();
}

function pendidikan($data)
{
    global $conn;

    $asal = $data["asal_sekolah"];
    $agama = $data["agama"];
    $pkn = $data["pkn"];
    $bahasa = $data["bahasa"];
    $mtk = $data["mtk"];
    $ipa = $data["ipa"];
    $ips = $data["ips"];
    $inggris = $data["inggris"];
    $seni = $data["seni"];
    $pjok = $data["pjok"];
    $armel = $data["armel"];
    $skl = skl();
    $unik = $data['unik'];

    $sql = "INSERT INTO riwayat_pendidikan 
    (asal_sekolah, agama, pkn, bahasa, mtk, ipa, ips, inggris, seni, pjok, armel, skl, kode_unik)
    VALUES ('$asal','$agama','$pkn','$bahasa','$mtk','$ipa','$ips','$inggris','$seni','$pjok','$armel','$skl', '$unik')";

    $conn->exec($sql);

    return $conn->lastInsertId();
}

function skl()
{
    $namaFile = $_FILES['skl']['name'];
    $ukuranFile = $_FILES['skl']['size'];
    $error = $_FILES['skl']['error'];
    $tmpName = $_FILES['skl']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('isi skl terlebih dahulu!');
            </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
            </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 2000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'skl/' . $namaFileBaru);

    return $namaFileBaru;
}

function registrasi($data)
{
    global $conn;
    global $unik;

    $username = strtolower(stripslashes($data["username"]));
    // $password = mysqli_real_escape_string($conn, $data["password"]);
    // $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $password = $data["password"];
    $nama = $data["nama"];

    $password1 = md5($password);

    $sql = "INSERT INTO user (username,nama, password, level, kode_unik) 
    VALUES ('$username','$nama','$password1','user', '$unik')";
    $conn->exec($sql);

    var_dump($sql);
    return $conn->lastInsertId();
}

function cari($keyword)
{
    $query = "SELECT * FROM user WHERE nama LIKE '%$keyword%' OR email LIKE '%$keyword%' OR level LIKE '%$keyword%'";

    return query($query);
}

function ubah($data)
{
    global $conn;
    $id = $data["id"];
    $nama = $data["nama"];
    $email = $data["email"];
    $level = $data['level'];

    $query = "UPDATE user SET level='$level' WHERE id=$id";
    $conn->exec($query);
    // mysqli_query($conn, $query);

    return $conn->lastInsertId();
}

function hapus($id)
{
    // global $conn;
    // mysqli_query($conn,"DELETE FROM mahasiswa WHERE id=$id");

    // return mysqli_affected_rows($conn);
    global $conn;
    $sql = "DELETE FROM user WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->rowCount();
}

function set($data)
{
    global $conn;
    $rata = $data["rata"];
    $tkj = (int)$data["tkj"];
    $akutansi = $data["akutansi"];
    $tsm = $data["tsm"];
    $tkr = $data["tkr"];
    $tataboga = $data["tataboga"];
    $rpl = $data["rpl"];
    $atp = $data["atp"];


    $data1 = $conn->prepare("SELECT * FROM riwayat_pendidikan, jurusan_dituju where riwayat_pendidikan.kode_unik=jurusan_dituju.kode_unik");
    $data1->execute();

    while ($d = $data1->fetch(PDO::FETCH_ASSOC)) {

        $agama = ((int)$d['agama']);
        $pkn = ((int)$d['pkn']);
        $mtk = ((int)$d['mtk']);
        $ipa = ((int)$d['ipa']);
        $ips = ((int)$d['ips']);
        $inggris = ((int)$d['inggris']);
        $seni = ((int)$d['seni']);
        $pjok = ((int)$d['pjok']);
        $armel = ((int)$d['armel']);


        $nilai = $agama + $pkn + $mtk + $ipa + $ips + $inggris + $seni + $pjok + $armel / 9;
        // tkj
        if ($nilai >= 50) {
            $jurusan_1 = "TKJ";
        } else {
            $jurusan_1 = "sfsdfs1";
        }
        $data = $conn->prepare("UPDATE jurusan_dituju,riwayat_pendidikan set riwayat_pendidikan.jurusan_1=$jurusan_1, riwayat_pendidikan.jurusan_2='' where riwayat_pendidikan.kode_unik=jurusan_dituju.kode_unik");
        $data->execute();
    }



    // $query = "SELECT * from riwayat_pendidikan, jurusan_dituju where riwayat_pendidikam.kode_unik=jurusan_dituju.kode_unik";
    // $conn->exec($query);

    // $data = $conn->prepare("SELECT * FROM riwayat_pendidikan, jurusan_dituju where riwayat_pendidikan.kode_unik=jurusan_dituju.kode_unik");
    // $data->execute();

    // while ($d = $data->fetch(PDO::FETCH_ASSOC)) {

    //     $agama = ((int)$d['agama']);
    //     $pkn = ((int)$d['pkn']);
    //     $mtk = ((int)$d['mtk']);
    //     $ipa = ((int)$d['ipa']);
    //     $ips = ((int)$d['ips']);
    //     $inggris = ((int)$d['inggris']);
    //     $seni = ((int)$d['seni']);
    //     $pjok = ((int)$d['pjok']);
    //     $armel = ((int)$d['armel']);


    //     $rata = $agama + $pkn + $mtk + $ipa + $ips + $inggris + $seni + $pjok + $armel / 9;

    // }
    // return $rata;
}
