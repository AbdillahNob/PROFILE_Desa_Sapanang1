-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2023 pada 16.50
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa_sapanang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_informasi`
--

CREATE TABLE `tb_informasi` (
  `id_informasi` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `uploaded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_informasi`
--

INSERT INTO `tb_informasi` (`id_informasi`, `gambar`, `judul`, `deskripsi`, `penulis`, `uploaded`) VALUES
(1, '65349c5bd8250.jpg', 'Kunjungan Mahasiswa KKN-T UNDIPA di POSTU', '<p>Mahasiswa KKN-T UNDIPA berkunjung ke POSTU sebagai bentuk OBSERVASI sehingga memberikan aspek yang cukup jelas dan pemahaman terhadap MAHASISWA KKN ini dalam menunjang persiapan PROGRAM KERJA yg akan mereka Planning-kan sebelum RAPAT SEMINAR PROGRAM KERJA mereka. </p>\r\n', 'Abdillah P Al-Iman', '2023-08-08'),
(2, '65349d25b604c.jpg', 'Kunjungan Mahasiswa KKN-T UNDIPA di Pondok Pesantren NURUL HIDAYAH SAPANANG', '<p>Kunjungan ini juga bagian dari tahap OBSERVASI dan SILATURAHMI yang merupakan tujuan dari Mahasiswa KKN-T UNDIPA sehingga memberikan meningkatkan hubungan emosional dan kesan terhadap masyarakat dan juga bisa memberikan sebuah bayangan dan pemahaman terkait aspek-aspek yang di butuhkan oleh desa sapanang terutama di bidang teknologi yang nantinya akan menjadi PROGRAM KERJA mahasiswa KKN-T UNDIPA.</p>\r\n', 'Abdillah P Al-Iman', '2023-08-09'),
(4, '65349e4766d2b.jpg', 'Aktifitas pertanian dusun kanea', '<p>Pertanian di dusun kanea menjadi SUMBER UTAMA penunjang penghasilan masyarakat setempat sehingga pertanian di dusun ini sangat banyak dan maju, akan tetapi kuantitas air di dusun ini sangatlah minim terutama di musim kemarau sehingga pemerintah harus benar-benar menemukan solusi ini agar masyarakat tidak kehilangan penghasilan utamanya.</p>\r\n', 'Muh.Iqra Ramadhan Hidayat', '2023-08-12'),
(7, '65349ef16063c.jpg', 'Makam Karaeng', '<p>Makam ini adalah tempat yang bersejarah di desa sapanang karena para bangsawan terdahulu di wilayah ini di makamkan di lokasi ini, sehingga perlu perawatan dan pemeliharaan setiap tahunnya sehingga makam ini tetap terjaga dan terawat.</p>\r\n', 'Muh.Iqra Ramadhan Hidayat', '2023-08-14'),
(8, '65349fa19a950.jpg', 'Rapat Seminar Program Kerja KKN-T UNDIPA GEL-01', '<p>Mahasiswa&nbsp;KKN-T UNDIPA GEL-01 melakukan Rapat seminar program kerja sebagai bentuk penyampaian informasi terkait PROGRAM KERJA apa saja yang mereka Realisasikan selama ber-KKN di desa sapanang yang bersifat REKONSTRUKTIF terhadap desa di bidang teknologi serta memiliki sifat jangka panjang dan berkelanjutan.</p>\r\n', 'Abdillah P Al-Iman', '2023-08-19'),
(9, '6534a0ba3e33e.jpg', 'Teknologi yang membantu masyarakat dalam merawat dan mengelola sayuran mereka', '<p>Di era industri 4.0 semestinya masyarakat indonesia sudah mengenal teknologi digital terutama di bidang pertanian sehingga memberikan kemudahan, efesiensi pengelolaan tanaman serta minimnya tenaga yang digunakan agar petani-petani benar-benar terbantu oleh teknologi tersebut, jadi ada beberapa teknologi ini sudah di gunakan oleh para petani-petani yang ada di desa sapanang salah satu teknologi yang memudahkan pengambilan air dan penyiraman tanaman.</p>\r\n', 'Abdillah P Al-Iman', '2023-11-20'),
(10, '6534a110639b3.jpeg', 'Kerja Bakti/Jumat bersih', '<p>Agenda ini sebagai bentuk kesadaran diri di masyarakat desa sapanang terkait betapa pentingnya menjaga lingkungan hidup yang lebih sehat dan asri.</p>\r\n', 'Muh.Iqra Ramadhan Hidayat', '2023-10-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kk`
--

