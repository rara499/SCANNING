<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Peringatan / Keterangan Siswa - {{ $siswa->nama_lengkap }}</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12pt;
            line-height: 1.5;
            color: #000;
            margin: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 3px double #000;
            padding-bottom: 10px;
            margin-bottom: 25px;
        }
        .header h2 {
            margin: 0;
            font-size: 16pt;
            text-transform: uppercase;
        }
        .header h3 {
            margin: 2px 0;
            font-size: 14pt;
        }
        .header p {
            margin: 0;
            font-size: 10pt;
            color: #444;
        }
        .content {
            margin-bottom: 30px;
        }
        .table-data {
            width: 100%;
            margin: 15px 0;
            border-collapse: collapse;
        }
        .table-data td {
            padding: 5px 8px;
            vertical-align: top;
        }
        .footer {
            margin-top: 50px;
            float: right;
            width: 250px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>PEMERINTAH PROVINSI LAMPUNG</h2>
        <h2>DINAS PENDIDIKAN DAN KEBUDAYAAN</h2>
        <h3>SMK NEGERI 1 AIR NANINGAN</h3>
        <p>Jl. Makam Batu Ruguk, Karang Sari, Kec. Air Naningan, Kab. Tanggamus, Lampung, 35377</p>
    </div>

    <div class="content">
        <h4 style="text-align: center; text-decoration: underline; margin-bottom: 15px;">SURAT KETERANGAN AKUMULASI POIN KEDISIPLINAN SISWA</h4>

        <p>Yang bertanda tangan di bawah ini Kepala / Tim Kesiswaan SMKN 1 Air Naningan menerangkan bahwa:</p>

        <table class="table-data">
            <tr>
                <td style="width: 190px;">Nama Lengkap</td>
                <td style="width: 10px;">:</td>
                <td><strong>{{ $siswa->nama_lengkap }}</strong></td>
            </tr>
            <tr>
                <td>Nomor Induk Siswa (NIS)</td>
                <td>:</td>
                <td>{{ $siswa->nis }}</td>
            </tr>
            <tr>
                <td>Kelas / Kompetensi Keahlian</td>
                <td>:</td>
                <td>{{ $siswa->kelas }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $siswa->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $siswa->alamat ?: '-' }}</td>
            </tr>
            <tr>
                <td>Total Poin Saat Ini</td>
                <td>:</td>
                <td><strong>{{ $siswa->total_poin }} Poin</strong> (Poin Awal: {{ $siswa->poin_awal }}, Prestasi: +{{ $siswa->poin_tambah }}, Pelanggaran: -{{ $siswa->poin_kurang }})</td>
            </tr>
            <tr>
                <td>Status Kedisiplinan</td>
                <td>:</td>
                <td><strong>{{ $siswa->total_poin >= 100 ? 'Status: Baik / Disiplin' : 'Status: Perlu Pembinaan' }}</strong></td>
            </tr>
        </table>

        @if(isset($riwayatCatatan) && $riwayatCatatan->isNotEmpty())
            <h4 style="margin-top: 15px; margin-bottom: 8px; font-size: 11pt;">Rincian Catatan Perilaku & Sikap Siswa:</h4>
            <table style="width: 100%; border-collapse: collapse; font-size: 10pt; margin-bottom: 15px;">
                <thead>
                    <tr style="background-color: #f0f0f0;">
                        <th style="border: 1px solid #000; padding: 5px; text-align: center; width: 30px;">No</th>
                        <th style="border: 1px solid #000; padding: 5px; width: 80px;">Tanggal</th>
                        <th style="border: 1px solid #000; padding: 5px; width: 90px;">Jenis</th>
                        <th style="border: 1px solid #000; padding: 5px;">Keterangan Aktivitas</th>
                        <th style="border: 1px solid #000; padding: 5px; text-align: center; width: 60px;">Poin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riwayatCatatan as $idx => $r)
                        <tr>
                            <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $idx + 1 }}</td>
                            <td style="border: 1px solid #000; padding: 5px;">{{ $r->tanggal_catatan }}</td>
                            <td style="border: 1px solid #000; padding: 5px;">{{ ucfirst($r->jenis) }}</td>
                            <td style="border: 1px solid #000; padding: 5px;">{{ $r->keterangan }}</td>
                            <td style="border: 1px solid #000; padding: 5px; text-align: center; font-weight: bold;">
                                {{ $r->jenis == 'prestasi' ? '+' . $r->nilai_poin : '-' . $r->nilai_poin }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <p style="margin-top: 15px;">Demikian surat keterangan akumulasi kedisiplinan dan poin karakter ini dibuat dengan sebenarnya untuk dipergunakan sebagaimana mestinya.</p>
    </div>

    <div class="footer">
        <p>Air Naningan, {{ date('d F Y') }}<br>Guru Bimbingan Konseling / Kesiswaan,</p>
        <br><br><br>
        <p><strong>( _______________________ )</strong><br>NIP. ....................................</p>
    </div>

</body>
</html>
