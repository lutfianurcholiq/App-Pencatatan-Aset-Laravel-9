@extends('layouts.main')

@section('container')

    <div class="row">
        <div class="col-md-12">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div> 
        @endif
        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div> 
        @endif
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
        <div class="card-body">
            <button class="btn btn-primary mb-3" onclick="print()"><i class="fas fa-print"> </i></button>
        <table id="dataTables" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Aktif/Nonaktif</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if ($user->role != 'admin')
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->is_active == 'aktif')
                                    <span class="badge badge-success text-uppercase">{{ $user->is_active }}</span>
                                    @else
                                    <span class="badge badge-danger text-uppercase">{{ $user->is_active }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->role == 'update role')
                                    <span class="badge badge-info text-uppercase">Update Role</span>
                                    @elseif($user->role == 'staff')
                                    <span class="badge badge-secondary text-uppercase">{{ $user->role }}</span>
                                    @elseif($user->role == 'manager')
                                    <span class="badge badge-primary text-uppercase">{{ $user->role }}</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#editUser{{ $user->id }}"><i class="nav-icon fas fa-edit"></i></button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#hapusUser{{ $user->id }}"><i class="nav-icon fas fa-trash"></i></button>
                                </td>
                            </tr>
                    @endif
                @endforeach
            </tbody>
            @foreach ($users as $user)
            {{-- Modal Hapus User --}}
            <div class="modal fade" id="hapusUser{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin ingin menghapus user <b>{{ $user->name }}</b>?</p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <form action="/activeUser/{{ $user->id }}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Yakin</button>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            {{-- End Modal --}}
    
            {{-- Modal Edit User --}}
            <div class="modal fade" id="editUser{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="/activeUser/{{ $user->id }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="modal-body">
                            @if ($user->role == 'update role')
                                <div class="form-group">
                                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror select2bs4">
                                        <option value="">Pilih Role</option>
                                        <option value="staff">Staff</option>
                                        <option value="manager">Manager</option>
                                    </select>
                                </div>
                            @elseif($user->is_active == 'aktif')
                                <p>Anda ingin menonaktifkan user <b>{{ $user->name }}</b>?</p>
                                <p>Status saat ini : </p>
                                <div class="form-group">
                                    <input type="text" name="is_active" id="is_active" class="form-control @error('is_active') is-invalid @enderror" value="{{ $user->is_active }}" readonly>
                                </div>
                            @else
                                <p>Anda ingin mengaktifkan user <b>{{ $user->name }}</b>?</p>
                                <p>Status saat ini : </p>
                                <div class="form-group">
                                    <input type="text" name="is_active" id="is_active" class="form-control @error('is_active') is-invalid @enderror" value="{{ $user->is_active }}" readonly>
                                </div>
                            @endif
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-danger">Update</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            {{-- End Modal --}}
            @endforeach
        </table>
    </div>
</div>

@endsection