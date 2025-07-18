<?php
// Koneksi Database
$koneksi = mysqli_connect("sql303.infinityfree.com", "if0_39493643", "U04R5eDIuDBPQ6C", "if0_39493643_webcrud");


// Fungsi query (ambil data)
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Fungsi tambah
function tambah($data)
{
    global $koneksi;

    $nis = htmlspecialchars($data['nis']);
    $nama = htmlspecialchars($data['nama']);
    $tmpt_Lahir = htmlspecialchars($data['tmpt_Lahir']);
    $tgl_Lahir = $data['tgl_Lahir'];
    $jekel = $data['jekel'];
    $merk_kategori = $data['merk_kategori'];
    $email = htmlspecialchars($data['email']);
    $alamat = htmlspecialchars($data['alamat']);
    $gambar = upload();

    if (!$gambar) {
        return false;
    }

    $sql = "INSERT INTO siswa 
            (nis, nama, jekel, jurusan, merk_input, tmpt_Lahir, tgl_Lahir, harga, merk_kategori, email, gambar, alamat) 
            VALUES 
            ('$nis', '$nama', '$jekel', '', '', '$tmpt_Lahir', '$tgl_Lahir', '', '$merk_kategori', '$email', '$gambar', '$alamat')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Fungsi hapus
function hapus($nis)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM siswa WHERE nis = '$nis'");
    return mysqli_affected_rows($koneksi);
}

// Fungsi ubah
function ubah($data)
{
    global $koneksi;

    $nis = $data['nis'];
    $nama = htmlspecialchars($data['nama']);
    $tmpt_Lahir = htmlspecialchars($data['tmpt_Lahir']);
    $tgl_Lahir = $data['tgl_Lahir'];
    $jekel = $data['jekel'];
    $merk_kategori = $data['merk_kategori'];
    $email = htmlspecialchars($data['email']);
    $alamat = htmlspecialchars($data['alamat']);
    $gambarLama = $data['gambarLama'];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $sql = "UPDATE siswa SET
                nama = '$nama',
                tmpt_Lahir = '$tmpt_Lahir',
                tgl_Lahir = '$tgl_Lahir',
                jekel = '$jekel',
                merk_kategori = '$merk_kategori',
                email = '$email',
                gambar = '$gambar',
                alamat = '$alamat'
            WHERE nis = '$nis'";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Fungsi upload gambar
function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
        return false;
    }

    $extValid = ['jpg', 'jpeg', 'png'];
    $ext = explode('.', $namaFile);
    $ext = strtolower(end($ext));

    if (!in_array($ext, $extValid)) {
        echo "<script>alert('Yang anda upload bukanlah gambar!');</script>";
        return false;
    }

    if ($ukuranFile > 3000000) {
        echo "<script>alert('Ukuran gambar anda terlalu besar!');</script>";
        return false;
    }

    $namaFileBaru = uniqid() . '.' . $ext;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

// Fungsi registrasi
function registrasi($data)
{
    global $koneksi;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username sudah terdaftar');</script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>alert('Konfirmasi password tidak sesuai');</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($koneksi, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($koneksi);
}
