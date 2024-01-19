@extends('layouts.admin')
@section('content')

<section class="content">
    <!-- Default box -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Edit Role
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("role.update", [$role->id]) }}">
                        @method('PUT')
                        @csrf
                        @include('role._form')
                        <div class="form-group">
                            <button class="btn btn-danger float-right" type="submit">
                                Update
                            </button>
                            <a class="btn btn-default" href="{{ route('role.index') }}">
                                Back
                            </a>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
@endsection
