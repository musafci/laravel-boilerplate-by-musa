<form method="POST" action="{{ route("dentist-office.patients.patient-update", ['office' => $patient_data->dentist_office_id, 'patient' => $patient_data->patient_profile_id]) }}">
    @method('PUT')
    @csrf
    {{-- Title | First Name | Middle Name | Last Name --}}
    <div class="row justify-content-md-center">
        <div class="col-lg-auto col-2">
            <div >
                <label for="">Title<span style="color: red;"> *</span></label>
                <select  id="title" name="patient_title" class="form-control ">
                    <option value="{{ $patient_data->title }}">{{ $patient_data->title }}</option>
                    @foreach($person_title as $title)
                        @if($title != $patient_data->title)
                            <option value="{{$title}}"> {{$title}} </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-3 col-3">
            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                <label for="name">First Name<span style="color: red;"> *</span></label>
                <input class="form-control" type="text" name="first_name" value="{{ old('first_name', isset($patient_data) ? $patient_data->first_name : null) }}" required>
                @if($errors->has('first_name'))
                    <span class="help-block" role="alert">{{ $errors->first('first_name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-2 col-3">
            <div class="form-group {{ $errors->has('middle_name') ? 'has-error' : '' }}">
                <label for="name">Middle Name</label>
                <input class="form-control" type="text" name="middle_name" value="{{ old('middle_name', isset($patient_data) ? $patient_data->middle_name : null) }}" >
                @if($errors->has('middle_name'))
                    <span class="help-block" role="alert">{{ $errors->first('middle_name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-3 col-3">
            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                <label for="name">Last Name<span style="color: red;"> *</span></label>
                <input class="form-control" type="text" name="last_name" value="{{ old('last_name', isset($patient_data) ? $patient_data->last_name : null) }}" required>
                @if($errors->has('last_name'))
                    <span class="help-block" role="alert">{{ $errors->first('last_name') }}</span>
                @endif
            </div>
        </div>
    </div>

    {{-- Gender | Marital Status | Date of Birth --}}
    <div class="row justify-content-md-center">
        <div class="col-lg-3 col-3">
            <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                <label for="name">Gender<span style="color: red;"> *</span></label>
                <select  id="title" name="gender" class="form-control ">
                    <option value="{{ $patient_data->gender }}">{{ $patient_data->gender }}</option>
                    @foreach($person_gender as $gender)
                        @if($gender != $patient_data->gender)
                            <option value="{{$gender}}"> {{$gender}} </option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <span class="help-block" role="alert">{{ $errors->first('gender') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-3 col-4">
            <div class="form-group {{ $errors->has('marital_status') ? 'has-error' : '' }}">
                <label for="name">Marital Status<span style="color: red;"> *</span></label>
                <select  id="title" name="marital_status" class="form-control ">
                    <option value="{{ $patient_data->marital_status }}">{{ $patient_data->marital_status }}</option>
                    @foreach($person_marital_status as $marital_status)
                        @if($marital_status != $patient_data->marital_status)
                            <option value="{{$marital_status}}"> {{$marital_status}} </option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('marital_status'))
                    <span class="help-block" role="alert">{{ $errors->first('marital_status') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-3 col-4">
            <div class="form-group {{ $errors->has('dob') ? 'has-error' : '' }}">
                <label for="name">Date of Birth<span style="color: red;"> *</span></label>
                <input class="form-control" type="date" name="dob" value="{{ old('dob', isset($patient_data) ? $patient_data->dob : null) }}" >
                @if($errors->has('dob'))
                    <span class="help-block" role="alert">{{ $errors->first('dob') }}</span>
                @endif
            </div>
        </div>
    </div>

    @php
        $height_data = [];
        if (!empty($patient_data->height)) {
            $height_data = explode('.', $patient_data->height);
        }
    @endphp

    {{-- Height | Weight | Social Seciruty Number --}}
    <div class="row justify-content-md-center">
        <div class="col-lg-2 col-2">
            <div class="form-group {{ $errors->has('height_feet') ? 'has-error' : '' }}">
                <label for="name">Height<span style="color: red;"> *</span></label>
                <div style="display: flex; flex-direction: row;">
                    <input class="form-control" type="number" name="height_feet" value="{{ $height_data[0] ?? 0 }}" required>
                    <span style="
                    height: 100%; --tw-bg-opacity: 1; background-color: rgb(241 245 249/var(--tw-bg-opacity));
                    padding: 0.45rem 1rem;margin-left: 5px;
                    ">Feet</span>
                </div>
                @if($errors->has('height_feet'))
                    <span class="help-block" role="alert">{{ $errors->first('height_feet') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-2 col-2">
            <div class="form-group {{ $errors->has('height_inches') ? 'has-error' : '' }}" style="margin-top: 33px;">
    {{--            <label for="name">Height</label>--}}
                <div style="display: flex; flex-direction: row;">
                    <input class="form-control" type="number" name="height_inches" value="{{ $height_data[1] ?? 0 }}" required>
                    <span style="
                    height: 100%; --tw-bg-opacity: 1; background-color: rgb(241 245 249/var(--tw-bg-opacity));
                    padding: 0.45rem 0.8rem;margin-left: 5px;
                    ">Inches</span>
                </div>
                @if($errors->has('height_inches'))
                    <span class="help-block" role="alert">{{ $errors->first('height_inches') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-2 col-3">
            <div class="form-group {{ $errors->has('weight') ? 'has-error' : '' }}">
                <label for="name">Weight<span style="color: red;"> *</span></label>
                <input class="form-control" type="number" name="weight" value="{{ old('weight', isset($patient_data) ? $patient_data->weight : null) }}" required>
                @if($errors->has('weight'))
                    <span class="help-block" role="alert">{{ $errors->first('weight') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-3 col-4">
            <div class="form-group {{ $errors->has('ssn') ? 'has-error' : '' }}">
                <label for="name">Social Security Number<span style="color: red;"> *</span></label>
                <input class="form-control" type="number" name="ssn" value="{{ old('ssn', isset($patient_data) ? $patient_data->ssn : null) }}" required>
                @if($errors->has('ssn'))
                    <span class="help-block" role="alert">{{ $errors->first('ssn') }}</span>
                @endif
            </div>
        </div>
    </div>

    {{-- Address Line 1 | Address Line 2 --}}
    <div class="row justify-content-md-center">
        <div class="col-lg-5 col-6">
            <div class="form-group {{ $errors->has('address_one') ? 'has-error' : '' }}">
                <label for="name">Address Line 1<span style="color: red;"> *</span></label>
                <input class="form-control" type="text" name="address_one" value="{{ old('address_one', isset($patient_data) ? $patient_data->address_one : null) }}" required>
                @if($errors->has('address_one'))
                    <span class="help-block" role="alert">{{ $errors->first('address_one') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-5">
            <div class="form-group {{ $errors->has('address_two') ? 'has-error' : '' }}">
                <label for="name">Address Line 2</label>
                <input class="form-control" type="text" name="address_two" value="{{ old('address_two', isset($patient_data) ? $patient_data->address_two : null) }}" >
                @if($errors->has('address_two'))
                    <span class="help-block" role="alert">{{ $errors->first('address_two') }}</span>
                @endif
            </div>
        </div>
    </div>

    {{-- State | City | Zip --}}
    <div class="row justify-content-md-center">
        <div class="col-lg-3 col-4">
            <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                <label for="name">State<span style="color: red;"> *</span></label>
                <input class="form-control" type="text" name="state" value="{{ old('state', isset($patient_data) ? $patient_data->state : null) }}" required>
                @if($errors->has('state'))
                    <span class="help-block" role="alert">{{ $errors->first('state') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-3 col-3">
            <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                <label for="name">City<span style="color: red;"> *</span></label>
                <input class="form-control" type="text" name="city" value="{{ old('city', isset($patient_data) ? $patient_data->city : null) }}" required>
                @if($errors->has('city'))
                    <span class="help-block" role="alert">{{ $errors->first('city') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-3 col-4">
            <div class="form-group {{ $errors->has('zipCode') ? 'has-error' : '' }}">
                <label for="name">Zip Code<span style="color: red;"> *</span></label>
                <input class="form-control" type="number" name="zipCode" value="{{ old('zipCode', isset($patient_data) ? $patient_data->zipCode : null) }}" required>
                @if($errors->has('zipCode'))
                    <span class="help-block" role="alert">{{ $errors->first('zipCode') }}</span>
                @endif
            </div>
        </div>
    </div>

    {{-- Phone | Email --}}
    <div class="row justify-content-md-center">
        <div class="col-lg-2 col-2">
            <div >
                <label for="">Type</label>
                <select  id="title" name="phone_title" class="form-control ">
                    <option value="Home">Home</option>
                    <option value="Mobile">Mobile</option>
                    <option value="Office">Office</option>
                </select>
            </div>
        </div>
        <div class="col-lg-3 col-4">
            <div class="form-group {{ $errors->has('phone_numbers') ? 'has-error' : '' }}">
                <label for="name">Phone Number<span style="color: red;"> *</span></label>
                <input class="form-control" type="number" name="phone_numbers" value="{{ old('phone_numbers', $phone['number'] ?? null) }}" required>
                @if($errors->has('phone_numbers'))
                    <span class="help-block" role="alert">{{ $errors->first('phone_numbers') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-5">
            <div class="form-group ">
                <label for="name">Email</label>
                <input class="form-control" type="email" value="{{ $patient_email->email ?? null }}" disabled>

            </div>
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-lg-9 col-9">
            <label for="name">Employer Information</label>
        </div>
    </div>

    {{-- Employer | Employer Phone | Employer Fax --}}
    <div class="row justify-content-md-center">
        <div class="col-lg-3 col-4">
            <div class="form-group {{ $errors->has('employer_name') ? 'has-error' : '' }}">
                <label for="name">Employer</label>
                <input class="form-control" type="text" name="employer_name" value="{{ old('employer_name',  $employer_data->name ?? null) }}" >
                @if($errors->has('employer_name'))
                    <span class="help-block" role="alert">{{ $errors->first('employer_name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-3 col-4">
            <div class="form-group {{ $errors->has('employer_phone_number') ? 'has-error' : '' }}">
                <label for="name">Phone Number</label>
                <input class="form-control" type="number" name="employer_phone_number" value="{{ old('employer_phone_number', $employer_data->phone ?? null) }}" >
                @if($errors->has('employer_phone_number'))
                    <span class="help-block" role="alert">{{ $errors->first('employer_phone_number') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-3 col-3">
            <div class="form-group {{ $errors->has('employer_fax') ? 'has-error' : '' }}">
                <label for="name">Fax</label>
                <input class="form-control" type="text" name="employer_fax" value="{{ old('employer_fax', $employer_data->fax ?? null) }}" >
                @if($errors->has('employer_fax'))
                    <span class="help-block" role="alert">{{ $errors->first('employer_fax') }}</span>
                @endif
            </div>
        </div>
    </div>

    {{-- Employer Address 1 | Employer Address 2 | Employer City | Employer State | Employer Zip Code --}}
    <div class="row justify-content-md-center">
        <div class="col-lg-2 col-3">
            <div class="form-group {{ $errors->has('employer_address_1') ? 'has-error' : '' }}">
                <label for="name">Address One</label>
                <input class="form-control" type="text" name="employer_address_1" value="{{ old('employer_address_1',  $employer_data->address1 ?? null) }}" >
                @if($errors->has('employer_address_1'))
                    <span class="help-block" role="alert">{{ $errors->first('employer_address_1') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-2 col-2">
            <div class="form-group {{ $errors->has('employer_address_2') ? 'has-error' : '' }}">
                <label for="name">Address Two</label>
                <input class="form-control" type="text" name="employer_address_2" value="{{ old('employer_address_2',  $employer_data->address2 ?? null) }}" >
                @if($errors->has('employer_address_2'))
                    <span class="help-block" role="alert">{{ $errors->first('employer_address_2') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-2 col-2">
            <div class="form-group {{ $errors->has('employer_state') ? 'has-error' : '' }}">
                <label for="name">State</label>
                <input class="form-control" type="text" name="employer_state" value="{{ old('employer_state',  $employer_data->state ?? null) }}" >
                @if($errors->has('employer_state'))
                    <span class="help-block" role="alert">{{ $errors->first('employer_state') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-2 col-2">
            <div class="form-group {{ $errors->has('employer_city') ? 'has-error' : '' }}">
                <label for="name">City</label>
                <input class="form-control" type="text" name="employer_city" value="{{ old('employer_city', $employer_data->city ?? null) }}" >
                @if($errors->has('employer_city'))
                    <span class="help-block" role="alert">{{ $errors->first('employer_city') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-1 col-2">
            <div class="form-group {{ $errors->has('employer_zipCode') ? 'has-error' : '' }}">
                <label for="name">Zip Code</label>
                <input class="form-control" type="number" name="employer_zipCode" value="{{ old('employer_zipCode', $employer_data->zipCode ?? null) }}" >
                @if($errors->has('employer_zipCode'))
                    <span class="help-block" role="alert">{{ $errors->first('employer_zipCode') }}</span>
                @endif
            </div>
        </div>
    </div>

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
