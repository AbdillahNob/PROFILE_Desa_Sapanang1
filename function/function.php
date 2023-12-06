<?php
// koneksi db

use LDAP\Result;

$conn = mysqli_connect("localhost", "root", "", "desa_sapanang");


// function untuk tiap query SELECT
function view($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);

    return $result;
}

// function untuk insert data
function insert($data, $no_file)
{
    global $conn;

    $no_upload = $no_file;

    // fitur lain bisa upload foto, kecuali data penduduk
    if ($no_file != 2) {
        $gambar = upload($no_upload);

        // jika gambar tdk memenuhi syarat.
        if (!$gambar) {
            return false;
        }
    }

    // Note 
    // 1 = registrasi/user
    // 2 = penduduk
    // 3 = produk
    // 4 = informasi
    // 5 = struktur
    // 6 = pendidikan
    // 7 = Profile desa
    // 8 = Surat masuk
    // 9 = Surat Keluar

    if ($no_file == 1) {
        $nama = mysqli_real_escape_string($conn, $data['nama']);
        $username = strtolower(stripslashes($data['user']));
        $password = mysqli_real_escape_string($conn, $data['pass']);
        $rePassword = mysqli_real_escape_string($conn, $data['rePass']);

        // Validasi apakah Password sama dgn Konfirmasi Password
        if ($password != $rePassword) {
            echo "     
            <script>
                alert('Password anda tdk sama dgn Konfirmasi Password');
            </script>
            ";
            return false;
        }
        // Validasi selain aparat desa, tdk bs menjadi user!
        if (
            $username == 'kepala desa' || $username == 'pendamping desa' || $username == 'operator'
        ) {

            // validasi username yg di input tdk boleh sama dgn yg ad di DB
            $result = mysqli_query($conn, "SELECT * FROM tb_login WHERE username = '$username' ");
            if (mysqli_num_rows($result) > 0) {
                echo "     
                <script>
                    alert('Maaf Username yg anda masukkan sudah ada sebelumnya');
                </script>
                ";
                return false;
            }

            // enkripsi password user 
            $password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO tb_login (nama, username, password, gambar) VALUES ('$nama', '$username', '$password', '$gambar')";
        } else {
            echo "     
                <script>
                    alert('Maaf anda bukan pemerintah desa !');
                </script>
                ";
            return false;
        }
    } elseif ($no_file == 2) {
        $no_kk = $data['no_kk'];
        $nama = $data['nama'];
        $dusun = $data['dusun'];
        $nik = $data['nik'];
        $tempat_lahir = $data['tempat_lahir'];
        $tanggal_lahir = $data['tgl_lahir'];
        $jenis_kelamin = $data['jns_kelamin'];
        $hubungan = $data['hubungan_dlm_keluarga'];
        $nama_keluarga = $data['nama_keluarga'];
        $agama = $data['agama'];
        $pendidikan = $data['pendidikan'];
        $pekerjaan = $data['pekerjaan'];
        $darah = $data['darah'];

        // Validasi agar data type RADIO BOX harus di isi
        if (!$dusun || !$agama || !$darah || !$hubungan || !$jenis_kelamin) {
            echo "
            <script>
                alert('Maaf Data anda kurang Lengkap');
            </script>";
            return false;
        }

        $result = mysqli_query($conn, "SELECT * FROM tb_kk WHERE nik = '$nik'");
        if(mysqli_num_rows($result) > 0){
                echo "
                    <script>
                        alert('Maaf Nik Anda sudah terdaftar !');
                    </script>
                ";
                return false;
        }

        // validasi agar NIK harus di INPUT 16 Digit
        $j_nik = strlen($nik);

        if ($j_nik == 16) {
            $query = "INSERT INTO tb_kk 
                    (dusun,no_kk, nama, nik, tempat_lahir, tgl_lahir, jns_kelamin, hubungan_dlm_keluarga, nama_keluarga, agama, pendidikan, pekerjaan, darah) 
                    VALUES 
                    ('$dusun',
                    '$no_kk',
                    '$nama',
                    '$nik',
                    '$tempat_lahir',
                    '$tanggal_lahir',
                    '$jenis_kelamin',
                    '$hubungan',
                    '$nama_keluarga',
                    '$agama',
                    '$pendidikan',
                    '$pekerjaan',
                    '$darah')
                    ";
        } else {
            echo
            "<script>
                    alert('Maaf Nik anda harus 16 Digit !');
                    window.location.replace('tambah_penduduk.php');
                 </script>";

            return false;
        }
    } elseif ($no_file == 3) {
        $judul = $data['judul'];
        // $gambar_produk = $data['gambar'];
        $uploaded = $data['uploaded'];
        $deskripsi = $data['deskripsi'];
        $query = "INSERT INTO tb_produk (gambar, judul, uploaded, deskripsi) VALUES ('$gambar', '$judul', '$uploaded', '$deskripsi')";
    } elseif ($no_file == 4) {
        $judul = $data['judul'];
        $deskripsi = $data['deskripsi'];
        $penulis = $data['penulis'];
        $uploaded = $data['uploaded'];
        $query = "INSERT INTO tb_informasi (gambar, judul, deskripsi, penulis, uploaded) VALUES ('$gambar', '$judul', '$deskripsi', '$penulis', '$uploaded')";
    } elseif ($no_file == 5) {
        $nama = $data['nama'];
        $jabatan = $data['jabatan'];
        $query = "INSERT INTO tb_struktur (nama, jabatan, gambar) VALUES ('$nama','$jabatan','$gambar')";
    } elseif ($no_file == 6) {
        $nama_sekolah = $data['nama_sekolah'];
        $alamat = $data['alamat'];
        $deskripsi = $data['deskripsi'];

        $query = "INSERT INTO tb_pendidikan (gambar, nama_sekolah, alamat, deskripsi) VALUES
                                            ('$gambar', 
                                            '$nama_sekolah',
                                            '$alamat',
                                            '$deskripsi')
                                            ";
    } else if ($no_file == 7) {
        $sejarah = $data['sejarah'];
        $detail = $data['detail'];
        $visi = $data['visi'];
        $misi = $data['misi'];

        $query = "INSERT INTO tb_profil (sejarah, detail, gambar, visi, misi) VALUES
                                        ('$sejarah',
                                        '$detail',
                                        '$gambar',
                                        '$visi',
                                        '$misi')
                                        ";
    } else if ($no_file == 8) {
        $no_surat = $data['no_surat'];
        $asal_surat = $data['asal_surat'];
        $perihal = $data['perihal'];
        $tgl_surat = $data['tgl_surat'];
        $tgl_surat_diterima = $data['tgl_surat_diterima'];

        $query = "INSERT INTO tb_surat_masuk (no_surat, asal_surat, perihal, tgl_surat, tgl_surat_diterima, file) VALUES
                                            ('$no_surat',
                                            '$asal_surat',
                                            '$perihal',
                                            '$tgl_surat',
                                            '$tgl_surat_diterima',
                                            '$gambar')
                                            ";
    } else if ($no_file == 9) {
        $no_surat = $data['no_surat'];
        $asal_surat = $data['asal_surat'];
        $perihal = $data['perihal'];
        $tgl_surat = $data['tgl_surat'];
        $tgl_surat_diterima = $data['tgl_surat_diterima'];

        $query = "INSERT INTO tb_surat_keluar (no_surat, asal_surat, perihal, tgl_surat, tgl_surat_diterima, file) VALUES
                                              ('$no_surat',
                                              '$asal_surat',
                                              '$perihal',
                                              '$tgl_surat',
                                              '$tgl_surat_diterima',
                                              '$gambar')
                                              ";
    } else {
        return false;
    }

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// function upload gambar
// no file untuk pembeda upload direktori file
function upload($no_upload)
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $tmpFile = $_FILES['gambar']['tmp_name'];
    // $error = $_FILES['gambar']['error'];

    // Note 
    // 1 = registrasi
    // 3 = produk
    // 4 = informasi
    // 5 = struktur
    // 6 = pendidikan
    // 7 = profil desa
    // 8 = Surat masuk
    // 9 = Surat keluar

    // validasi ekstensi Foto
    if ($no_upload != 8 && $no_upload != 9) {
        $ekstensiValid = ["jpg", "jpeg", "png"];
        $ekstensiFoto = explode(".", $namaFile);
        $ekstensiFoto = strtolower(end($ekstensiFoto));
        if (!in_array($ekstensiFoto, $ekstensiValid)) {
            echo "<script>
                    alert('File harus Ber-Ekstensi jpg,jpeg,atau png');
                    </script>
                ";
            return false;
        }
    } else {
        $ekstensiValid = ["pdf", "docx"];
        $ekstensiFoto = explode(".", $namaFile);
        $ekstensiFoto = strtolower(end($ekstensiFoto));
        if (!in_array($ekstensiFoto, $ekstensiValid)) {
            echo "<script>
                    alert('File harus Ber-Ekstensi PDF atau docx');
                    </script>
                ";
            return false;
        }
    }

    // validasi size
    if ($ukuranFile > 10000000) {
        echo "<script>
                alert('Ukuran file terlalu besar');
                </script>
            ";
        return false;
    }

    if ($no_upload == 1) {
        $fileDIR = "../img/profile/";
    } elseif ($no_upload == 3) {
        $fileDIR = "../img/sapanang/produk/";
    } elseif ($no_upload == 4) {
        $fileDIR = "../img/sapanang/informasi/";
    } elseif ($no_upload == 5) {
        $fileDIR = "../img/sapanang/struktur/";
    } elseif ($no_upload == 6) {
        $fileDIR = "../img/sapanang/pendidikan/";
    } elseif ($no_upload == 7) {
        $fileDIR = "../img/sapanang/Profile_desa/";
    } else if ($no_upload == 8) {
        $fileDIR = "../img/sapanang/surat_masuk/";
    } else if ($no_upload == 9) {
        $fileDIR = "../img/sapanang/surat_keluar/";
    } else {
        return false;
    }
    // acak nama file foto biar tidak ada yang sama trus sambun dgn ekstensi foto
    $namaFotoBaru = uniqid();
    $namaFotoBaru .= ".";
    $namaFotoBaru .= $ekstensiFoto;

    $fileUpload = $fileDIR . basename($namaFotoBaru);

    // ambil foto dari server lalu pindahkan ke $fileupload yg isiny folder 
    move_uploaded_file($tmpFile, $fileUpload);

    return $namaFotoBaru;
}

