@extends('layouts.admin')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Dashboard
                            </h3>
                        </div>
                        <div class="card-body">
                            @include('dentist-office.play-ground.counter-details')
                            @include('dentist-office.play-ground.appointment-calendar')
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

