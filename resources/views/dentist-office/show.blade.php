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
                        @include('dentist-office.inhouse-counts')
                        <div class="form-group">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <th>
                                        Dentist Office Name
                                    </th>
                                    <td>
                                        {{ $office['office_name'] ?? null }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        In-Charge Name
                                    </th>
                                    <td>
                                        {{ $office_user['name'] ?? null }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        In-Charge Email
                                    </th>
                                    <td>
                                        {{ $office_user['email'] ?? null }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Dentist Office Status
                                    </th>
                                    <td>
                                        {{ $office['status'] ?? null }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Created By
                                    </th>
                                    <td>
                                        {{ $created_by['name'] ?? null }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Created At
                                    </th>
                                    <td>
                                        {{ isset($office_user['created_at']) ? date('j F, Y H:i:s A', strtotime($office_user['created_at'])) : null }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Updated By
                                    </th>
                                    <td>
                                        {{ $last_updated_by['name'] ?? null }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Last Updated At
                                    </th>
                                    <td>
                                        {{ isset($office['updated_at']) ? date('j F, Y H:i:s A', strtotime($office['updated_at'])) : null }}
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <div class="form-group">
                                <a class="btn btn-default" href="{{route('dentist-office.index')}}">
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
