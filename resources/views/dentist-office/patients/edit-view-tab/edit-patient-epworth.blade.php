@if(empty($patient_data->epworth))
    <h3 style="text-align: center">No data Found!</h3>
@else

    <form method="POST" action="{{ route("dentist-office.patients.questionnaire", ['office' => $patient_data->dentist_office_id, 'patient' => $patient_data->patient_profile_id]) }}">
        @method('PUT')
        @csrf

        @php
            $data = json_decode($patient_data->epworth, true);
//            dd($data);
            $bool_data = [ true, false ];
            $rate_number = [ 0, 1, 2, 3 ];
            $yes_no = [ 'Yes', 'No', 'Sometimes' ];
            $is_daily = [ 'Everyday', 'Often', 'Sometimes', 'Rarely', 'Never' ];
        @endphp

        {{--    Epworth Sleep Questionnaire    --}}
        <div class="row justify-content-md-center">
            <input type="hidden" name="questionnaire_tab" value="epworth" >
            <div class="col-lg-9 col-9">
                Epworth Sleep Questionnaire
                <hr>
                Using the following scale, choose the most appropriate number for each situation<br>
                0 = No chance of dozing<br>
                1 = Slight chance of dozing<br>
                2 = Moderate chance of dozing<br>
                3 = High chance of dozing<br>

            </div>
        </div>

        <div class="row" style="padding: 10px;">

        </div>

        {{--  Sitting and reading | Watching TV  --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">Sitting and reading</label>
                    <select  id="title" name="worth1_read" class="form-control ">
                        @if(!empty($data['worth1']['read']))
                            <option value="{{ $data['worth1']['read'] }}">{{ $data['worth1']['read'] }}</option>
                            @foreach($rate_number as $number)
                                @if($number != $data['worth1']['read'])
                                    <option value="{{$number}}"> {{$number}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-1 col-6">
            </div>
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">Watching TV</label>
                    <select  id="title" name="worth1_tv" class="form-control ">
                        @if(!empty($data['worth1']['tv']))
                            <option value="{{ $data['worth1']['tv'] }}">{{ $data['worth1']['tv'] }}</option>
                            @foreach($rate_number as $number)
                                @if($number != $data['worth1']['tv'])
                                    <option value="{{$number}}"> {{$number}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>

        {{--  meeting | car  --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">Sitting inactive in a public place (e.g a theater or meeting)</label>
                    <select  id="title" name="worth1_meeting" class="form-control ">
                        @if(!empty($data['worth1']['meeting']))
                            <option value="{{ $data['worth1']['meeting'] }}">{{ $data['worth1']['meeting'] }}</option>
                            @foreach($rate_number as $number)
                                @if($number != $data['worth1']['meeting'])
                                    <option value="{{$number}}"> {{$number}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-1 col-6">
            </div>
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">As a passenger in a car for an hour without a break</label>
                    <select  id="title" name="worth1_car" class="form-control ">
                        @if(!empty($data['worth1']['car']))
                            <option value="{{ $data['worth1']['car'] }}">{{ $data['worth1']['car'] }}</option>
                            @foreach($rate_number as $number)
                                @if($number != $data['worth1']['car'])
                                    <option value="{{$number}}"> {{$number}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>

        {{--  rest | talk  --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">Lying down to rest in the afternoon when circumstances permit</label>
                    <select  id="title" name="worth1_rest" class="form-control ">
                        @if(!empty($data['worth1']['rest']))
                            <option value="{{ $data['worth1']['rest'] }}">{{ $data['worth1']['rest'] }}</option>
                            @foreach($rate_number as $number)
                                @if($number != $data['worth1']['rest'])
                                    <option value="{{$number}}"> {{$number}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-1 col-6">
            </div>
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">Sitting and talking to someone</label>
                    <select  id="title" name="worth1_talk" class="form-control ">
                        @if(!empty($data['worth1']['talk']))
                            <option value="{{ $data['worth1']['talk'] }}">{{ $data['worth1']['talk'] }}</option>
                            @foreach($rate_number as $number)
                                @if($number != $data['worth1']['talk'])
                                    <option value="{{$number}}"> {{$number}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>

        {{--  quiet | stop  --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">Sitting quietly after a lunch without alcohol</label>
                    <select  id="title" name="worth1_quiet" class="form-control ">
                        @if(!empty($data['worth1']['quiet']))
                            <option value="{{ $data['worth1']['quiet'] }}">{{ $data['worth1']['quiet'] }}</option>
                            @foreach($rate_number as $number)
                                @if($number != $data['worth1']['quiet'])
                                    <option value="{{$number}}"> {{$number}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-1 col-6">
            </div>
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">In a car, while stopped for a few minutes in traffic</label>
                    <select  id="title" name="worth1_stop" class="form-control ">
                        @if(!empty($data['worth1']['stop']))
                            <option value="{{ $data['worth1']['stop'] }}">{{ $data['worth1']['stop'] }}</option>
                            @foreach($rate_number as $number)
                                @if($number != $data['worth1']['stop'])
                                    <option value="{{$number}}"> {{$number}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>


        {{--    Epworth Sleep Questionnaire    --}}
        <div class="row justify-content-md-center">
            <input type="hidden" name="questionnaire_tab" value="epworth" >
            <div class="col-lg-9 col-9">
                Thornton Snoring Scale
                <hr>
                Using the following scale, choose the most appropriate number for each situation<br>
                0 = No chance of dozing<br>
                1 = Slight chance of dozing<br>
                2 = Moderate chance of dozing<br>
                3 = High chance of dozing<br>

            </div>
        </div>

        <div class="row" style="padding: 10px;">

        </div>

        {{--  read | meeting  --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">My snoring affects my Relationship with my partner</label>
                    <select  id="title" name="worth2_read" class="form-control ">
                        @if(!empty($data['worth2']['read']))
                            <option value="{{ $data['worth2']['read'] }}">{{ $data['worth2']['read'] }}</option>
                            @foreach($rate_number as $number)
                                @if($number != $data['worth2']['read'])
                                    <option value="{{$number}}"> {{$number}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-1 col-6">
            </div>
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">My snoring causes my partner to be irritable or tired</label>
                    <select  id="title" name="worth2_meeting" class="form-control ">
                        @if(!empty($data['worth2']['meeting']))
                            <option value="{{ $data['worth2']['meeting'] }}">{{ $data['worth2']['meeting'] }}</option>
                            @foreach($rate_number as $number)
                                @if($number != $data['worth2']['meeting'])
                                    <option value="{{$number}}"> {{$number}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>

        {{--  rest | tv  --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">My snoring required us to sleep in separate rooms</label>
                    <select  id="title" name="worth2_rest" class="form-control ">
                        @if(!empty($data['worth2']['rest']))
                            <option value="{{ $data['worth2']['rest'] }}">{{ $data['worth2']['rest'] }}</option>
                            @foreach($rate_number as $number)
                                @if($number != $data['worth2']['rest'])
                                    <option value="{{$number}}"> {{$number}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-1 col-6">
            </div>
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">My snoring is loud</label>
                    <select  id="title" name="worth2_tv" class="form-control ">
                        @if(!empty($data['worth2']['tv']))
                            <option value="{{ $data['worth2']['tv'] }}">{{ $data['worth2']['tv'] }}</option>
                            @foreach($rate_number as $number)
                                @if($number != $data['worth2']['tv'])
                                    <option value="{{$number}}"> {{$number}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>

        {{--  car  --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">My snoring affects people when I am sleeping away from home</label>
                    <select  id="title" name="worth2_car" class="form-control ">
                        @if(!empty($data['worth2']['car']))
                            <option value="{{ $data['worth2']['car'] }}">{{ $data['worth2']['car'] }}</option>
                            @foreach($rate_number as $number)
                                @if($number != $data['worth2']['car'])
                                    <option value="{{$number}}"> {{$number}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-1 col-6">
            </div>
            <div class="col-lg-4 col-6">
            </div>
        </div>








{{--    Back & Submit Button    --}}

        <div class="row justify-content-center">
            <div class="col-lg-5 col-6">
                <a class="btn btn-default" href="{{ route('dentist-office.patients', ['office' => $patient_data->dentist_office_id]) }}">
                    Back
                </a>
            </div>
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <button class="btn btn-danger float-right" type="submit">
                        Submit
                    </button>
                </div>
            </div>

        </div>


    </form>

@endif
