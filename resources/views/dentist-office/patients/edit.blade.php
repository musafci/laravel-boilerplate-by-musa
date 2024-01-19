@extends('layouts.admin')
@section('content')

    <section class="content">
        <!-- Default box -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Edit Patient
                        </h3>
                    </div>
                    <div class="card-body">

{{--        Tab View Starts                --}}

                        {{--    Tab View Starts    --}}
                        <ul id="tabs" class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a id="tab-A" href="#pane-personal-information" class="nav-link active " data-toggle="tab" role="tab"> Profile Personal Information </a>
                            </li>

                            <li class="nav-item">
                                <a id="tab-B" href="#pane-patient-symptoms" class="nav-link  " data-toggle="tab" role="tab"> Patient Symptoms </a>
                            </li>

                            <li class="nav-item">
                                <a id="tab-C" href="#pane-patient-epworth" class="nav-link  " data-toggle="tab" role="tab"> Patient Epworth </a>
                            </li>

                            <li class="nav-item">
                                <a id="tab-D" href="#pane-patient-treatment" class="nav-link  " data-toggle="tab" role="tab"> Patient Treatment </a>
                            </li>

                            <li class="nav-item">
                                <a id="tab-E" href="#pane-patient-history" class="nav-link  " data-toggle="tab" role="tab"> Patient History </a>
                            </li>
                        </ul>
                        <div id="content" class="tab-content" role="tablist">
                            {{--  Content of Tab A Starts  --}}
                            <div id="pane-personal-information" class="card tab-pane fade show active " role="tabpanel" aria-labelledby="tab-A">
                                <div class="card-header" role="tab" id="heading-A">

                                    @include('dentist-office.patients.edit-view-tab.edit-patient-form')

                                </div>
                            </div>
                            {{--  Content of Tab A Ends  --}}
                            {{--  Content of Tab B Starts  --}}
                            <div id="pane-patient-symptoms" class="card tab-pane fade  " role="tabpanel" aria-labelledby="tab-B">
                                <div class="card-header" role="tab" id="heading-B">

                                    @include('dentist-office.patients.edit-view-tab.edit-patient-symptoms')

                                </div>
                            </div>
                            {{--  Content of Tab B Ends  --}}
                            {{--  Content of Tab C Starts  --}}
                            <div id="pane-patient-epworth" class="card tab-pane fade  " role="tabpanel" aria-labelledby="tab-B">
                                <div class="card-header" role="tab" id="heading-C">

                                    @include('dentist-office.patients.edit-view-tab.edit-patient-epworth')

                                </div>
                            </div>
                            {{--  Content of Tab C Ends  --}}
                            {{--  Content of Tab D Starts  --}}
                            <div id="pane-patient-treatment" class="card tab-pane fade  " role="tabpanel" aria-labelledby="tab-B">
                                <div class="card-header" role="tab" id="heading-D">

                                    @include('dentist-office.patients.edit-view-tab.edit-patient-treatment')

                                </div>
                            </div>
                            {{--  Content of Tab D Ends  --}}
                            {{--  Content of Tab E Starts  --}}
                            <div id="pane-patient-history" class="card tab-pane fade  " role="tabpanel" aria-labelledby="tab-B">
                                <div class="card-header" role="tab" id="heading-E">

                                    @include('dentist-office.patients.edit-view-tab.edit-patient-history')

                                </div>
                            </div>
                            {{--  Content of Tab E Ends  --}}
                        </div>
                        {{--    Tab View Ends    --}}


{{--    Tab view ends   --}}

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
@endsection
