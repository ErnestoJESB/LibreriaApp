@extends('plantilla')
@section('content')
<div class="login-box">
  <div class="login-logo">
    <h1>Librería</h1>
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
<!--       //Una ruta siempre tiene a alguien que los gobierna -->
      <form action="{{ route('login')}}" method="post">
        @csrf

        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
            <!-- crear validaciones al campo email y password -->
            @error('email')
                <br>
                <div class="alert alert-danger">Error con el email...</div>
            @enderror
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
       
        </div>
      </form>
  </div>
</div>
<!-- /.login-box -->

@endsection