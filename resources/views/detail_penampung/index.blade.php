@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Penampung</h1>
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
        <table class="table table-bordered table-stripped" id="table_penampung">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pemberi Zakat</th>
                    <th>Lokasi</th>
                    <th>Jumlah (Kg)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $v)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $v->pemberi_zakat }}</td>
                    <td>{{ $v->lokasi }}</td>
                    <td>{{ $v->jumlah }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
