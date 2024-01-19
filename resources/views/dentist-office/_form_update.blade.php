<div class="row justify-content-md-center">
    <div class="col-lg-8 col-8">
        <label for="name" class="text-black-50">Dentist Office Info</label>
    </div>
</div>

{{--  Office Name | In-charge Name | Office Email --}}
<div class="row justify-content-md-center ">
    <div class="col-lg-4 col-4">
        <div class="form-group {{ $errors->has('office_name') ? 'has-error' : '' }}">
            <label for="name" class="font-weight-normal">Office Name<span class="text-red"> *</span></label>
            <input class="form-control" type="text" name="office_name" value="{{ old('office_name', isset($dentist_office) ? $dentist_office->office_name : null) }}" required>
            @if($errors->has('office_name'))
                <span class="help-block" role="alert">{{ $errors->first('office_name') }}</span>
            @endif
        </div>
    </div>
    <div class="col-lg-4 col-4">
        <div class="form-group {{ $errors->has('in_charge_name') ? 'has-error' : '' }}">
            <label for="name" class="font-weight-normal">In-charge Name<span class="text-red"> *</span></label>
            <input class="form-control" type="text" name="in_charge_name" value="{{ old('in_charge_name', isset($office_credential) ? $office_credential->name : null) }} " required>
            @if($errors->has('in_charge_name'))
                <span class="help-block" role="alert">{{ $errors->first('in_charge_name') }}</span>
            @endif
        </div>
    </div>

</div>

{{--  Office Email | Status --}}
<div class="row justify-content-md-center ">
    <div class="col-lg-4 col-4">
        <div class="form-group {{ $errors->has('office_email') ? 'has-error' : '' }}">
            <label for="name" class="font-weight-normal">Office Email</label>
            <input class="form-control" type="email" name="office_email" value="{{ isset($office_credential) ? $office_credential->email : null }}" disabled>
            @if($errors->has('office_email'))
                <span class="help-block" role="alert">{{ $errors->first('office_email') }}</span>
            @endif
        </div>
    </div>
    <div class="col-lg-4 col-4">
        <div class="form-group ">
            <label for="name" class="font-weight-normal">Dentist Office Status</label>
            <select  id="status" name="status" class="form-control col-4">
                <option value="{{ $dentist_office->status }}">Select Status ( {{ $dentist_office->status }} )</option>
                @foreach ($select_status as $status)
                    @if($status != $dentist_office->status)
                        <option value="{{$status}}"> {{$status}} </option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
</div>

{{--  Back | Submit --}}
<div class="row justify-content-center">
    <div class="col-lg-4 col-4">
        <a class="btn btn-default" href="{{ route('dentist-office.index') }}">
            Back
        </a>
    </div>
    <div class="col-lg-4 col-4">
        <div class="form-group ">
            <button class="btn btn-danger float-right" type="submit">
                Update
            </button>
        </div>
    </div>

</div>
