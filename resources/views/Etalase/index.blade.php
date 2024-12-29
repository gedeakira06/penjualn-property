@extends('admin.dashboard')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
    <h3 class="text-dark font-weight-bold">Data Etalase</h3>

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
                    <th>Stok</th>
                    <th>Kode Barang</th>
                    <th>Harga Satuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($etalase as $index => $ets)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $ets->nama_barang }}</td>
                    <td>{{ $ets->deskripsi }}</td>
                    <td>{{ $ets->stock }}</td>
                    <td>{{ $ets->kode_barang }}</td>
                    <td>{{ $ets->harga }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $ets->id }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <a href="{{ route('etalase.destroy', $ets->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
                    <h5 class="modal-title">Tambah Data Etalase</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('etalase.store') }}" method="POST">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" required>
            @error('nama_barang') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" required>
            @error('deskripsi') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stock" class="form-control" required>
            @error('stock') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label>Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" required>
            @error('kode_barang') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label>Harga Satuan</label>
            <input type="text" name="harga" class="form-control" required>
            @error('harga') <small class="text-danger">{{ $message }}</small> @enderror
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
    @foreach($etalase as $ets)
    <div class="modal fade" id="editModal{{ $ets->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Etalase</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('etalase.update', $ets->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" value="{{ $ets->nama_barang }}" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" value="{{ $ets->deskripsi }}" required>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" name="stock" class="form-control" value="{{ $ets->stock }}" required>
                        </div>
                        <div class="form-group">
                            <label>Kode Barang</label>
                            <input type="text" name="kode_barang" class="form-control" value="{{ $ets->kode_barang }}" required>
                        </div>
                        <div class="form-group">
                            <label>Harga Satuan</label>
                            <input type="text" name="harga" class="form-control" value="{{ $ets->harga }}" required>
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
@endsection