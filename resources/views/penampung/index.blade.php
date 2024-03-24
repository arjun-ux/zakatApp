@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Penampung</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add Penampung
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Penampungan</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form action="{{ route('penampung.store') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-4 col-form-label">Penampungan</label>
                                <div class="col-sm-8">
                                  <input type="text" id="inputName" class="form-control" name="tempat_penampung">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputLokasi" class="col-sm-4 col-form-label">Lokasi</label>
                                <div class="col-sm-8">
                                  <input type="text" id="inputLokasi" class="form-control" name="lokasi_penampung">
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
                    <th>Penampungan</th>
                    <th>Lokasi</th>
                    <th>Total (Kg)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penampung as $v)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $v->tempat_penampung }}</td>
                    <td>{{ $v->lokasi_penampung }}</td>
                    <td>{{ $v->total }}</td>
                    <td>
                        <a href="{{ route('detail_penampung.index', $v->id) }}" class="btn btn-success" style="font-size: 10px"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('penampung.edit', $v->id) }}" class="btn btn-warning" style="font-size: 10px"><i class="fas fa-pen"></i></a>
                        <button class="btn btn-danger" type="button" id="btn_hapus" data-id="{{ $v->id }}" style="font-size: 10px"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{--  <div class="modal fade" id="modal_delete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Penampungan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bd">
                        APAKAH ANDA YAKIN MENGHAPUS PENAMPUNG {{ $v->id }}?
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('penampung.delete', $v->id) }}" method="post">
                            @csrf
                            {{method_field('delete')}}
                            <button class="btn btn-danger" type="submit">Ya</button>
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>  --}}
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
        alert('oke: '+id);
        $('#modal_delete').modal("show");
    });
</script>
@endpush
