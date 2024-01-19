
@if(empty($patient_data->symptoms))
    <h3 style="text-align: center">No data Found!</h3>
@else

    <form method="POST" action="{{ route("dentist-office.patients.questionnaire", ['office' => $patient_data->dentist_office_id, 'patient' => $patient_data->patient_profile_id]) }}">
        @method('PUT')
        @csrf

        @php
            $data = json_decode($patient_data->symptoms, true);
            $bool_data = [ true, false ];
            $rate_number = [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ];
            $yes_no = [ 'Yes', 'No', 'Sometimes' ];
            $is_daily = [ 'Everyday', 'Often', 'Sometimes', 'Rarely', 'Never' ];
        @endphp

        <div class="row justify-content-md-center">
            <input type="hidden" name="questionnaire_tab" value="symptoms" >
        </div>

        {{-- Reason --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-9 col-9">
                <div class="form-group {{ $errors->has('symptoms_reason') ? 'has-error' : '' }}">
                    <label for="name">What is the main reason you are seeking treatment?</label>
                    <input class="form-control" type="text" name="symptoms_reason" value="{{ $data['reason'] ?? null }}" required>
                    @if($errors->has('symptoms_reason'))
                        <span class="help-block" role="alert">{{ $errors->first('symptoms_reason') }}</span>
                    @endif
                </div>
            </div>
        </div>

        @if(!empty($data['complaints']))
            @foreach($data['complaints'] as $key => $value)
                @php
            //        dd($value);
                @endphp

                <div class="row justify-content-md-center">
                    <div class="col-lg-4 col-6">
                        <div class="form-group {{ $errors->has('complaints_1') ? 'has-error' : '' }}">
                            <label for="name"> {{ $value['key'] }}</label>
                            <input type="hidden" name="complaints_key_{{$key}}" value="{{ $value['key'] }}">
                        </div>
                    </div>
                    <div class="col-lg-1 col-6">
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="form-group {{ $errors->has('complaints_2') ? 'has-error' : '' }}">
                            <select  id="title" name="complaints_value_{{$key}}" class="form-control ">
                                @php
                                    if($value['value'])
                                        $value['value'] = 'true';
                                    else
                                        $value['value'] = 'false';
                                @endphp
                                <option value="{{ $value['value'] }}">
                                    {{ $value['value'] }}
                                </option>
                                @foreach($bool_data as $bool)
                                    @php
                                        if($bool)
                                            $bool = 'true';
                                        else
                                            $bool = 'false';
                                    @endphp
                                    @if($bool !== $value['value'])
                                        <option value="{{$bool}}"> {{$bool}} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        {{--  Energy level Score | Snore Yes No --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-4 col-6">
                <div class="form-group {{ $errors->has('complaints_1') ? 'has-error' : '' }}">
                    <label for="name">Rate your overall energy level 0 - 10</label>
                    <select  id="title" name="energyLevel" class="form-control ">
                        <option value="{{ $data['energyLevel'] }}">{{ $data['energyLevel'] }}</option>
                        @foreach($rate_number as $number)
                            @if($number != $data['energyLevel'])
                                <option value="{{$number}}"> {{$number}} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-1 col-6">
            </div>
            <div class="col-lg-4 col-6">
                <div class="form-group {{ $errors->has('complaints_2') ? 'has-error' : '' }}">
                    <label for="name">Have you been told you snore?</label>
                    <select  id="title" name="snore" class="form-control ">
                        <option value="{{ $data['snore'] }}">{{ $data['snore'] }}</option>
                        @foreach($yes_no as $yn)
                            @if($yn != $data['snore'])
                                <option value="{{$yn}}"> {{$yn}} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>


        {{--  Sound Score | wakeUpHeadaches Is Daily  --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">Rate the sound of your snoring 0 - 10</label>
                    <select  id="title" name="soundLevel" class="form-control ">
                        <option value="{{ $data['soundLevel'] }}">{{ $data['soundLevel'] }}</option>
                        @foreach($rate_number as $number)
                            @if($number != $data['soundLevel'])
                                <option value="{{$number}}"> {{$number}} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-1 col-6">
            </div>
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">How often do you wake up with morning headaches?</label>
                    <select  id="title" name="wakeUpHeadaches" class="form-control ">
                        @if(!empty($data['wakeUpHeadaches']))
                            <option value="{{ $data['wakeUpHeadaches'] }}">{{ $data['wakeUpHeadaches'] }}</option>
                            @foreach($is_daily as $daily)
                                @if($daily != $data['wakeUpHeadaches'])
                                    <option value="{{$daily}}"> {{$daily}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>


        {{--  wakeUpTime Score | bedPartner Yes No  --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">On average how many times per night do you wake up?</label>
                    <select  id="title" name="wakeUpTime" class="form-control ">
                        <option value="{{ $data['wakeUpTime'] }}">{{ $data['wakeUpTime'] }}</option>
                        @foreach($rate_number as $number)
                            @if($number != $data['wakeUpTime'])
                                <option value="{{$number}}"> {{$number}} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-1 col-6">
            </div>
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">Do you have a bed time partner?</label>
                    <select  id="title" name="bedPartner" class="form-control ">
                        <option value="{{ $data['bedPartner'] }}">{{ $data['bedPartner'] }}</option>
                        @foreach($yes_no as $yn)
                            @if($yn != $data['bedPartner'])
                                <option value="{{$yn}}"> {{$yn}} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>


        {{--  sleepHour Score | sleepRoom Yes No  --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">On average how many hours of sleep do you get per night?</label>
                    <select  id="title" name="sleepHour" class="form-control ">
                        <option value="{{ $data['sleepHour'] }}">{{ $data['sleepHour'] }}</option>
                        @foreach($rate_number as $number)
                            @if($number != $data['sleepHour'])
                                <option value="{{$number}}"> {{$number}} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-1 col-6">
            </div>
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">If yes, do they sleep in the same room?</label>
                    <select  id="title" name="sleepRoom" class="form-control ">
                        <option value="{{ $data['sleepRoom'] }}">{{ $data['sleepRoom'] }}</option>
                        @foreach($yes_no as $yn)
                            @if($yn != $data['sleepRoom'])
                                <option value="{{$yn}}"> {{$yn}} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>


        {{--  sleepQuality Score   --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">Rate your sleep quality 0 - 10</label>
                    <select  id="title" name="sleepQuality" class="form-control ">
                        <option value="{{ $data['sleepQuality'] }}">{{ $data['sleepQuality'] }}</option>
                        @foreach($rate_number as $number)
                            @if($number != $data['sleepQuality'])
                                <option value="{{$number}}"> {{$number}} </option>
                            @endif
                        @endforeach
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
