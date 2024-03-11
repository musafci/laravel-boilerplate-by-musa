<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-teal">
            <div class="inner">
                <h3>{{ $counts['patients'] ?? null }}</h3>
                <p>Patients (Lifetime)</p>
            </div>
            <div class="icon">
                <i class="fas fa-procedures"></i>
            </div>
            <a href="{{route('dentist-office.patients', [$office['id']])}}" class="small-box-footer">Visit Patients <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-gradient-indigo">
            <div class="inner">
                <h3>{{ $counts['staffs'] ?? null }}</h3>
                <p>Staffs</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-md"></i>
            </div>
            <a href="{{route('dentist-office.staffs', [$office['id']])}}" class="small-box-footer">Visit Staffs <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-gradient-danger">
            <div class="inner">
                <h3>{{ $counts['appointments'] ?? null }}</h3>
                <p>Appointments (Lifetime)</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar-check"></i>
            </div>
{{--            <a href="#" class="small-box-footer">More info</a>--}}
            <span class="small-box-footer">Lifetime</span>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-blue">
            <div class="inner">
                <h3>{{ $counts['patients'] ?? null }}</h3>
                <p>Dentists</p>
            </div>
            <div class="icon">
                <i class="fas fa-users-cog"></i>
            </div>
{{--            <a href="#" class="small-box-footer">More info</a>--}}
            <span class="small-box-footer">Lifetime</span>
        </div>
    </div>

</div>
