@extends('layouts.admin')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-md-12">
                    <div class="card">
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title">--}}
{{--                                Profiles--}}
{{--                            </h3>--}}
{{--                        </div>--}}
                        <div class="card-body">
{{--                            <h2>--}}
{{--                                Profile View--}}
{{--                            </h2>--}}
                            {{--    Tab View Starts    --}}
                            <ul id="tabs" class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a id="tab-A" href="#pane-profile" class="nav-link {{ $tab != 'password' ? 'active' : '' }} " data-toggle="tab" role="tab"> Profile Details </a>
                                </li>

                                <li class="nav-item">
                                    <a id="tab-B" href="#pane-password" class="nav-link {{ $tab == 'password' ? 'active' : '' }} " data-toggle="tab" role="tab"> Change Password </a>
                                </li>
                            </ul>
                            <div id="content" class="tab-content" role="tablist">
                                {{--  Content of Tab A Starts  --}}
                                <div id="pane-profile" class="card tab-pane fade {{ $tab != 'password' ? 'show active' : '' }}" role="tabpanel" aria-labelledby="tab-A">
                                    <div class="card-header" role="tab" id="heading-A">

                                        @include('index.tab_profile_update')

                                    </div>
                                </div>
                                {{--  Content of Tab A Ends  --}}
                                {{--  Content of Tab B Starts  --}}
                                <div id="pane-password" class="card tab-pane fade {{ $tab == 'password' ? 'show active' : '' }}" role="tabpanel" aria-labelledby="tab-B">
                                    <div class="card-header" role="tab" id="heading-B">

                                        @include('index.tab_change_password')

                                    </div>
                                </div>
                                {{--  Content of Tab B Ends  --}}
                            </div>
                            {{--    Tab View Ends    --}}
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
