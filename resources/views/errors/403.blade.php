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
                                {{ $exception->getMessage() }}
                            </h3>
                        </div>
                        <div class="card-body">
                            <h2 class="text-center">Sorry, you are not authorized to this resource!</h2>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

