<div class="col-md-7">
    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <label for="name">Title</label>
        <input class="form-control" type="text"  value="{{ old('title', isset($ticket) ? $ticket->title : null) }}" disabled>
        @if($errors->has('email'))
            <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
        <label for="name">Body</label>
        <textarea class="form-control" maxlength="{{ isset($ticket) ? strlen($ticket->description) : 100 }}"  rows="3" cols="50" disabled >{{ old('description', isset($ticket) ? $ticket->description : null) }}
        </textarea>
        @if($errors->has('description'))
            <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('issuer_type') ? 'has-error' : '' }}">
        <label for="name">Issuer Type</label>
        <input class="form-control" type="text"  value="{{ old('issuer_type', isset($ticket) ? $ticket->issuer_type : null) }}" disabled>
        @if($errors->has('issuer_type'))
            <span class="help-block" role="alert">{{ $errors->first('issuer_type') }}</span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('issuer_name') ? 'has-error' : '' }}">
        <label for="name">Issuer Name</label>
        <input class="form-control" type="text"  value="{{ old('issuer_name', isset($ticket) ? $ticket->issuer_name : null) }}" disabled>
        @if($errors->has('issuer_name'))
            <span class="help-block" role="alert">{{ $errors->first('issuer_name') }}</span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('ticket_raised_at') ? 'has-error' : '' }}">
        <label for="name">Ticket Raised At</label>
        <input class="form-control" type="text"  value="{{ old('ticket_raised_at', isset($ticket) ? date('j F, Y H:i:s A', strtotime($ticket->ticket_raised_at)) : null) }}" disabled>
        @if($errors->has('ticket_raised_at'))
            <span class="help-block" role="alert">{{ $errors->first('ticket_raised_at') }}</span>
        @endif
    </div>
</div>
<div class="col-md-5">
    <div class="form-group ">
        <label for="">Assign to:</label>
        @if(!empty($users))
        <select  id="assignee" name="assignee" class="form-control col-4">
            @foreach ($users as $user)
                @continue($user['name'] == 'Super Admin')
                    <option value="{{$user['id']}}"> {{$user['name']}}  </option>
            @endforeach
        </select>
        @else
            <div class="form-group has-error">
                <span class="help-block" role="alert">No assignee permission set to any users.</span>
            </div>
        @endif
    </div>
    <div class="form-group ">
        <label for="">Priority Level:</label>
        <select  id="priority" name="priority" class="form-control col-4">
            <option value="Normal">Normal</option>
            <option value="High">High</option>
            <option value="Extreme">Extreme</option>
        </select>
    </div>

</div>
