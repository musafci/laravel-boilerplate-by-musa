<section style="background-color: #eee;">
    <div class="container py-5">

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <ul class="list-unstyled">

                    {{-- Title & Description --}}
                    <li class="d-flex  mb-4">
                        <div class="card w-100">
                            <div class="card-header d-flex between p-3">
                                <p class="fw-bold mb-0"><h3 class="justify-content-start">{{ $ticket['title'] ?? null }}</h3> </p>
                            </div>
                            <div class="card-header d-flex  p-3">
                                <p class="fw-bold mb-0">
                                    {!! $ticket['description'] ?? null !!}
                                </p>
                                @if(!empty($ticket['attachments']))
                                    <p class="mb-0">
                                       <?php
                                            $files = json_decode($ticket['attachments']);
                                            if (!is_array($files)) {
                                                $files = [];
                                            }
                                        ?>
                                        <br>
                                        <br>
                                        @foreach($files as $file)
                                            <?php
                                                $data_url = env('AWS_URL') . "/" . $file;
                                                $path = parse_url($data_url, PHP_URL_PATH);
                                                $ext = pathinfo($path, PATHINFO_EXTENSION);
                                            ?>
                                            @if(strtolower($ext) === 'pdf')
                                                <embed src=
                                                           "{{ $data_url }}"
                                                       width="200"
                                                       height="150">
                                                <br>
                                                <a href="{{ route('file.download', ['type' => $ext, 'resource' => $data_url]) }}" target="_blank" class="attachment-button">
                                                    <i class="fas fa-file-pdf"></i> Download PDF
                                                </a>
                                            @else
                                                <a href="{{ route('file.download', ['type' => $ext, 'resource' => $data_url]) }}" target="_blank">
                                                    <img src="{{ $data_url }}"  width="200" height="150" />
                                                </a>
                                            @endif
                                        @endforeach
                                    </p>
                                @endif
                            </div>
                            <div class="card-header d-flex justify-content-between p-3">
                                <p class="fw-bold mb-0">
                                    <b>{{ $ticket['issuer_name'] ?? null }}</b>,
                                    {{ $ticket['issuer_type'] ?? null }} <br>
                                    {{ isset($ticket['created_at']) ? date('j F, Y H:i:s A', strtotime($ticket['created_at'])) : null }}
                                </p>
                            </div>

                        </div>
                    </li>

                    @if($count_replies > 0)
                        @foreach($ticket['ticket_reply'] as $key => $value)
                            @if(strtoupper($value['source']) == 'DO')
                                <li class="d-flex  mb-4">
                                    <div style="margin-right: 0.5rem">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 496 512" color="#0a3852" height="52" width="52" xmlns="http://www.w3.org/2000/svg" style="color: rgb(10, 56, 82);"><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"></path></svg>
                                    </div>

                                    <div class="card w-{{ (strlen($value['reply']) <75) ? $value['reply'] : 75  }}">

                                        <div class="card-body" style="border-bottom:1px solid rgba(0,0,0,.125)">
                                            <p class="mb-0">
                                                {!! $value['reply'] ?? null !!}
                                            </p>
                                            @if(!empty($value['attachments']))
                                                <p class="mb-0">
                                                    <?php
                                                        $files = json_decode($value['attachments']);
                                                        if (!is_array($files)) {
                                                            $files = [];
                                                        }
                                                    ?>
                                                    <br>
                                                    <br>
                                                    @foreach($files as $file)
                                                            <?php
                                                                $data_url = env('AWS_URL') . "/" . $file;
                                                                $path = parse_url($data_url, PHP_URL_PATH);
                                                                $ext = pathinfo($path, PATHINFO_EXTENSION);
                                                            ?>
                                                        @if(strtolower($ext) === 'pdf')
                                                            <embed src=
                                                                       "{{ $data_url }}"
                                                                   width="200"
                                                                   height="150">
                                                            <br>
                                                            <a href="{{ route('file.download', ['type' => $ext, 'resource' => $data_url]) }}" target="_blank" class="attachment-button">
                                                                <i class="fas fa-file-pdf"></i> Download PDF
                                                            </a>
                                                        @else
                                                            <a href="{{ route('file.download', ['type' => $ext, 'resource' => $data_url]) }}" target="_blank">
                                                                <img src="{{ $data_url }}"  width="200" height="150" />
                                                            </a>
                                                        @endif
                                                        <br>
                                                    @endforeach
                                                </p>
                                            @endif

                                        </div>
                                        <div class="card-header d-flex justify-content-between p-3">
                                            <p class="fw-bold mb-0">
                                                <b>{{ $value['sender_details']['name'] ?? null }}</b>,
                                                {{ $value['sender_details']['type'] ?? null }} <br>
                                                {{ isset($value['created_at']) ? date('j F, Y H:i:s A', strtotime($value['created_at'])) : null }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @elseif($value['source'] == 'ADMIN')
                                <li class="d-flex justify-content-between mb-4" >
                                    <div class="card w-{{ (strlen($value['reply']) <75) ? $value['reply'] : 75  }}" style=" margin-left: auto; background-color: #eaf6ea" >
                                        <div class="card-body d-flex justify-content-end"  style="border-bottom:1px solid rgba(0,0,0,.125)">
                                            <p class="mb-0 " >
                                                {!! $value['reply'] ?? null !!}
                                            </p>
                                            @if(!empty($value['attachments']))
                                                <p class="mb-0">
                                                    <?php
                                                        $files = json_decode($value['attachments']);
                                                        if (!is_array($files)) {
                                                            $files = [];
                                                        }
                                                    ?>
                                                    <br>
                                                    <br>
                                                    @foreach($files as $file)
                                                            <?php
                                                                $data_url = env('AWS_URL') . "/" . $file;
                                                                $path = parse_url($data_url, PHP_URL_PATH);
                                                                $ext = pathinfo($path, PATHINFO_EXTENSION);
                                                            ?>
                                                        @if(strtolower($ext) === 'pdf')
                                                            <embed src=
                                                                       "{{ $data_url }}"
                                                                   width="200"
                                                                   height="150">
                                                            <br>
                                                            <a href="{{ route('file.download', ['type' => $ext, 'resource' => $data_url]) }}" target="_blank" class="attachment-button">
                                                                <i class="fas fa-file-pdf"></i> Download PDF
                                                            </a>
                                                        @else
                                                            <a href="{{ route('file.download', ['type' => $ext, 'resource' => $data_url]) }}" target="_blank">
                                                                <img src="{{ $data_url }}"  width="200" height="150" />
                                                            </a>
                                                        @endif
                                                        <br>
                                                    @endforeach
                                                </p>
                                            @endif

                                        </div>
                                        <div class="card-header d-flex justify-content-end p-3">
                                            <p class="fw-bold mb-0">
                                                {{ isset($value['created_at']) ? date('j F, Y H:i:s A', strtotime($value['created_at'])) : null }}
                                            </p>
                                        </div>

                                    </div>
                                    <div style="margin-left: 0.5rem">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" color="#0a3852" height="52" width="52" xmlns="http://www.w3.org/2000/svg" style="color: rgb(10, 56, 82);"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M3.783 2.826L12 1l8.217 1.826a1 1 0 0 1 .783.976v9.987a6 6 0 0 1-2.672 4.992L12 23l-6.328-4.219A6 6 0 0 1 3 13.79V3.802a1 1 0 0 1 .783-.976zM12 11a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm-4.473 5h8.946a4.5 4.5 0 0 0-8.946 0z"></path></g></svg>
                                    </div>
                                </li>
                            @endif


                        @endforeach
                    @endif

                </ul>

            </div>

        </div>

    </div>
</section>
