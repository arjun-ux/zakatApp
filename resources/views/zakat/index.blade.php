@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Zakat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add Zakat
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Zakat</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('zakat.store') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-4 col-form-label">Penanggung Jawab</label>
                                <div class="col-sm-8">
                                  <select class="form-control form-select" id="inputName" name="user_id">
                                    <option value="">Pilih Penanggung Jawab</option>
                                    @foreach ($user as $v)
                                    <option value="{{ $v->id }}">{{ $v->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPbrZkt" class="col-sm-4 col-form-label">Pemberi Zakat</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="inputPbrZkt" name="pemberi_zakat" placeholder="Nama Masjid / Nama Orang">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputLokasi" class="col-sm-4 col-form-label">Lokasi</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="inputLokasi" name="lokasi" placeholder="Lokasi">
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
                  </div>
                </div>
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
        <table class="table table-bordered table-stripped" id="table_penampung">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Png Jawab</th>
                    <th>Nama</th>
                    <th>Lokasi</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($zakat as $v)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $v->User->name }}</td>
                    <td>{{ $v->pemberi_zakat }}</td>
                    <td>{{ $v->lokasi }}</td>
                    <td>{{ $v->jumlah }}</td>
                    <td>
                        <a href="{{ route('zakat.edit', $v->id) }}" class="btn btn-warning" style="font-size: 10px"><i class="fas fa-pen"></i></a>
                        <button class="btn btn-danger" type="button" id="btn_hapus" data-id="{{ $v->id }}" style="font-size: 10px"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="modal_delete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Penampungan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        APAKAH ANDA YAKIN MENGHAPUS DATA INI?
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('zakat.delete', $v->id) }}" method="post">
                            @csrf
                            {{method_field('delete')}}
                            <button class="btn btn-danger" type="submit">Ya</button>
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
@push('script')
<script>
    $('#table_penampung').DataTable();
    {{--  modal delete  --}}
    $('body').on('click', '#btn_hapus', function(){
        var id = $(this).data("id");
        $('#modal_delete').modal("show");
    });
</script>
@endpush
