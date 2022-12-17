@extends('layouts.main')

@section('container')

    <div class="row">
      <div class="col">
      <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">Profile</li>
      </ol>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-12">
      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div> 
      @endif
      </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/avatar/man.png') }}" alt="User profile picture">
                </div>
                  <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>
                  <p class="text-muted text-center">{{ auth()->user()->role }}</p>
                  <hr>
                  <p class="text-muted text-center"><b>Email: </b> {{ auth()->user()->email }}</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                  @foreach ($users as $user)
                    @if ($user->id == auth()->user()->id)
                      <form class="form-horizontal" method="POST" action="/profile/{{ $user->id }}">
                        @method('put')
                        @csrf
                        <div class="form-group row">
                          <label for="name" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name', $user->name) }}">
                          </div>
                          @error('name')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group row">
                          <label for="email" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}">
                          </div>
                          @error('email')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group row">
                          <label for="password" class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="password" min="5" max="7">
                          </div>
                          @error('password')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Submit</button>
                          </div>
                        </div>
                      </form>
                    @endif
                  @endforeach
                </div>
            </div>
        </div>
    </div>


    
@endsection