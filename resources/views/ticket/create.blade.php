@extends('layouts.admin')
@section('content')

    <section class="content">

        <!-- Default box -->
        <div class="row">
            <div class="col-lg-6">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Create Ticket
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route("ticket.store") }}" enctype="multipart/form-data">
                            @csrf
                            @include('ticket._form')
                            <div class="form-group">
                                <button class="btn btn-danger float-right" type="submit">
                                    Save
                                </button>
                                <a class="btn btn-default" href="{{ route('ticket.index') }}">
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
