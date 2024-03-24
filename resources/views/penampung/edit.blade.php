@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tempat Penampung : <strong>{{ $penampung->tempat_penampung }}</strong></h1>
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
                        <label for="inputName" class="col-sm-4 col-form-label">Penampungan</label>
                        <div class="col-sm-8">
                          <input type="text" id="inputName" class="form-control" name="tempat_penampung"
                          value="{{ old('tempat_penampung', $penampung->tempat_penampung) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputLokasi" class="col-sm-4 col-form-label">Lokasi</label>
                        <div class="col-sm-8">
                          <input type="text" id="inputLokasi" class="form-control" name="lokasi_penampung"
                          value="{{ old('lokasi_penampung', $penampung->lokasi_penampung) }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('penampung.index') }}" class="btn btn-warning">Exit</a>
                </form>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
