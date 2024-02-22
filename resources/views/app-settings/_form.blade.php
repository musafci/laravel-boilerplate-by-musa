<div class="form-group {{ $errors->has('app_name') ? 'has-error' : '' }}">
    <label for="app_name">App Name <span class="text-red"> *</span></label>
    <input class="form-control" type="text" name="app_name" value="{{ old('app_name', isset($setting) ? $setting->app_name : null) }}" required/>
    @if($errors->has('app_name'))
        <span class="help-block" role="alert">{{ $errors->first('app_name') }}</span>
    @endif
</div>

<div class="form-group">
    <label for="logo">App Description</label>
    <textarea class="form-control" name="app_description" id="app_description" cols="30" rows="5">{{ old('app_description', isset($setting) ? $setting->app_description : null) }}</textarea>
</div>

@if(isset($breadcrumbs['0']) && $breadcrumbs['0'] == 'Create')
    <div class="form-group">
        <label for="logo">Logo</label>
        <input class="form-control" id="logo" type="file" name="logo"/>
    </div>
@endif


@if(isset($breadcrumbs['0']) && $breadcrumbs['0'] == 'Edit')
<div class="row">
    @if(!empty($setting->logo))
    <div class="form-group col-2">
        <img src="{{asset($setting->logo ?? 'images/not_found.png')}}"
            style="
            width: 90px;
            height: 90px;
            background-color: lightskyblue;
            display: block;
            margin-top: auto;
            padding: 15px;
            border-radius: 10px;
            "
        />
    </div>
    @endif

    @php
        if (!empty($setting->logo)) {
            $logo_name = explode("/", $setting->logo);
        }
    @endphp
    <div class="{{$setting->logo ? 'col-10' : 'col-12'}}">
        <div class="form-group">
                <label for="logo" >Logo</label>
                <input class="form-control" id="logo" type="file" name="logo"/>
            @if(!empty($setting->logo))
                <span style="color: #ff9800; font-size: 14px; font-weight: bold">{{ $logo_name[3] ?? null }}</span>
            @endif
        </div>
    </div>
</div>
@endif