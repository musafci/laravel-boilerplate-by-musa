@extends('layouts.admin')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Change password</h3>
            </div>
            <div class="card-body">

                <form method="post" action="{{route('store.change.password')}}">
                    {{csrf_field()}}

                    <div class="form-group has-feedback {{ $errors->has('current_password') ? 'has-error' : '' }}">
                        <label class="control-label">Current Password</label>
                        <input type="password" value="{{old('current_password')}}" class="form-control"
                               placeholder="Current Password"  name="current_password" autocomplete="current-password" required>

                        @if($errors->has('current_password'))
                            <span class="help-block" role="alert">{{ $errors->first('current_password') }}</span>
                        @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label class="control-label">New Password</label>
                        <input type="password" name="password" value="{{old('password')}}"
                               class="form-control" placeholder="New Password" autocomplete="current-password"  required>

                        @if($errors->has('password'))
                            <span class="help-block" role="alert">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="form-group pass_show has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <label class="control-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}"
                               class="form-control" placeholder="Confirm Password" autocomplete="current-password"  required>

                        @if($errors->has('password_confirmation'))
                            <span class="help-block" role="alert">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button class="btn btn-danger float-right" type="submit">
                            Update
                        </button>
                        <a class="btn btn-default" href="{{ route('dashboard') }}">
                            Back
                        </a>
                    </div>

                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
