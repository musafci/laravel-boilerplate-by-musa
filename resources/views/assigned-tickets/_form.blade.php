<div class="col-md-7">
    <div class="form-group ">
        <label for="name">Title</label>
        <input type="hidden" id="ticketId" name="ticketId" value="{{ $assigned_ticket[0]['ticket']['id'] ?? 0 }}">
        <input class="form-control" type="text"  value="{{ $assigned_ticket[0]['ticket']['title'] ?? '' }}" disabled>
    </div>
    <div class="form-group ">
        <label for="name">Body</label>
        <textarea class="form-control" maxlength="{{ isset($ticket) ? strlen($ticket->description) : 100 }}"  rows="3" cols="50" disabled >{{ $assigned_ticket[0]['ticket']['description'] ?? '' }}
        </textarea>
    </div>
    <div class="form-group ">
        <label for="name">Issuer Type</label>
        <input class="form-control" type="text"  value="{{ $assigned_ticket[0]['ticket']['issuer_type'] ?? '' }}" disabled>
    </div>
    <div class="form-group ">
        <label for="name">Issuer Name</label>
        <input class="form-control" type="text"  value="{{ $assigned_ticket[0]['ticket']['issuer_name'] ?? '' }}" disabled>
    </div>
    <div class="form-group ">
        <label for="name">Ticket Raised At</label>
        <input class="form-control" type="text"  value="{{ isset($assigned_ticket[0]['ticket']['ticket_raised_at']) ? date('j F, Y H:i:s A', strtotime($assigned_ticket[0]['ticket']['ticket_raised_at'])) : ''  }}" disabled>
        @if($errors->has('ticket_raised_at'))
            <span class="help-block" role="alert">{{ $errors->first('ticket_raised_at') }}</span>
        @endif
    </div>
</div>
<div class="col-md-5">
    <div class="form-group ">
        <label for="name">Priority Level</label>
        <input class="form-control" type="text"  value="{{ $assigned_ticket[0]['priority'] ?? '' }}" disabled>
    </div>
    <div class="form-group {{ $errors->has('remark') ? 'has-error' : '' }}">
        <label for="name">Remark</label>
        <textarea class="form-control" name="remark"  rows="15" cols="50" placeholder="Give a message here..."
                  @required($action=='reply') @disabled($action=='view')>{{ $assigned_ticket[0]['remark'] ?? '' }}</textarea>
        @if($errors->has('remark'))
            <span class="help-block" role="alert">{{ $errors->first('remark') }}</span>
        @endif
    </div>


</div>
