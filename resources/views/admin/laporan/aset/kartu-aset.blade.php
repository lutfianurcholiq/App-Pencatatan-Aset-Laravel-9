@extends('layouts.main')

@section('container')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
        <div class="card-body">
            <p class="text-danger">*Jika aset belum dilakukan penyusutan, tidak ada muncul kartu penyusutan aset</p>
            <table id="dataTables" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Aset</th>
                        <th>Sekolah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($susut as $st)
                        @if ($st->status == "telah disusutkan")
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $st->nama_aset }}</td>
                                <td>{{ $st->nama_sekolah }}</td>
                                <td>
                                    <a href="/laporan/kartu_aset/detail/{{ $st->id_susut }}" class="btn btn-primary">Kartu Aset</a>
                                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Kartu Aset</button> --}}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
                {{-- @foreach ($asets as $item)
                <!-- Modal Kartu Aset -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            ...
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach --}}
            </table>
        </div>
    </div>
    
@endsection