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
                                        Title
                                    </th>
                                    <td>
                                        {{ $ticket['title'] ?? null }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Body
                                    </th>
                                    <td>
                                        {{ $ticket['description'] ?? null }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Sender Name
                                    </th>
                                    <td>
                                        {{ $ticket['issuer_name'] ?? null }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Sender Type
                                    </th>
                                    <td>
                                        {{ $ticket['issuer_type'] ?? null }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Ticket Raised Time
                                    </th>
                                    <td>
                                        {{ isset($ticket['ticket_raised_at']) ? date('j F, Y H:i:s A', strtotime($ticket['ticket_raised_at'])) : null }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Ticket Closed Time
                                    </th>
                                    <td>
                                        {{ isset($ticket['ticket_closed_at']) ? date('j F, Y H:i:s A', strtotime($ticket['ticket_closed_at'])) : null }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Ticket Status
                                    </th>
                                    <td>
                                        {{ $ticket['status'] ?? null }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Assignee Name
                                    </th>
                                    <td>
                                        {{ $assignee_name ?? null }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Assignee Remark
                                    </th>
                                    <td>
                                        {{ $assignee_remark ?? null }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Last Time Checked
                                    </th>
                                    <td>
                                        {{ isset($ticket['updated_at']) ? date('j F, Y H:i:s A', strtotime($ticket['updated_at'])) : null }}
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <div class="form-group">
                                <a class="btn btn-default" href="{{route('ticket.index')}}">
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
