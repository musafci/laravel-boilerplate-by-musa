<div class="row justify-content-md-center">
    <div class="col-lg-9 col-9">
        <label for="name" class="text-black-50">Dentist Office Info</label>
    </div>
</div>

{{--  Office Name | In-charge Name | Office Email --}}
<div class="row justify-content-md-center ">
    <div class="col-lg-3 col-3">
        <div class="form-group {{ $errors->has('office_name') ? 'has-error' : '' }}">
            <label for="name" class="font-weight-normal">Office Name<span class="text-red"> *</span></label>
            <input class="form-control" type="text" name="office_name" value="{{ old('office_name', isset($patient_data) ? $patient_data->first_name : null) }}" required>
            @if($errors->has('office_name'))
                <span class="help-block" role="alert">{{ $errors->first('office_name') }}</span>
            @endif
        </div>
    </div>
    <div class="col-lg-3 col-3">
        <div class="form-group {{ $errors->has('in_charge_name') ? 'has-error' : '' }}">
            <label for="name" class="font-weight-normal">In-charge Name<span class="text-red"> *</span></label>
            <input class="form-control" type="text" name="in_charge_name" value="{{ old('in_charge_name', isset($patient_data) ? $patient_data->middle_name : null) }} " required>
            @if($errors->has('in_charge_name'))
                <span class="help-block" role="alert">{{ $errors->first('in_charge_name') }}</span>
            @endif
        </div>
    </div>
    <div class="col-lg-3 col-3">
        <div class="form-group {{ $errors->has('office_email') ? 'has-error' : '' }}">
            <label for="name" class="font-weight-normal">Office Email<span class="text-red"> *</span></label>
            <input class="form-control" type="email" name="office_email" value="{{ old('office_email', isset($patient_data) ? $patient_data->last_name : null) }}" required>
            @if($errors->has('office_email'))
                <span class="help-block" role="alert">{{ $errors->first('office_email') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="row justify-content-md-center">
    <div class="col-lg-9 col-9">
        <label for="name" class="text-black-50">Location Details</label>
    </div>
</div>

{{--  Area Name | Address --}}
<div class="row justify-content-md-center ">
    <div class="col-lg-3 col-3">
        <div class="form-group {{ $errors->has('area_name') ? 'has-error' : '' }}">
            <label for="name" class="font-weight-normal">Branch Name<span class="text-red"> *</span></label>
            <input class="form-control" type="text" name="area_name" value="{{ old('area_name', isset($patient_data) ? $patient_data->first_name : null) }}" required>
            @if($errors->has('area_name'))
                <span class="help-block" role="alert">{{ $errors->first('area_name') }}</span>
            @endif
        </div>
    </div>
    <div class="col-lg-6 col-6">
        <div class="form-group {{ $errors->has('office_address') ? 'has-error' : '' }}">
            <label for="name" class="font-weight-normal">Address<span class="text-red"> *</span></label>
            <input class="form-control" type="text" name="office_address" value="{{ old('office_address', isset($patient_data) ? $patient_data->middle_name : null) }}" required>
            @if($errors->has('office_address'))
                <span class="help-block" role="alert">{{ $errors->first('office_address') }}</span>
            @endif
        </div>
    </div>
</div>

{{-- City | State | Zip Code --}}
<div class="row justify-content-md-center">
    <div class="col-lg-3 col-3">
        <div class="form-group {{ $errors->has('office_city') ? 'has-error' : '' }}">
            <label for="name" class="font-weight-normal">City<span class="text-red"> *</span></label>
            <input class="form-control" type="text" name="office_city" value="{{ old('office_city', $employer_data->city ?? null) }}" required>
            @if($errors->has('office_city'))
                <span class="help-block" role="alert">{{ $errors->first('office_city') }}</span>
            @endif
        </div>
    </div>

    <div class="col-lg-3 col-3">
        <div class="form-group {{ $errors->has('office_state') ? 'has-error' : '' }}">
            <label for="name" class="font-weight-normal">State<span class="text-red"> *</span></label>
            <input class="form-control" type="text" name="office_state" value="{{ old('office_state',  $employer_data->state ?? null) }}" required>
            @if($errors->has('office_state'))
                <span class="help-block" role="alert">{{ $errors->first('office_state') }}</span>
            @endif
        </div>
    </div>

    <div class="col-lg-3 col-3">
        <div class="form-group {{ $errors->has('office_zipCode') ? 'has-error' : '' }}">
            <label for="name" class="font-weight-normal">Zip Code<span class="text-red"> *</span></label>
            <input class="form-control" type="number" name="office_zipCode" value="{{ old('office_zipCode', $employer_data->zipCode ?? null) }}" required>
            @if($errors->has('office_zipCode'))
                <span class="help-block" role="alert">{{ $errors->first('office_zipCode') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-5 col-6">
        <a class="btn btn-default" href="{{ route('dentist-office.index') }}">
            Back
        </a>
    </div>
    <div class="col-lg-4 col-6">
        <div class="form-group ">
            <button class="btn btn-danger float-right" type="submit">
                Save
            </button>
        </div>
    </div>

</div>
