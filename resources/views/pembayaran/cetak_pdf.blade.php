<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        thead {
            background-color: #f2f2f2;
        }

        .periode {
            text-align: center;
            margin-bottom: 10px;
        }

        .total-container {
            text-align: right;
            margin-top: 20px;
        }

        .total-label {
            font-weight: bold;
        }

        tfoot {
            border: none;
        }
    </style>
</head>
<body>
    <h1>Laporan Pembayaran</h1>
    <div class="periode">
        <strong>Periode Tanggal:</strong> {{ $tanggalAwal }} Sampai {{ $tanggalAkhir }}
    </div>
    <table>
        <thead>
            <tr>
                <th>Kode Pembayaran</th>
                <th>NIM</th>
                <th>Tanggal Pembayaran</th>
                <th>UKT</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->kode_pembayaran }}</td>
                <td>{{ $item->nim }}</td>
                <td>{{ $item->tanggal_pembayaran }}</td>
                <td>{{ $item->ukt }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="total">Total Pendapatan:</td>
                <td class="total">{{ $data->sum('ukt') }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
