@if($errors->any())
    <ul class="alert alert-danger list-unstyled" style="margin-bottom: 10px; padding: 10px">
        @foreach($errors->all() as $error)
            @if("1" == $error)
                @continue
            @endif
            <li>{{$error}}</li>
        @endforeach
    </ul>

@endif
