@extends('layouts.admin')
@section('content')

    <section class="content">
        <!-- Default box -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Assigned Ticket
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route("assigned-tickets.update", [$assigned_ticket[0]['id'] ?? 0]) }}">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                @include('assigned-tickets._form')
                            </div>

                            <div class="form-group">

                                <button class="btn btn-danger float-right" type="submit">
                                    Submit
                                </button>
                                <a class="btn btn-default" href="{{ route('assigned-tickets.index') }}">
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
