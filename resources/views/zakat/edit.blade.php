@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pemberi Zakat : <strong>{{ $zakat->pemberi_zakat }}</strong></h1>
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
                <form action="{{ route('zakat.update', $zakat->id) }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="inputPbrZkt" class="col-sm-4 col-form-label">Penanggung Jawab</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="inputPbrZkt" name="user_id" value="{{ old('user_id', $zakat->User->name) }}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPbrZkt" class="col-sm-4 col-form-label">Pemberi Zakat</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="inputPbrZkt" name="pemberi_zakat" value="{{ old('pemberi_zakat', $zakat->pemberi_zakat) }}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputLokasi" class="col-sm-4 col-form-label">Lokasi</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="inputLokasi" name="lokasi" value="{{ old('lokasi', $zakat->lokasi) }}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputJumlah" class="col-sm-4 col-form-label">Jumlah</label>
                        <div class="col-sm-8">
                          <input type="number" class="form-control" id="inputJumlah" name="jumlah" placeholder="Satuan Kg">
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
