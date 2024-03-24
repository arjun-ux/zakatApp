@extends('auth.app')
@section('content')
<style>
    html,body {
        margin: 0;
        padding: 0;
        height:  100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-image: url({{ asset('img/bg-zakat.jpg') }});
    }
</style>
<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-4 py-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('doLogin') }}" method="post">
                        @csrf
                        <h4 class="text-center">ZAKAT APP</h4>
                        <div>
                            <label for="exampleInputEmail1" class="form-label"></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" autofocus name="username" placeholder="Username">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label"></label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                          </div>
                          <div class="text-center">
                              <button type="submit" class="btn btn-primary">Login</button>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
