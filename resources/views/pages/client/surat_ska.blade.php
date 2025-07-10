<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Aktif Kuliah</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            margin: 40px;
            font-size: 10pt;
        }

        .kop-container {
            display: flex;
            align-items: center;
            border-bottom: 3px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .kop-container img {
            width: 90px;
            height: auto;
            margin-right: 20px;
        }

        .kop-text {
            text-align: center;
            flex: 1;
        }

        .kop-text h3,
        .kop-text p {
            margin: 0;
        }

        table {
            margin-top: 10px;
            margin-bottom: 10px;
            width: 100%;
            border-collapse: collapse;
        }

        td {
            vertical-align: top;
            padding: 3px;
        }

        table td:first-child {
            width: 160px;
        }

        .text-center {
            text-align: center;
        }

        .text-underline {
            text-decoration: underline;
        }

        .mt-20 {
            margin-top: 20px;
        }

        .ttd {
            margin-top: 50px;
            text-align: right;
            width: 100%;
        }
    </style>
</head>

<body>

    <!-- Kop Surat -->
    <div class="kop-container">
        <img src="{{ asset('images/logo-title-poliwangi.png') }}" alt="Logo Poliwangi">
        <div class="kop-text">
            <h3>KEMENTERIAN PENDIDIKAN TINGGI, SAINS, DAN TEKNOLOGI</h3>
            <h3>POLITEKNIK NEGERI BANYUWANGI</h3>
            <p>Jalan Raya Jember Kilometer 13 Labanasem, Kabat, Banyuwangi, 68461</p>
            <p>Telepon (0333) 636780 | Laman: www.poliwangi.ac.id | Email: poliwangi@poliwangi.ac.id</p>
        </div>
    </div>

    <!-- Judul Surat -->
    <div class="text-center mt-20">
        <h4 class="text-underline">SURAT KETERANGAN AKTIF KULIAH</h4>
        <p>Nomor: {{$pengajuan->nomor_surat}}</p>
    </div>

    <!-- Data Pejabat -->
    <p>Yang bertanda tangan di bawah ini:</p>
    <table>
        <tr>
            <td>Nama</td>
            <td>: Abdul Rohman S.T., M.T.</td>
        </tr>
        <tr>
            <td>NIP/PPK</td>
            <td>: 198304132021211003</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>: Wakil Direktur Bidang Akademik</td>
        </tr>
    </table>

    <!-- Data Mahasiswa -->
    <p>Menerangkan dengan sebenarnya bahwa:</p>
    <table>
        <tr>
            <td>Nama</td>
            <td>: {{$pengajuan->nama_pemohon}}</td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>: {{$pengajuan->nomor_identitas}}</td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>: {{$pengajuan->jurusan}}</td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>: {{$pengajuan->prodi->nama_prodi}}</td>
        </tr>
        <tr>
            <td>Semester</td>
            <td>: {{$pengajuan->semester}}</td>
        </tr>
        <tr>
            <td>Tahun Angkatan</td>
            <td>: {{$pengajuan->tahun_angkatan}}</td>
        </tr>
        <tr>
            <td>Tahun Akademik</td>
            <td>: 2024/2025</td>
        </tr>
    </table>

    <!-- Data Wali -->
    <p>dan wali anak tersebut:</p>
    <table>
        <tr>
            <td>Nama</td>
            <td>: {{$pengajuan->nama_wali}}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>: {{$pengajuan->pekerjaan}}</td>
        </tr>
        <tr>
            <td>NIP/NIK</td>
            <td>: {{$pengajuan->nik}}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>: {{$pengajuan->jabatan}}</td>
        </tr>
        <tr>
            <td>Instansi</td>
            <td>: {{$pengajuan->instansi}}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: {{$pengajuan->dusun}}, {{$pengajuan->desa}}, Kec.{{$pengajuan->kecamatan}}, Kab.{{$pengajuan->kabupaten}}</td>
        </tr>
    </table>

    <!-- Isi Surat -->
    <p>
        Adalah benar-benar mahasiswa aktif Politeknik Negeri Banyuwangi pada Semester Ganjil Tahun Akademik 2024/2025.
        Surat keterangan ini dipergunakan untuk keperluan <strong>{{$pengajuan->keperluan_surat}}</strong>.
    </p>

    <p>
        Demikian surat ini dibuat dengan sebenarnya agar dapat digunakan sebagaimana mestinya.
    </p>

    <!-- Tanda Tangan -->
    <div class="ttd">
        Banyuwangi, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
        Wakil Direktur Bidang Akademik,<br><br><br><br>
        <u>Abdul Rohman S.T., M.T.</u><br>
        NIP/PPK 198304132021211003
    </div>

</body>

</html>
