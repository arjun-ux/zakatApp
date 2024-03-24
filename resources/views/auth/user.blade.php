@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @if (session('success'))
                <div class="alert alert-success">
                    Berhasil
                </div>
            @endif
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add User
              </button>
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="{{ route('user.register') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputName" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputUsername" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputUsername" name="username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-9">
                              <select class="form-control form-select" name="role">
                                <option value="">Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">Penampungan</label>
                            <div class="col-sm-9">
                              <select class="form-control form-select" name="penampung_id">
                                <option value="">Penampung</option>
                                @foreach ($penampung as $v)
                                <option value="{{ $v->id }}">{{ $v->tempat_penampung }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputPassword" name="password">
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
        <table class="table table-bordered table-stripped" id="table_user">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    {{--  <th>Penampungan</th>  --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $v)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $v->name }}</td>
                        <td>{{ $v->username }}</td>
                        <td>{{ $v->role }}</td>
                        {{--  <td>{{ $v->Penampung->tempat_penampung }}</td>  --}}
                        <td>
                            <a href="{{ route('user.edit', $v->id) }}" class="btn btn-warning" style="font-size: 10px"><i class="fas fa-pen"></i></a>
                            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal_delete" data-id="{{ $v->id }}"
                                onclick="deleteUser({{ $v->id }})"
                                style="font-size: 10px"><i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- Modal -->
<div class="modal fade" id="modal_delete" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                APAKAH ANDA YAKIN MENGHAPUS DATA ?
            </div>
            <div class="modal-footer">
                <form action="{{ route('user.delete', ':id') }}" method="post" id="deleteForm">
                    @csrf
                    {{method_field('delete')}}
                    <button class="btn btn-danger" type="submit">Ya</button>
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
  <script>
        $('#table_user').DataTable();
        {{--  function delete  --}}
        function deleteUser(id){
            $('#deleteForm').attr("action", "{{ route('user.delete', ':id') }}".replace(':id', id));
            $('#modal_delete').modal("show");
        }
        {{--  modal delete  --}}
        $('body').on('click', '#btn_hapus', function(){
            var id = $(this).data("id");
            deleteUser(id);
        });
  </script>
@endpush
