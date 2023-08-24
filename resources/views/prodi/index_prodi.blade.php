@extends('layouts.master')

@section('title')
    Prodi
@endsection

@section('main-header')
    <h3><i class="fa fa-home"></i> Prodi</h3>
    <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Data Master</a></li>
            <li class="active">Prodi</li>
        </ol>
    </div>
@endsection

@section('main-content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Prodi</h3>
        </div>
        <div class="panel-body">
            <div id="demo-custom-toolbar2" class="table-toolbar-left">
                <a href="{{ route('prodi.create') }}" class="btn btn-pink"><i class="fa fa-plus"></i> Add Prodi</a>
            </div>
            <table id="demo-dt-basic" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="col-md-2">Kode</th>
                        <th class="col-md-8">Jurusan</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->kode }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>
                                <a href="{{ route('prodi.edit', $item->kode) }}" class="btn btn-warning"
                                    style="margin-right: 5px;"><i class="fa fa-pencil"></i></a>
                                <a href="{{ route('prodi.destroy', $item->kode) }}" class="btn btn-danger"
                                    onclick="event.preventDefault();
                                        if (confirm('Yakin Menghapus Data??')) {
                                            document.getElementById('delete-form-{{ $item->kode }}').submit();
                                        }"><i
                                        class="fa fa-trash"></i></a>
                                <form id="delete-form-{{ $item->kode }}" action="{{ route('prodi.destroy', $item->kode) }}"
                                    method="post" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let table = new DataTable('#demo-dt-basic');
    </script>
@endsection
