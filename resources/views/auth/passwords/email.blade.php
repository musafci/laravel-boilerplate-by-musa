@extends('layouts.login')

@section('content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h3><a href="{{route('home')}}">Laravel</a></h3>
            </div>
            <div class="card-body">
                <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
                @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                @endif
                    <form action="{{ route('password.email') }}" method="post">
                        @csrf
                        <div class="form-group  mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-group">
                                <input type="email" name="email" value="{{ old('email', null) }}" class="form-control"
                                       required autocomplete="email" autofocus placeholder="email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            @if($errors->has('email'))
                                <p class="help-block">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                            </div>
                        </div>
                    </form>

                    <p class="mb-1">
                        <a href="{{ route('login') }}">Login</a>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
@endsection
