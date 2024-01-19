@extends('layouts.admin')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <ul id="tabs" class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a id="tab-A" href="#pane-patient" class="nav-link active " data-toggle="tab"
                                       role="tab"> Patient Details </a>
                                </li>

                                <li class="nav-item">
                                    <a id="tab-B" href="#pane-insurances" class="nav-link " data-toggle="tab"
                                       role="tab"> Insurances </a>
                                </li>

                                <li class="nav-item">
                                    <a id="tab-C" href="#pane-symptoms" class="nav-link " data-toggle="tab"
                                       role="tab"> Symptoms </a>
                                </li>

                                <li class="nav-item">
                                    <a id="tab-D" href="#pane-epworth" class="nav-link " data-toggle="tab"
                                       role="tab"> Epworth </a>
                                </li>

                                <li class="nav-item">
                                    <a id="tab-E" href="#pane-treatment" class="nav-link " data-toggle="tab"
                                       role="tab"> Treatment </a>
                                </li>

                                <li class="nav-item">
                                    <a id="tab-F" href="#pane-history" class="nav-link " data-toggle="tab"
                                       role="tab"> History </a>
                                </li>

                            </ul>
                            <div id="content" class="tab-content" role="tablist">

                                <div id="pane-patient" class="card tab-pane fade show active" role="tabpanel"
                                     aria-labelledby="tab-A">
                                    <div class="card-header" role="tab" id="heading-A">
                                        @include('dentist-office.patients.view-tab.patient-profile-details')
                                    </div>
                                </div>

                                <div id="pane-insurances" class="card tab-pane fade " role="tabpanel"
                                     aria-labelledby="tab-B">
                                    <div class="card-header" role="tab" id="heading-B">
                                        @include('dentist-office.patients.view-tab.patient-insurances')
                                    </div>
                                </div>

                                <div id="pane-symptoms" class="card tab-pane fade " role="tabpanel"
                                     aria-labelledby="tab-C">
                                    <div class="card-header" role="tab" id="heading-C">
                                        @include('dentist-office.patients.view-tab.patient-questionnaire-symptoms')
                                    </div>
                                </div>

                                <div id="pane-epworth" class="card tab-pane fade " role="tabpanel"
                                     aria-labelledby="tab-D">
                                    <div class="card-header" role="tab" id="heading-D">
                                        @include('dentist-office.patients.view-tab.patient-questionnaire-epworth')
                                    </div>
                                </div>

                                <div id="pane-treatment" class="card tab-pane fade " role="tabpanel"
                                     aria-labelledby="tab-E">
                                    <div class="card-header" role="tab" id="heading-D">
                                        @include('dentist-office.patients.view-tab.patient-questionnaire-treatment')
                                    </div>
                                </div>

                                <div id="pane-history" class="card tab-pane fade " role="tabpanel"
                                     aria-labelledby="tab-F">
                                    <div class="card-header" role="tab" id="heading-D">
                                        @include('dentist-office.patients.view-tab.patient-questionnaire-history')
                                    </div>
                                </div>

                            </div>


                            {{--    Tab View Ends    --}}
                            <div class="form-group">
                                <a class="btn btn-default" href="{{route('dentist-office.patients', ['office' => $patient_data['patient_details']['dentist_office_id']])}}">
                                    Back to Office
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

