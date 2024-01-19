@extends('layouts.admin')
@section('content')

    <section class="content">

        <!-- Default box -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Show
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <th>
                                        Log Name
                                    </th>
                                    <td>
                                        {{ $log[0]['log_name'] ?? null }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Description
                                    </th>
                                    <td>
                                        {{ $log[0]['description'] ?? null }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Subject Type
                                    </th>
                                    <td>
                                        {{ $log[0]['subject_type'] ?? null }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Event
                                    </th>
                                    <td>
                                        {{ $log[0]['event'] ?? null }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Causer Type
                                    </th>
                                    <td>
                                        {{ $log[0]['causer_type'] ?? null }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Causer Name
                                    </th>
                                    <td>
                                        {{ $causer_user_name ?? null }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Properties
                                    </th>
                                    <td>
                                        {{ json_encode($log[0]['properties']) ?? null }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        IP
                                    </th>
                                    <td>
                                        {{ $log[0]['ip_address'] ?? null }}
                                    </td>
                                </tr>


                                <tr>
                                    <th>
                                        Created At
                                    </th>
                                    <td>
                                        {{ isset($log[0]['created_at']) ? date('j F, Y H:i:s A', strtotime($log[0]['created_at'])) : null }}
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <div class="form-group">
                                <a class="btn btn-default" href="{{route('activity-log.index')}}">
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
@endsection
