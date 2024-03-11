@extends('layouts.admin')
@section('content')

    <section class="content">

        <!-- Default box -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Dentist Office
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route("dentist-office.update", [$dentist_office->id]) }}">
                            @method('PUT')
                            @csrf
                            @include('dentist-office._form_update')
                            <div class="form-group">
                                <input type="hidden" name="office_email" value="{{ $office_credential->email }}">
                                <input type="hidden" name="user_id" value="{{ $dentist_office->user_id }}">

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
