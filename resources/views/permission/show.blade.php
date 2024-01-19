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
                                        Name
                                    </th>
                                    <td>
                                        {{ $permission_name['name'] ?? null }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Created At
                                    </th>
                                    <td>
                                        {{ isset($permission_name['created_at']) ? date('j F, Y H:i:s A', strtotime($permission_name['created_at'])) : null }}
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <div class="form-group">
                                <a class="btn btn-default" href="{{route('permission.index')}}">
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