CREATE TABLE `tb_kk` (
  `id_kk` int(11) NOT NULL,
  `dusun` varchar(15) NOT NULL,
  `no_kk` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` text NOT NULL,
  `tempat_lahir` varchar(70) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jns_kelamin` varchar(10) NOT NULL,
  `hubungan_dlm_keluarga` varchar(20) NOT NULL,
  `nama_keluarga` varchar(50) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `darah` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kk`
--

INSERT INTO `tb_kk` (`id_kk`, `dusun`, `no_kk`, `nama`, `nik`, `tempat_lahir`, `tgl_lahir`, `jns_kelamin`, `hubungan_dlm_keluarga`, `nama_keluarga`, `agama`, `pendidikan`, `pekerjaan`, `darah`) VALUES
(1, 'Sapanang', '7322023128648512', 'Abdillah P Al-Iman', '7322023128648510', 'Kec.Tual, Provinsi Maluku Tenggara', '2002-11-20', 'Pria', 'Kepala Keluarga', 'Abdillah Putra Al-Iman', 'Islam', 'Mahasiswa', 'Pelajar', 'O'),
(2, 'Sapanang', '7322023128648512', 'Andi Aini Makassau', '7322023128648509', 'Wotu, Kab.Luwu Timur', '2023-10-23', 'Wanita', 'Istri', 'Abdillah Putra Al-Iman', 'Islam', 'SMA', 'Ibu Rumah Tangga', 'AB'),
(3, 'Sapanang', '7322023128648512', 'Andi Tenriabeng Abdillah', '7322023128648508', 'Kota Palopo', '2029-04-19', 'Wanita', 'Anak', 'Abdillah Putra Al-Iman', 'Islam', 'SD', 'Pelajar', 'AB'),
(4, 'Gandi', '7322023128648513', 'Ragnar LionHeart', '7322023128649192', 'London', '2023-10-11', 'Pria', 'Anak', 'LionHeart', 'Kristen', 'SMP', 'Pelajar', 'B'),
(5, 'Gandi', '7322023128648513', 'Gyda LionHeart', '7322023128648508', 'London', '2021-02-02', 'Wanita', 'Anak', 'LionHeart', 'Kristen', 'SMA', 'Pelajar', 'A'),
(6, 'Gandi', '7322023128648513', 'LionHeart Logbrhook', '7322023128648428', 'Denmark', '1990-06-24', 'Pria', 'Kepala Keluarga', 'LionHeart', 'Kristen', 'S2 Rekayasa Perangka', 'Software Enggineerin', 'B'),
(7, 'Gandi', '7322023128648513', 'Silvia Bradhold', '7322023128640692', 'Kota Hamburg, Jerman', '1992-12-26', 'Wanita', 'Istri', 'LionHeart', 'Kristen', 'S2 Rekayasa Perangka', 'Software Enggineerin', 'A'),
(8, 'Kanea', '7322023895791450', 'Muh.Ali Husain', '7322023128648511', 'Gaza, Palestina', '2000-10-17', 'Pria', 'Anak', 'Abu Ali Abbas', 'Islam', 'S1 Sistem Perancanga', 'Pelajar', 'O');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `nama`, `username`, `password`, `gambar`) VALUES
(1, 'Abdillah P Al-Iman', 'admin', '$2y$10$dHXOmMxmX8J9wJIKGi6tI.woO0x9rGP6QaUZOik5a12g2HVTBZ76C', '6533eec0025f2.jpg'),
(66, 'Lukman, SE.', 'kepala desa', '$2y$10$zpnsHmydZqcewpJGEC5mheM8d3mbxt0Ue3Qb6VRqunlA/UJbmTYA2', '6533ef680691f.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `nama_sekolah` varchar(30) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `deskripsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pendidikan`
--

INSERT INTO `tb_pendidikan` (`id_pendidikan`, `nama_sekolah`, `gambar`, `alamat`, `deskripsi`) VALUES
(1, 'SDN Lenge-lengkese', '6534a246af767.jpg', 'dusun sapiri, desa sapanang', '<p>Sekolah ini merupakan sekolah tingkat dasar yang ada di dusun sapiri dan memiliki siswa berkisar 100-an</p>\r\n'),
(2, 'SDN BANTAULU', '6534a2a75c95c.jpg', 'dusun bantaulu, desa sapanang', '<p>Sekolah ini merupakan sekolah tingkat dasar yang ada di dusun sapanang dan memiliki siswa berkisar 150-an</p>\r\n'),
(3, 'SMPN 4 BINAMU', '6534a2e8ee562.jpg', 'dusun sarroangin', '<p>Sekolah ini merupakan sekolah tingkat menengah yang ada di desa sapanang dan memiliki siswa berkisar 300-an</p>\r\n'),
(4, 'SDN KANEA', '6534a31bb7d9a.jpg', 'dusun kanea, desa sapanang', '<p>Sekolah ini merupakan sekolah tingkat dasar yang ada di dusun kanea dan memiliki siswa berkisar 150-an</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `uploaded` date NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `gambar`, `judul`, `uploaded`, `deskripsi`) VALUES
(1, '653498cd28f2d.jpg', 'Sayur kangkung', '2023-10-28', '<p>Sayur kangkung merupakan salah satu tanaman pertanian yang di budidayakan oleh masyarakat desa sapanang, dan sayur ini mayoritas di pelihara oleh masyarakat dusun kanea.</p>\r\n'),
(2, '6534992e0b6dd.jpg', 'Sayur Bayam ', '2023-10-24', '<p>Sayur ini adalah sayur yang di tanam oleh beberapa masyarakat dusun kanea dan juga sayur ini memiliki harga yang relatif standar</p>\r\n'),
(5, '6534997d836e6.jpg', 'Lombok', '2023-10-31', '<p>Lombok cukup banyak di tanam oleh beberapa masyarakat di berbagai dusun di desa sapanang, meskipun musim kemarau tiba masyarakat tetap memelihara tanaman ini dan menjadi salah satu objek penghasilan mereka.</p>\r\n'),
(6, '653499dee736c.jpg', 'Kemangi', '2023-11-06', '<p>Tanaman ini merupakan tanaman yang bisa dijadikan sebagai bahan makanan maupun herbal sehingga tanaman ini cukup banyak menarik perhatian masyarakat desa sapanang terkhususnya di dusun kanea, sehingga tanaman ini lumayan banyak di budidayakan oleh masyarakat.</p>\r\n'),
(8, '65349a3fb0685.jpg', 'Jagung', '2023-10-24', '<p>Jagung merupakan salah satu tanaman pertanian yang banyak di pelihara oleh masyarakat desa sapanang, meskipun musim kemarau tiba, tanaman ini tetap di pelihara oleh masyarakat dan juga bisa menjadi pengganti dari makanan pokok beras pada saat musim kemarau tiba.</p>\r\n'),
(9, '65349ac65e663.jpg', 'Sayur Sawi', '2023-10-26', '<p>Sayur sawi adalah salah satu sayuran favorit oleh masyarakat desa sapanang, sehingga sayur ini menjadi objek sayuran yang paling di budidayakan oleh masyarakat desa sapanang, terkhususnya di dusun kanea dan juga sayur ini memiliki tingkat permintaan yang tinggi di pasar, sehingga menarik perhatian masyarakat untuk menanam sayuran ini.</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(11) NOT NULL,
  `sejarah` text NOT NULL,
  `detail` text DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `visi` varchar(200) DEFAULT NULL,
  `misi` varchar(550) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `sejarah`, `detail`, `gambar`, `visi`, `misi`) VALUES
(1, '<p>Sejarah desa sapanang berawal dari sebuah kerajaan kecil yang terdiri dari masing-masing adalah kerajaan binamu, kerajaan paitana dan kerajaan sapanang sendiri. (<em>sumber berita, H.HASYIM KR.NGERANG, Mantan kepala desa sapanang dua periode).</em> Dari kerajaan kecil ini pula terlahir pula raja-raja dari kerajaan sapanang sendiri, yaitu MALING DG LELE Sebagai raja pertama sapanang &ldquo;Panggilan raja bagi kaum bangsawan kerajaan belum dibedakan antara raja dengan ratu&rdquo;. Maling dg lele sebenarnya adalah Ratu desa sapanang akan tetapi penggunaan bahasa ratu pada masa itu belum terlalu lasim untuk digunakan sehingga dalam hal ini mereka menggunakan kata raja &ldquo;<em>panggilan bagi siapapun pemerintah pada saat itu&rdquo;.&nbsp;</em></p>\r\n\r\n<p>Sekitar tahun 1983 masa transisi sapanang telah resmi menjadi sebuah desa yang pada awalnya adalah sebuah kerajaan , lalu kemudian menjadi bori lalu kemudian berubah menjadi desa seiring dengan perjalanan waktu yang memaksa masyarakat merubah cara berfikir mereka menjadi lebih maju, babak baru untuk desa sapanang sapanang telah dimulai pada masa pemilihan kepala desa pertama, hampir semua tokoh, yang ada didesa sapanang mencalonkan diri untuk menjadi kepala desa, &ldquo; <em>Hasyim kr.ngerang, haruna kr.talli, karaeng ngero dan masih banyak lagi yang belum disebutkan oleh sumber, </em>mereka inilah yang berkompetisi dalam perebutan kursi kepala desa pada masa itu, yang nota benenya adalah pemilihan pertama dalam system demokrasi yang &ldquo; LUBER&rdquo;.</p>\r\n\r\n<p>Hegemoni politik terjadi pada masyarakat awam yang sebenarnya belum terlalu faham dengan system demokrasi itu sendiri, bahkan masing-masing dari perwakilan tiap dusun menjadikan kandidat mereka sebagai yang terbaik dan menganggap kandidat lain tidak layak untuk memerintah, termasuk persaingan antara dusun sapiri, sapanang dan bantaulu, ketiga dusun ini selalu menjadi momok bagi dusun lain yang dianggap saingan, pertentangan politik, isu &ndash;isu kotor dan kampanye hitam mulai menyebar memasuki, meracuni jiwa dan akal fikiran masyarakat sapanang, akan tetapi mereka tidak sadar bahwa sesungguhnya pemilihan itu adalah sebuah permainan yang tidak seharusnya dianggap serius ketika seorang kandidat kalah dalam pertarungan, karena itu adalah sebuah resiko untuk menang.Hasyim kr.ngerang terpilih menjadi kepala desa kedua desa sapanang, beliau memerintah sapanang kurang lebih dua puluh satu tahun, beliau memerintah sejak tahun 1983 &ndash; 1993.</p>\r\n\r\n<p>Singkat waktu pada tahun 2016, diadakan pemilihan secara serentak untuk periode 2016-2021 yang diikuti oleh lima calon kepala desa dan yang terpilih adalah LUKMAN SE. Namun kemenangannya digugat oleh ke empat calon yang kalah karena adanya administrasi kelengkapan berkas pemilihan LUKMAN, SE yang tidak memenuhi syarat, polemik terus berlanjut ke empat calon yang kalah tersebut terus menggugat sampai ke Mahkamah Agung hingga akhirnya pada tahun 2018 bulan desember LUKMAN, SE dinyatakan kalah dan SKnya dicabut oleh bupati Jeneponto dan resmi diberhentikan dan pemerintahan desa dipimpin oleh PJS yang diangkat oleh bupati yaitu Camat Binamu atas nama BASUKI BAHARUDDIN, SE. Berjalan waktu 1 tahun kepemimpinan PJS BASUKI BAHARUDDIN, SE hingga waktu pemilihan serentak pada tahun 2019, pada saat itu Badan Permusyawaratan Desa (BPD) tidak menjalankan tupoksinya sebagai mana mestinya sehingga terjadi Demo Besar-besaran yang dilakukan masyarakat yang menuntut BPD dibubarkan karena dinilai sengaja menunda &ndash; nunda pemilihan serentak Desa sapanang Tahun 2019, yang akhirnya Desa Sapanang tidak ikut serta dalam pemilihan serentak pada waktu itu, Demo terus berlanjut, Kantor Desa Sapanang disegel warga dan aktivitas kantor aparat Desa berhenti, sebagian besar masyarakat Desa Sapanang menuntut agar BPD segera di bubarkan dan melakukan pemilihan BPD baru dengan cara pergantian antar waktu melalui musyawarah desa, Akhirnya tuntutan warga di terima dan pemilihan pergantian antar waktu BPD dilaksanakan, dihadiri oleh tokoh-tokoh penting masyarakat Desa Sapanang, musyawarah tersebut dipimpin oleh H.Isnaad Ibrahim kr Lontang (Mantan Kepala Desa Sapanang Dua Periode) hasil musyawarah disepakati dan yang terpilih menjadi ketua BPD adalah MAHYUDIN, ST dan 8 orang anggotanya. Dengan kepemimpinan baru Mahyudin, ST sebagai ketua BPD berusaha&nbsp; mewujudkan tuntutan warga Desa Sapanang untuk melaksanakan pemilihan serentak Kepala Desa, namun Aturan UU tidak membenarkan adanya pemilihan serentak di Desa Sapanang dengan alasan keterlambatan kecuali dengan cara Pemilihan Antar Waktu (PAW). Warga masyarakat Desa Sapanang semakin bingung karena Pemilihan Antar Waktu (PAW) tersebut belum pernah di laksanakan di Kabupaten Jeneponto. Selang berjalannya waktu BPD terpilih terus mendalami Aturan &ndash; Aturan pemilihan antar waktu (PAW) sampai ke Kabupaten Sinjai untuk studi banding, karena Kabupaten Sinjai adalah satu-satunya Kabupaten di Sulawesi Selatan yang pernah melaksanakan kegiatan pemilihan Kepala Desa melalui Pemilihan Antar Waktu (PAW).</p>\r\n\r\n<p>Dengan proses yang panjang akhir Tahun 2019 untuk pertama kalinya di Kabupaten Jeneponto pemilihan Kepala Desa Antar Waktu (PAW) dilaksanakan, melalui pemilihan tersebut ada tiga calon ikut serta yaitu LUKMAN, SE, SYAMSUDDIN DG NOMPO dan MUSTAFA RAMLAN dan akhirnya dimenangkan kembali oleh LUKMAN SE, hingga masa Jabatan 2019-2021.Dan Desa Sapanang yang tadinya Cuma lima dusun menjadi 6 dusun yaitu dusun Sapanang dimekar menjadi dua dusun yaitu Dusun Bantaulu maka secara administrasi Dasa Sapanang saat ini terdapat Enam Dusun.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Desa sapanang adalah satu-satunya desa di antara 12 Kelurahan yang ada di wilayah Kecamatan Binamu. Desa sapanang memiliki luas wilayah &nbsp;3348 Km&sup2;, dengan ketinggian 8 M hingga 80 M di atas permukaan laut. Jarak desa sapanang dengan ibu kota Kabupaten sekitar 4 Km dengan waktu tempuh&nbsp;kurang lebih 5 menit. Secara administratif desa sapanang berbatasan langsung dengan Desa Jombe dan Kayuloe Barat di sebalah utara, Kelurahan Balang sebelah selatan, Kelurahan Bontoa di sebelah barat serta Kelurahan Empoang utara dan Desa Kayuloe Barat sebelah timur. Desa sapanang memiliki penduduk dengan jumlah 4.014 jiwa, serta jumlah penduduk untuk kategori pria yaitu 1.865 jiwa dan jumlah penduduk wanita yaitu 1.956 jiwa.</p>\r\n', '6533f0e6981dc.jpg', '<p><strong>&lsquo;&rsquo; </strong><strong>MEWUJUDKAN MASYARAKAT DESA SAPANANG YANG SEJAHTERA, </strong></p>\r\n\r\n<p><strong>MELALUI&nbsp; PERTANIAN</strong><strong>, DAN AGAM</strong><strong>A</strong>', '<p>1. Mewujudkan tata kelola pemerintahan desa yang baik melalui pelayanan yang prima.</p>\r\n\r\n<p>2. Meningkatkan pembangunan fisik dan Non fisik diberbagai bidang</p>\r\n\r\n<p>3. Meningkatkan sektor pertanian</p>\r\n\r\n<p>4. Peremajaan pompanisasi dan irigasi-irigasi agar maksimal pemanfaatannya</p>\r\n\r\n<p>5. Peningkatan pemberdayaan dengan kegiatan berkesinambungan</p>\r\n\r\n<p>6. Meningkatkan kemampuan anak &ndash; anak santri TPA dan Remaja yang berbasis agama.</p>\r\n\r\n<p>7. Mencetak Hafis dan Hafisa serta&nbsp;Halima di semua dusun</p>\r\n'),
(2, '<p>abdi</p>\r\n', '<p>jsvdnslkdjsndlfk</p>\r\n', '6534970cb3a6c.jpg', '<p>jdsbkchsaj</p>\r\n', '<p>dchjsbvsdhk</p>\r\n'),
(3, '<p>xkjvbhjzdsb</p>\r\n', '<p>djhfajisdf</p>\r\n', '65349724c97e5.jpg', '<p>djfbjads</p>\r\n', '<p>ndsjfna</p>\r\n'),
(4, '<p>cdnjhsnkjcns</p>\r\n', '<p>ncjsns</p>\r\n', '6534974c88474.jpg', '<p>nfsdfnsj</p>\r\n', '<p>snfjsn</p>\r\n'),
(5, '<p>bcnsbjcs</p>\r\n', '<p>jksddfjsk</p>\r\n', '6534979a6f3c9.jpg', '<p>kfsns</p>\r\n', '<p>ndsjn</p>\r\n'),
(6, '<p>skcfsnkd</p>\r\n', '<p>sdsdss</p>\r\n', '653497ba3b3bf.jpg', '<p>sds</p>\r\n', '<p>vscx</p>\r\n'),
(7, '<p>jnknk</p>\r\n', '<p>jjfskd</p>\r\n', '653497d81528f.jpg', '<p>jfosd</p>\r\n', '<p>ndskns</p>\r\n'),
(8, '<p>askjnsk</p>\r\n', '<p>sasas</p>\r\n', '653497faa8d79.jpg', '<p>asas</p>\r\n', '<p>zxzxz</p>\r\n'),
(9, '<p>asasa</p>\r\n', '<p>zxzx</p>\r\n', '6534981b3fb49.jpg', '<p>zxzx</p>\r\n', '<p>&nbsp;c cdfdf</p>\r\n'),
(10, '<p>fgdfdf</p>\r\n', '<p>fvfgd</p>\r\n', '653498401d556.jpg', '<p>dfdf</p>\r\n', '<p>dfdf</p>\r\n'),
(11, '<p>vdfsd</p>\r\n', '<p>fgdfd</p>\r\n', '653498587f4e8.jpg', '<p>sdsds</p>\r\n', '<p>bgfgbf</p>\r\n'),
(12, '<p>Mesjid Dusun Sapanang</p>\r\n', '<p>dsfbsdhj</p>\r\n', '6534a1c577872.jpg', '<p>bsncfbs</p>\r\n', '<p>njdksfkbsd</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_struktur`
--

CREATE TABLE `tb_struktur` (
  `id_struktur` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_struktur`
--

INSERT INTO `tb_struktur` (`id_struktur`, `nama`, `jabatan`, `gambar`) VALUES
(1, 'Abdillah P Al-Iman', 'Kepala Desa', '6533f1fd23de0.jpg'),
(2, 'Andi Aini', 'Bendahara Desa', '6533f210e7c5b.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat_keluar`
--

CREATE TABLE `tb_surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `no_surat` varchar(25) NOT NULL,
  `asal_surat` varchar(40) NOT NULL,
  `perihal` varchar(40) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_surat_diterima` date NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_surat_keluar`
--

INSERT INTO `tb_surat_keluar` (`id_surat_keluar`, `no_surat`, `asal_surat`, `perihal`, `tgl_surat`, `tgl_surat_diterima`, `file`) VALUES
(1, '01.014/SMA-SM/V/2023', 'Universitas Dipa Makassar', 'Permohonan izin untuk sosialiasi', '2023-11-01', '2023-10-25', '65392f1080dd1.docx'),
(3, '08.119/DP-KM/VII/2023', 'PT.ABDI-AINI', 'Permohonan izin untuk sosialiasi', '2023-12-29', '2023-11-21', '65392f927673e.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat_masuk`
--

CREATE TABLE `tb_surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `no_surat` varchar(25) NOT NULL,
  `asal_surat` varchar(40) NOT NULL,
  `perihal` varchar(40) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_surat_diterima` date NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_surat_masuk`
--

INSERT INTO `tb_surat_masuk` (`id_surat_masuk`, `no_surat`, `asal_surat`, `perihal`, `tgl_surat`, `tgl_surat_diterima`, `file`) VALUES
(1, '08.119/DP-KM/VII/2023', 'PT.VALE', 'Permohonan izin untuk sosialiasi', '2023-10-31', '2023-10-25', '653655b3f124f.docx'),
(4, '030/M2/LMJ/XI/2023', 'Universitas Dipa Makassar', 'Permohonan izin untuk Praktikum', '2023-12-20', '2023-11-08', '6536846b0cc79.pdf'),
(5, '01.005/SMA-SM/V/2019', 'PT.Gudang Garam', 'Permohonan izin Sosialisasi ', '2023-10-31', '2023-10-25', '6538a78b24a18.docx'),
(6, '01.005/SMA-SM/V/2013', 'jeneponto', 'izin usaha', '2023-10-30', '2023-10-25', '653eff37e30ad.docx');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indeks untuk tabel `tb_kk`
--
ALTER TABLE `tb_kk`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `tb_struktur`
--
ALTER TABLE `tb_struktur`
  ADD PRIMARY KEY (`id_struktur`);

--
-- Indeks untuk tabel `tb_surat_keluar`
--
ALTER TABLE `tb_surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indeks untuk tabel `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_informasi`
--
ALTER TABLE `tb_informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_kk`
--
ALTER TABLE `tb_kk`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_struktur`
--
ALTER TABLE `tb_struktur`
  MODIFY `id_struktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_surat_keluar`
--
ALTER TABLE `tb_surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
