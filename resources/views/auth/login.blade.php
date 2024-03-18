@extends('auth.app')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5 py-5">
        <div class="col-md-4">
            <form action="{{ route('doLogin') }}" method="post">
                @csrf
                <h4 class="text-center">Login</h4>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label"></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" placeholder="Username">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"></label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                  </div>
                  <div class="text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
            </form>
        </div>
    </div>
</div>
@endsection
