<!DOCTYPE html>
<html>
<head>
    <title>Cetak Transaksi Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        .transaction-table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }

        .transaction-table th,
        .transaction-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .no-print {
            display: none;
        }

        /* Gaya khusus untuk cetakan */
        @media print {
            body {
                font-size: 14px;
            }

            .no-print {
                display: none;
            }

            @page {
                size: portrait;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <h1>Detail Transaksi Pembayaran</h1>
    <table class="transaction-table">
        <tr>
            <th>Kode Pembayaran</th>
            <td>{{ $pembayaran->kode_pembayaran }}</td>
        </tr>
        <tr>
            <th>NIM</th>
            <td>{{ $pembayaran->nim }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $pembayaran->nama }}</td>
        </tr>
        <tr>
            <th>Jurusan</th>
            <td>{{ $pembayaran->jurusan }}</td>
        </tr>
        <tr>
            <th>Tanggal Bayar</th>
            <td>{{ $pembayaran->tanggal_pembayaran }}</td>
        </tr>
        <tr>
            <th>Jumlah</th>
            <td>{{ $pembayaran->ukt }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $pembayaran->status }}</td>
        </tr>
    </table>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
