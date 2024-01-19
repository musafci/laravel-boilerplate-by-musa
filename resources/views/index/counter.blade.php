<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-indigo">
            <div class="inner">
                <h3>{{ $dentist_office }}</h3>
                <p>Dentist Office</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-hospital"></i>
            </div>
            <a href="{{route('dentist-office.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $ticket }}</h3>
                <p>Ticket</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-light fa-clipboard-list"></i>
            </div>
            <a href="{{route('ticket.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>