// function update data
function update($data, $no_file)
{
    global $conn;

    $no_upload = $no_file;

    // Note 
    // 1 = registrasi
    // 2 = penduduk
    // 3 = produk
    // 4 = informasi
    // 5 = struktur
    // 6 = pendidikan
    // 7 = Profile desa
    // 8 = Surat masuk
    // 9 = Surat keluar

    // bisa edit foto, kecuali fitur penduduk
    if ($no_upload != 2) {
        $gambarLama = $data['gambarLama'];
        // validasi user input/perbarui gambar jika tdk = 4
        if ($_FILES['gambar']['error'] === 4) {
            // jika gambar tdk diperbarui/input
            $gambar = $gambarLama;
        } else {
            // jika gambar di perbarui/input
            $gambar = upload($no_upload);

            // jika gambar tdk memenuhi kriteria
            if (!$gambar) {
                return false;
            }
        }
    }
    // END edit foto kecuali, fitur Penduduk

    if ($no_file == 1) {
        $id = $data['id'];
        $nama = mysqli_real_escape_string($conn, $data['nama']);
        $passwordLama = $data['passLama'];

        $result = mysqli_query($conn, "SELECT * FROM tb_login WHERE id_login = $id");
        $row = mysqli_fetch_assoc($result);

        // bila ingin memperbarui Password, sblmnya Password di input harus sm dgn di DB
        if (password_verify($passwordLama, $row['password'])) {
            $passwordBaru = mysqli_real_escape_string($conn, $data['passBaru']);
            // Apkh ada Pass baru di Input ?
            if ($passwordBaru == true) {
                $password = password_hash($passwordBaru, PASSWORD_DEFAULT);
            } else {
                echo "     
                    <script>
                        alert('Anda harus masukkan Password baru !');
                    </script>
                    ";
                return false;
            }
        }
        // Bila Passwordnya ada tapi Salah.
        else if ($passwordLama == true) {
            echo "     
            <script>
                alert('Maaf Password anda salah !');
            </script>
            ";
            return false;
        }
        // no password di input
        else {
            $password = $data['pass'];
        }

        $query = "UPDATE tb_login SET
                    gambar = '$gambar',
                    nama = '$nama',
                    password = '$password'
                    WHERE id_login = $id
                    ";
    } elseif ($no_file == 2) {
        $id = $data['id'];
        $no_kk = $data['no_kk'];
        $dusun = $data['dusun'];
        $nama = $data['nama'];
        $nik = $data['nik'];
        $tempat_lahir = $data['tempat_lahir'];
        $tgl_lahir = $data['tgl_lahir'];
        $jns_kelamin = $data['jns_kelamin'];
        $hubungan_dlm_keluarga = $data['hubungan_dlm_keluarga'];
        $nama_keluarga = $data['nama_keluarga'];
        $agama = $data['agama'];
        $pendidikan = $data['pendidikan'];
        $pekerjaan = $data['pekerjaan'];
        $darah = $data['darah'];


        $query = " UPDATE tb_kk SET 
                dusun = '$dusun',
                no_kk = '$no_kk',
                nama = '$nama',
                nik = '$nik',
                tempat_lahir = '$tempat_lahir',
                tgl_lahir = '$tgl_lahir',
                jns_kelamin = '$jns_kelamin',
                hubungan_dlm_keluarga = '$hubungan_dlm_keluarga',
                nama_keluarga = '$nama_keluarga',
                agama = '$agama',
                pendidikan = '$pendidikan',
                pekerjaan = '$pekerjaan',
                darah = '$darah'
                WHERE id_kk = $id;
            ";
    } elseif ($no_file == 3) {
        $id = $data['id'];
        $judul = $data['judul'];
        $uploaded = $data['uploaded'];
        $deskripsi = $data['deskripsi'];

        $query = "UPDATE tb_produk SET 
                gambar = '$gambar',
                judul = '$judul',
                uploaded = '$uploaded',
                deskripsi = '$deskripsi'
                WHERE id_produk = $id;
            ";
    } elseif ($no_file == 4) {
        $id = $data['id'];
        $judul = $data['judul'];
        $deskripsi = $data['deskripsi'];
        $penulis = $data['penulis'];
        $uploaded = $data['uploaded'];

        $query = "UPDATE tb_informasi SET 
            gambar = '$gambar',
            judul = '$judul',
            deskripsi = '$deskripsi',
            penulis = '$penulis',
            uploaded = '$uploaded'
            WHERE id_informasi = $id
            ";
    } else if ($no_file == 5) {
        $id = $data['id'];
        $nama = $data['nama'];
        $jabatan = $data['jabatan'];

        $query = "UPDATE tb_struktur SET
            nama='$nama',
            jabatan='$jabatan',
            gambar= '$gambar'
            WHERE id_struktur = $id
            ";
    } else if ($no_file == 6) {
        $id = $data['id'];
        $nama_sekolah = $data['sekolah'];
        $alamat = $data['alamat'];
        $deskripsi = $data['deskripsi'];

        $query = "UPDATE tb_pendidikan SET
                nama_sekolah ='$nama_sekolah',
                gambar = '$gambar',
                alamat = '$alamat',
                deskripsi = '$deskripsi'
                WHERE id_pendidikan = $id;
                ";
    } else if ($no_file == 7) {
        $id = $data['id'];
        $sejarah = $data['sejarah'];
        $detail = $data['detail'];
        $visi = $data['visi'];
        $misi = $data['misi'];

        $query = "UPDATE tb_profil SET
                    sejarah = '$sejarah',
                    detail = '$detail',
                    gambar = '$gambar',
                    visi = '$visi',
                    misi = '$misi'
                    WHERE id_profil = $id
                    ";
    } else if ($no_file == 8) {
        $id = $data['id'];
        $no_surat = $data['no_surat'];
        $asal_surat = $data['asal_surat'];
        $perihal = $data['perihal'];
        $tgl_surat = $data['tgl_surat'];
        $tgl_surat_diterima = $data['tgl_surat_diterima'];

        $query = "UPDATE tb_surat_masuk SET
                    no_surat = '$no_surat',
                    asal_surat = '$asal_surat',
                    perihal = '$perihal',
                    tgl_surat = '$tgl_surat',
                    tgl_surat_diterima = '$tgl_surat_diterima',
                    file = '$gambar'
                    WHERE id_surat_masuk = $id
                    ";
    } else if ($no_file == 9) {
        $id = $data['id'];
        $no_surat = $data['no_surat'];
        $asal_surat = $data['asal_surat'];
        $perihal = $data['perihal'];
        $tgl_surat = $data['tgl_surat'];
        $tgl_surat_diterima = $data['tgl_surat_diterima'];

        $query = "UPDATE tb_surat_keluar SET
                    no_surat = '$no_surat',
                    asal_surat = '$asal_surat',
                    perihal = '$perihal',
                    tgl_surat = '$tgl_surat',
                    tgl_surat_diterima = '$tgl_surat_diterima',
                    file = '$gambar'
                    WHERE id_surat_keluar = $id
                    ";
    }
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// function hapus data
function hapus($id, $no_file)
{
    global $conn;

    // Note 
    // 1 = registrasi
    // 2 = penduduk
    // 3 = produk
    // 4 = informasi
    // 5 = Struktur
    // 6 = Pendidikan
    // 7 = Profil desa
    // 8 = Surat masuk
    // 9 = Surat keluar

    if ($no_file == 1) {
        $sql = "DELETE FROM tb_login WHERE id_login = $id";
    } elseif ($no_file == 2) {
        $sql = "DELETE FROM tb_kk WHERE id_kk = $id";
    } elseif ($no_file == 3) {
        $sql = "DELETE FROM tb_produk WHERE id_produk = $id";
    } elseif ($no_file == 4) {
        $sql = "DELETE FROM tb_informasi WHERE id_informasi = $id";
    } elseif ($no_file == 5) {
        $sql = "DELETE FROM tb_struktur WHERE id_struktur = $id";
    } else if ($no_file == 6) {
        $sql = "DELETE FROM tb_pendidikan WHERE id_pendidikan = $id";
    } else if ($no_file == 7) {
        $sql = "DELETE FROM tb_profil WHERE id_profil = $id";
    } else if ($no_file == 8) {
        $sql = "DELETE FROM tb_surat_masuk WHERE id_surat_masuk = $id";
    } else if ($no_file == 9){
        $sql = "DELETE FROM tb_surat_keluar WHERE id_surat_keluar = $id";
    } else {
        return false;
    }

    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}
