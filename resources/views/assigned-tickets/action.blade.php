@extends('layouts.admin')
@section('content')

    <section class="content">
        <!-- Default box -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Assigned Ticket
                        </h3>
                    </div>
                    <div class="card-body">

                        @php
//                                                        dd($ticket);
//                        echo "Hi" . $ticket['id'];
                        @endphp

                        <div class="mt-5">
                            @if($errors->any())
                                <div class="col-12">
                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                            @endif
                            @if(session()->has('error'))
                                <div class="alert alert-danger">{{session('error')}}</div>
                            @endif
                            @if(session()->has('success'))
                                <div class="alert alert-success">{{session('success')}}</div>
                            @endif
                        </div>

                        <form method="POST" action="{{ route("assigned-tickets.update", [$ticket['id'] ?? 0]) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            @include('assigned-tickets.ticket_window')
                            <div class="row">
                                {{--                                @include('assigned-tickets._form')--}}
                            </div>

                            <div class="form-group">
                                @if($action == 'reply')
                                    <div>
                                        <textarea id="tiny" name="ticket_reply_body" ></textarea>
                                    </div>
                                @endif
                            </div>
                            @if($action == 'reply')
                                <div class="form-group">
                                    <div class="float-right">
                                        <input type="file" id="myFile" name="file_name[]" multiple>
                                        <input type="checkbox" id="ticket" name="is_close" value="close">
                                        <label for="ticket"> Click to close ticket</label>
                                        <button class="btn btn-danger " type="submit">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <a class="btn btn-default" href="{{ route('assigned-tickets.index') }}">
                                    Back
                                </a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>

    <!-- TinyMCE Script -->
    <script src="https://cdn.jsdelivr.net/npm/tinymce@5.10.2/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea#tiny', // change this to your text area selector
            height: 300,
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            plugins: 'link image code',
        });
    </script>

    <script>
        tinymce.init({
            // other configurations
            content_css: "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css",
        });
    </script>


@endsection
