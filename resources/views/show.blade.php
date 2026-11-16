@extends('layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit User</h3>
                        </div>

                        <form class="form-valide" method="post" action="{{ route('users.update', $dt['id']) }}">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name" class="text-danger">Nama *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $dt['nama_lengkap'] ?? $dt['name'] ?? '') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="text-danger">Email *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email', $dt['email_user'] ?? $dt['email'] ?? '') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="address" class="text-danger">Alamat *</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address', $dt['address'] ?? '') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone_number" class="text-danger">No. Hp. *</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number" value="{{ old('phone_number', $dt['phone_number'] ?? '') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="city" class="text-danger">Kota *</label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" value="{{ old('city', $dt['kota'] ?? $dt['city'] ?? '') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="roles" class="text-danger">Roles *</label>
                                    <select class="custom-select" name="roles" id="roles" required>
                                        <option value="">Pilih</option>
                                        <option value="Admin" {{ (old('roles', $dt['role'] ?? $dt['roles'] ?? '') == 'Admin' || old('roles', $dt['role'] ?? $dt['roles'] ?? '') == '1') ? 'selected' : '' }}>Admin</option>
                                        <option value="User" {{ (old('roles', $dt['role'] ?? $dt['roles'] ?? '') == 'User' || old('roles', $dt['role'] ?? $dt['roles'] ?? '') == '2') ? 'selected' : '' }}>User</option>
                                    </select>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection