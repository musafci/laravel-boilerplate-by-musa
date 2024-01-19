@extends('layouts.admin')
@section('content')

    <section class="content">

        <!-- Default box -->
        <div class="row ">
            {{--            <div class="col-lg-3"></div>--}}

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Menu
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route("menu.store") }}" enctype="multipart/form-data">
                            @csrf
                            @include(('dentist-office.menu._form_create'))
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
@endsection
