
@if(empty($patient_data->treatment))
    <h3 style="text-align: center">No data Found!</h3>
@else

    <form method="POST" action="{{ route("dentist-office.patients.questionnaire", ['office' => $patient_data->dentist_office_id, 'patient' => $patient_data->patient_profile_id]) }}">
        @method('PUT')
        @csrf

        @php
            $data = json_decode($patient_data->treatment, true);
//            dd($data['surgeryData']);
            $bool_data = [ true, false ];
            $rate_number = [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ];
            $yes_no = [ 'Yes', 'No' ];
            $is_daily = [ 'Everyday', 'Often', 'Sometimes', 'Rarely', 'Never' ];
        @endphp

        <div class="row justify-content-md-center">
            <input type="hidden" name="questionnaire_tab" value="treatment" >
        </div>

        <div class="row justify-content-md-center">
            <div class="col-lg-9 col-9">
                <h4>Sleep Study</h4>
            </div>
        </div>

        {{-- sleepStudy | sleepStudyPlace | sleepStudyDate --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-3 col-3">
                <div class="form-group ">
                    <label for="name">Have you had a sleep study?</label>
                    <select  id="title" name="sleepStudy" class="form-control ">
                        @if(!empty($data['sleepStudy']))
                            <option value="{{ $data['sleepStudy'] }}">{{ $data['sleepStudy'] }}</option>
                            @foreach($yes_no as $yn)
                                @if($yn != $data['sleepStudy'])
                                    <option value="{{$yn}}"> {{$yn}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-3">
                @if(!empty($data['sleepStudyPlace']))
                    <div class="form-group ">
                        <label for="name">If where is it?</label>
                        <input class="form-control" type="text" name="sleepStudyPlace" value="{{ $data['sleepStudyPlace'] }}" >
                    </div>
                @endif
            </div>
            <div class="col-lg-3 col-3">
                @if(!empty($data['sleepStudyDate']))
                    <div class="form-group ">
                        <label for="name">Date</label>
                        <input class="form-control" type="date" name="sleepStudyDate" value="{{ $data['sleepStudyDate'] }}" >
                    </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-lg-9 col-9">
                <h4>CPAP Intolerance</h4>
            </div>
        </div>

        {{-- cpap | currentcpap  --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-3 col-3">
                <div class="form-group ">
                    <label for="name">Have you had a sleep study?</label>
                    <select  id="title" name="cpap" class="form-control ">
                        @if(!empty($data['cpap']))
                            <option value="{{ $data['cpap'] }}">{{ $data['cpap'] }}</option>
                            @foreach($yes_no as $yn)
                                @if($yn != $data['cpap'])
                                    <option value="{{$yn}}"> {{$yn}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-3">
                @if(!empty($data['currentcpap']))
                <div class="form-group ">
                    <label for="name">Are you currently using CPAP?</label>
                    <select  id="title" name="currentcpap" class="form-control ">
                        <option value="{{ $data['currentcpap'] }}">{{ $data['currentcpap'] }}</option>
                        @foreach($yes_no as $yn)
                            @if($yn != $data['currentcpap'])
                                <option value="{{$yn}}"> {{$yn}} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                @endif
            </div>
            <div class="col-lg-3 col-3">
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

        {{--
        Dental Devices
        device | previousDevice
        --}}

        <div class="row justify-content-md-center">
            <div class="col-lg-9 col-9">
                <h4>Dental Devices</h4>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-lg-5 col-5">
                <div class="form-group ">
                    <label for="name">Are you currently wearing a dental device specifically designed to treat sleep apnea?</label>
                    <select  id="title" name="device" class="form-control ">
                        @if(!empty($data['device']))
                            <option value="{{ $data['device'] }}">{{ $data['device'] }}</option>
                            @foreach($yes_no as $yn)
                                @if($yn != $data['device'])
                                    <option value="{{$yn}}"> {{$yn}} </option>
                                @endif
                            @endforeach
                        @else
                            @foreach($yes_no as $yn)
                                <option value="{{$yn}}"> {{$yn}} </option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-4">
                <div class="form-group ">
                    <label for="name">Have you previously tried a dental device for sleep apnea treatment?</label>
                    <select  id="title" name="previousDevice" class="form-control ">
                        @if(!empty($data['previousDevice']))
                            <option value="{{ $data['previousDevice'] }}">{{ $data['previousDevice'] }}</option>
                            @foreach($yes_no as $yn)
                                @if($yn != $data['previousDevice'])
                                    <option value="{{$yn}}"> {{$yn}} </option>
                                @endif
                            @endforeach
                        @else
                            @foreach($yes_no as $yn)
                                <option value="{{$yn}}"> {{$yn}} </option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>

        {{--   Device Checklist     --}}
        @if(!empty($data['deviceCheckList']))
            @foreach($data['deviceCheckList'] as $key => $value)

                <div class="row justify-content-md-center">
                    <div class="col-lg-4 col-6">
                        <div class="form-group ">
                            <label for="name"> {{ $value['key'] }}</label>
                            <input type="hidden" name="deviceCheckList_key_{{$key}}" value="{{ $value['key'] }}">
                        </div>
                    </div>
                    <div class="col-lg-1 col-6">
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="form-group ">
                            <select  id="title" name="deviceCheckList_value_{{$key}}" class="form-control ">
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

        {{-- Experience --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-9 col-9">
                <div class="form-group ">
                    <label for="name">Describe your experience</label>
                    <input class="form-control" type="text" name="experience" value="{{ $data['experience'] ?? null }}" >
                    @if($errors->has('experience'))
                        <span class="help-block" role="alert">{{ $errors->first('experience') }}</span>
                    @endif
                </div>
            </div>
        </div>

        {{--
        Surgery
        device | previousDevice
        --}}

        <div class="row justify-content-md-center">
            <div class="col-lg-9 col-9">
                <h4>Surgery</h4>
            </div>
        </div>
        {{-- surgery  --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-6 col-6">
                <div class="form-group ">
                    <label for="name">Have you had surgery for snoring or sleep apnea?</label>
                    <select  id="title" name="surgery" class="form-control ">
                        @if(!empty($data['surgery']))
                            <option value="{{ $data['surgery'] }}">{{ $data['surgery'] }}</option>
                            @foreach($yes_no as $yn)
                                @if($yn != $data['surgery'])
                                    <option value="{{$yn}}"> {{$yn}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-3">
            </div>
        </div>

        {{-- surgeryDate | surgeon | surgery --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-3 col-3">
{{--                @if(!empty($data['surgeryData'][0]['surgeryDate']))--}}
                    <div class="form-group ">
                        <label for="name">Date</label>
                        <input class="form-control" type="date" name="surgeryData_surgeryDate" value="{{ $data['surgeryData'][0]['surgeryDate'] }}" >
                    </div>
{{--                @endif--}}
            </div>
            <div class="col-lg-3 col-3">
                @if(!empty($data['surgeryData'][0]['surgeon']))
                    <div class="form-group ">
                        <label for="name">Surgeon</label>
                        <input class="form-control" type="text" name="surgeryData_surgeon" value="{{ $data['surgeryData'][0]['surgeon'] }}" >
                    </div>
                @endif
            </div>
            <div class="col-lg-3 col-3">
                @if(!empty($data['surgeryData'][0]['surgery']))
                    <div class="form-group ">
                        <label for="name">Surgery</label>
                        <input class="form-control" type="text" name="surgeryData_surgery" value="{{ $data['surgeryData'][0]['surgery'] }}" >
                    </div>
                @endif
            </div>

        </div>

        {{-- Other --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-9 col-9">
                <div class="form-group ">
                    <label for="name">Other Therapy and Result</label>
                    <input class="form-control" type="text" name="other" value="{{ $data['other'] ?? null }}" >
                    @if($errors->has('other'))
                        <span class="help-block" role="alert">{{ $errors->first('other') }}</span>
                    @endif
                </div>
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
