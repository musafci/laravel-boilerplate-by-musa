
@if(empty($patient_data->history))
    <h3 style="text-align: center">No data Found!</h3>
@else

    <form method="POST" action="{{ route("dentist-office.patients.questionnaire", ['office' => $patient_data->dentist_office_id, 'patient' => $patient_data->patient_profile_id]) }}">
        @method('PUT')
        @csrf

        @php
            $data = json_decode($patient_data->history, true);
//            dd($data);
            $bool_data = [ true, false ];
            $rate_number = [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ];
            $yes_no = [ 'Yes', 'No' ];
            $is_daily = [ 'Everyday', 'Often', 'Sometimes', 'Rarely', 'Never' ];
            $smoke = [ 'Never', 'Occasionally', 'Daily' ];
        @endphp

        <div class="row justify-content-md-center">
            <input type="hidden" name="questionnaire_tab" value="history" >
        </div>

        <div class="row justify-content-md-center">
            <div class="col-lg-9 col-9">
                <h4>Premedication</h4>
            </div>
        </div>

        {{-- preMedication --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-6 col-7">
                <div class="form-group ">
                    <label for="name">Have you been told you should receive pre medication before dental procedures?</label>
                </div>
            </div>
            <div class="col-lg-1 col-1">
                <div class="form-group ">

                    <select  id="title" name="preMedication" class="form-control ">
                        @if(!empty($data['preMedication']))
                            <option value="{{ $data['preMedication'] }}">{{ $data['preMedication'] }}</option>
                            @foreach($yes_no as $yn)
                                @if($yn != $data['preMedication'])
                                    <option value="{{$yn}}"> {{$yn}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-2">
            </div>
        </div>

        {{-- Reason --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-9 col-9">
                <div class="form-group ">
                    <label for="name">What medications and why do you require it?</label>
                    <input class="form-control" type="text" name="medicationReason" value="{{ $data['medicationReason'] ?? null }}" >
                    @if($errors->has('medicationReason'))
                        <span class="help-block" role="alert">{{ $errors->first('medicationReason') }}</span>
                    @endif
                </div>
            </div>
        </div>

        {{--
        Allergens
        --}}

        <div class="row justify-content-md-center">
            <div class="col-lg-9 col-9">
                <h4>Allergens</h4>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-lg-6 col-6">
                <div class="form-group ">
                    <label for="name">Do you have any known allergens(for example: aspirin, latex, penicillin etc.)?</label>

                </div>
            </div>
            <div class="col-lg-1 col-1">
                <div class="form-group ">

                    <select  id="title" name="allergy" class="form-control ">
                        @if(!empty($data['allergy']))
                            <option value="{{ $data['allergy'] }}">{{ $data['allergy'] }}</option>
                            @foreach($yes_no as $yn)
                                @if($yn != $data['allergy'])
                                    <option value="{{$yn}}"> {{$yn}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-2">
            </div>
        </div>


        @if(!empty($data['allergensArr']))
            @foreach($data['allergensArr'] as $key => $value)
                @php
                    //        dd($value);
                @endphp

                <div class="row justify-content-md-center">
                    <div class="col-lg-4 col-6">
                        <div class="form-group {{ $errors->has('allergensArr_key') ? 'has-error' : '' }}">
                            <label for="name"> {{ $value['key'] }}</label>
                            <input type="hidden" name="allergensArr_key_{{$key}}" value="{{ $value['key'] }}">
                        </div>
                    </div>
                    <div class="col-lg-1 col-6">
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="form-group {{ $errors->has('allergensArr_value') ? 'has-error' : '' }}">
                            <select  id="title" name="allergensArr_value_{{$key}}" class="form-control ">
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
        Medication currently being taken
        --}}

        <div class="row justify-content-md-center">
            <div class="col-lg-9 col-9">
                <h4>Medication currently being taken</h4>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-lg-4 col-6">
                <div class="form-group ">
                    <label for="name">Are you currently taking any medications?</label>

                </div>
            </div>
            <div class="col-lg-1 col-1">
                <div class="form-group ">

                    <select  id="title" name="currentMedication" class="form-control ">
                        @if(!empty($data['currentMedication']))
                            <option value="{{ $data['currentMedication'] }}">{{ $data['currentMedication'] }}</option>
                            @foreach($yes_no as $yn)
                                @if($yn != $data['currentMedication'])
                                    <option value="{{$yn}}"> {{$yn}} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-2">
            </div>
        </div>


        @if(!empty($data['medicationArr']))
            @foreach($data['medicationArr'] as $key => $value)
                @php
                    //        dd($value);
                @endphp

                <div class="row justify-content-md-center">
                    <div class="col-lg-4 col-6">
                        <div class="form-group {{ $errors->has('medicationArr_key') ? 'has-error' : '' }}">
                            <label for="name"> {{ $value['key'] }}</label>
                            <input type="hidden" name="medicationArr_key_{{$key}}" value="{{ $value['key'] }}">
                        </div>
                    </div>
                    <div class="col-lg-1 col-6">
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="form-group {{ $errors->has('medicationArr_value') ? 'has-error' : '' }}">
                            <select  id="title" name="medicationArr_value_{{$key}}" class="form-control ">
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


        {{-- Medical History --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-9 col-9">
                <h4>Medical History</h4>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-lg-9 col-9">
                <div class="form-group ">
                    <label for="name">List all other medical diagnoses and surgeries from birth until now</label>
                    <input class="form-control" type="text" name="medicalHistory" value="{{ $data['medicalHistory'] ?? null }}" >
                    @if($errors->has('experience'))
                        <span class="help-block" role="alert">{{ $errors->first('medicalHistory') }}</span>
                    @endif
                </div>
            </div>
        </div>

        {{-- Dental History --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-9 col-9">
                <h4>Dental History</h4>
            </div>
        </div>

        @if(!empty($data['dentalHistoryArr']))
            @foreach($data['dentalHistoryArr'] as $key => $value)

                <div class="row justify-content-md-center">
                    <div class="col-lg-4 col-6">
                        <div class="form-group {{ $errors->has('dentalHistoryArr_key') ? 'has-error' : '' }}">
                            <label for="name"> {{ $value['key'] }}</label>
                            <input type="hidden" name="dentalHistoryArr_key_{{$key}}" value="{{ $value['key'] }}">
                        </div>
                    </div>
                    <div class="col-lg-1 col-6">
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="form-group {{ $errors->has('dentalHistoryArr_value') ? 'has-error' : '' }}">
                            <input class="form-control" type="text" name="dentalHistoryArr_value_{{$key}}" value="{{ ($value['state']) ? $value['value'] : null }}" >
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        {{-- Family History --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-9 col-9">
                <h4>Family History</h4>
            </div>
        </div>

        @if(!empty($data['familyHistory']))
            @foreach($data['familyHistory'] as $key => $value)
                @php
                    //        dd($value);
                @endphp

                <div class="row justify-content-md-center">
                    <div class="col-lg-4 col-6">
                        <div class="form-group {{ $errors->has('familyHistory_key') ? 'has-error' : '' }}">
                            <label for="name"> {{ $value['key'] }}</label>
                            <input type="hidden" name="familyHistory_key_{{$key}}" value="{{ $value['key'] }}">
                        </div>
                    </div>
                    <div class="col-lg-1 col-6">
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="form-group {{ $errors->has('familyHistory_value') ? 'has-error' : '' }}">
                            <select  id="title" name="familyHistory_value_{{$key}}" class="form-control ">
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


        {{-- Social History --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-9 col-9">
                <h4>Social History</h4>
            </div>
        </div>

        @if(!empty($data['socialHistory']))
            @foreach($data['socialHistory'] as $key => $value)

                <div class="row justify-content-md-center">
                    <div class="col-lg-7 col-7">
                        <div class="form-group {{ $errors->has('socialHistory_key') ? 'has-error' : '' }}">
                            <label for="name"> {{ $value['key'] }}</label>
                            <input type="hidden" name="socialHistory_key_{{$key}}" value="{{ $value['key'] }}">
                        </div>
                    </div>

                    <div class="col-lg-2 col-2">
                        <div class="form-group ">
                            <select  id="title" name="socialHistory_value_{{$key}}" class="form-control ">
                                @if(!empty($value['value']))
                                    <option value="{{ $value['value'] }}">{{ $value['value'] }}</option>
                                    @foreach($smoke as $yn)
                                        @if($yn != $value['value'])
                                            <option value="{{$yn}}"> {{$yn}} </option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                </div>
            @endforeach
        @endif

        {{-- Smoke | Chewing --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-3 col-3">
                <div class="form-group ">
                    <label for="name">Do you smoke</label>
                    <select  id="title" name="smoke" class="form-control ">
                        @php
                            if($data['smoke'])
                                $data['smoke'] = 'true';
                            else
                                $data['smoke'] = 'false';
                        @endphp
                        <option value="{{ $data['smoke'] }}">
                            {{ $data['smoke'] }}
                        </option>
                        @foreach($bool_data as $bool)
                            @php
                                if($bool)
                                    $bool = 'true';
                                else
                                    $bool = 'false';
                            @endphp
                            @if($bool !== $data['smoke'])
                                <option value="{{$bool}}"> {{$bool}} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-3">
                <div class="form-group ">
                    <label for="name">Do you use chewing tobacco?</label>
                    <select  id="title" name="tobacco" class="form-control ">
                        @php
                            if($data['tobacco'])
                                $data['tobacco'] = 'true';
                            else
                                $data['tobacco'] = 'false';
                        @endphp
                        <option value="{{ $data['tobacco'] }}">
                            {{ $data['tobacco'] }}
                        </option>
                        @foreach($bool_data as $bool)
                            @php
                                if($bool)
                                    $bool = 'true';
                                else
                                    $bool = 'false';
                            @endphp
                            @if($bool !== $data['tobacco'])
                                <option value="{{$bool}}"> {{$bool}} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-3">
            </div>
        </div>

        {{-- Other --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-9 col-9">
                <div class="form-group ">
                    <label for="name">Additional Paragraph</label>
                    <input class="form-control" type="text" name="additionalParagraph" value="{{ $data['additionalParagraph'] ?? null }}" >
                    @if($errors->has('additionalParagraph'))
                        <span class="help-block" role="alert">{{ $errors->first('additionalParagraph') }}</span>
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
