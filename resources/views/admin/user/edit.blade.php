@extends('layouts.main')

@section('container')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
        <form method="POST" action="/aset" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="is_active">Aktif User</label>
                <select name="is_active" id="is_active" class="form-control @error('is_active') is-invalid @enderror select2bs4">
                    <option value="aktif" {{ ($users->is_active === 'aktif') ? 'Selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ ($users->is_active === 'nonaktif') ? 'Selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>
            {{-- @error('is_active')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror --}}
            <div class="form-group">
                <label for="role">Rolee</label>
                <select name="role" id="role" class="form-control @error('role') is-invalid @enderror select2bs4">
                    <option value="">Pilih Role</option>
                    <option value="staff">Staff</option>
                    <option value="kabag">Kepala Bagian</option>
                </select>
            </div>
        </div>
        </form>
    </div>
    
@endsection