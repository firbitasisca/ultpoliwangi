<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kartu Antrean</title>
    <style>
        body { font-family: sans-serif; text-align: center; }
        .nomor { font-size: 80px; font-weight: bold; margin: 30px 0; }
        .info { font-size: 18px; margin-bottom: 10px; }
        .box { border: 2px dashed #000; padding: 30px; width: 80%; margin: auto; }
    </style>
</head>
<body>
    <h2>UNIT LAYANAN TERPADU POLIWANGI</h2>
    <div class="box">
        <div class="nomor">{{ $antrean->nomor_antrean }}</div>
        <div class="info">Nama: <strong>{{ $antrean->nama }}</strong></div>
        <div class="info">Tanggal: <strong>{{ \Carbon\Carbon::parse($antrean->tanggal)->translatedFormat('d F Y') }}</strong></div>
    </div>
    <p style="margin-top: 40px;">Harap menunggu nomor Anda dipanggil.</p>
</body>
</html>
