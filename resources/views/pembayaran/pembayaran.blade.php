@extends('layouts.master')

@section('title')
    Pembayaran
@endsection

@section('main-header')
    <h3><i class="fa fa-home"></i> Dashboard</h3>
    <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Pembayaran</li>
        </ol>
    </div>
@endsection

@section('main-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Pembayaran</h3>
        </div>
        <div class="panel-body">
            <div class="table-toolbar-left">
                <a href="{{ url('pembayaran/create') }}" class="btn btn-pink"><i class="fa fa-plus"></i> Add Pembayaran</a>
            </div>
            <div class="table-toolbar-right">
                <button class="btn btn-danger" data-toggle="modal" data-target="#cetakPdfModal">
                    <i class="fa fa-file-pdf-o"></i> Cetak PDF
                </button>
            </div>

            <table id="demo-dt-basic" class="table table-striped table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>NIM</th>
                        <th>Tanggal Bayar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->kode_pembayaran }}</td>
                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->tanggal_pembayaran }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ url('pembayaran/' . $item->kode_pembayaran . '/cetak') }}" class="btn btn-primary" style="margin-right: 5px;"><i class="fa fa-print"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Cetak PDF -->
<div class="modal fade" id="cetakPdfModal" tabindex="-1" role="dialog" aria-labelledby="cetakPdfModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cetakPdfModalLabel">Cetak PDF</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ ('/cetak_pdf') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="tanggalAwal">Tanggal Awal</label>
                        <input type="date" name="tanggal_awal" id="tanggalAwal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tanggalAkhir">Tanggal Akhir</label>
                        <input type="date" name="tanggal_akhir" id="tanggalAkhir" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Cetak</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        let table = new DataTable('#demo-dt-basic');
    </script>
@endsection
