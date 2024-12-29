@extends('admin.dashboard')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-dark font-weight-bold">Data Barang Terjual</h3>
                        <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addModal">
                            <i class="fas fa-plus"> Tambah Data </i>
                        </button>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                    <tr class="text-dark">
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Deskripsi</th>
                                        <th>Jumlah Terjual</th>
                                        <th>Tanggal Terjual</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($barangTerjual as $index => $bt)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $bt->etalase->nama_barang }}</td>
                                        <td>{{ $bt->etalase->deskripsi }}</td>
                                        <td>{{ $bt->jumlah_terjual }}</td>
                                        <td>{{ $bt->tanggal_terjual }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $bt->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="{{ route('barang-terjual.destroy', $bt->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Modal Tambah Data -->
                        <div class="modal fade" id="addModal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data Barang Terjual</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="{{ route('barang-terjual.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama Barang</label>
                                                <select name="etalase_id" class="form-control">
                                                    @foreach($etalase as $ets)
                                                    <option value="{{ $ets->id }}">{{ $ets->nama_barang }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Jumlah Terjual</label>
                                                <input type="number" name="jumlah_terjual" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Terjual</label>
                                                <input type="date" name="tanggal_terjual" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Edit Data -->
                        @foreach($barangTerjual as $bt)
                        <div class="modal fade" id="editModal{{ $bt->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Data Barang Terjual</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="{{ route('barang-terjual.update', $bt->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama Barang</label>
                                                <select name="etalase_id" class="form-control">
                                                    @foreach($etalase as $ets)
                                                    <option value="{{ $ets->id }}" {{ $bt->etalase_id == $ets->id ? 'selected' : '' }}>{{ $ets->nama_barang }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Jumlah Terjual</label>
                                                <input type="number" name="jumlah_terjual" class="form-control" value="{{ $bt->jumlah_terjual }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Terjual</label>
                                                <input type="date" name="tanggal_terjual" class="form-control" value="{{ $bt->tanggal_terjual }}" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection