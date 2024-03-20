@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tempat Penampung : <strong>{{ $penampung->nama }}</strong></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Modal -->
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <form action="{{ route('penampung.update', $penampung->id) }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Penanggung Jawab</label>
                        <div class="col-sm-10">
                          <select class="form-control form-select" name="user_id">
                            <option value="{{ old('user_id', $penampung->User->id) }}">{{ old('user_id', $penampung->User->name) }}</option>
                            @foreach ($user as $v)
                            <option value="{{ $v->id }}">{{ $v->name }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputUsername" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputUsername" name="nama" value="{{ old('nama', $penampung->nama) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputUsername" class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputUsername" name="lokasi" value="{{ old('lokasi', $penampung->lokasi) }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
