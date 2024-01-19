<div class="row">

    <div class="col-lg-6 col-6">

        <h3 style="text-align: center; font-weight: bold;"> Dental Appointment Calendar</h3>
        <hr>

{{--        @include('dentist-office.play-ground.calender-area', ['variable' => 'daily'])--}}


        <ul id="tabs" class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a id="tab-A" href="#pane-weekly" class="nav-link active " data-toggle="tab"
                   role="tab"> Weekly </a>
            </li>

            <li class="nav-item">
                <a id="tab-B" href="#pane-daily" class="nav-link " data-toggle="tab"
                   role="tab"> Daily </a>
            </li>

        </ul>
        <div id="content" class="tab-content" role="tablist">

            <div id="pane-weekly" class="card tab-pane fade show active" role="tabpanel"
                 aria-labelledby="tab-A">
                <div class="xxxcard-header" role="tab" id="heading-A">
                    @include('dentist-office.play-ground.calender-area', ['variable' => 'weekly'])
                </div>
            </div>

            <div id="pane-daily" class="card tab-pane fade " role="tabpanel"
                 aria-labelledby="tab-B">
                <div class="xxxcard-header" role="tab" id="heading-B">
                    @include('dentist-office.play-ground.calender-area', ['variable' => 'daily'])
                </div>
            </div>

        </div>


    </div>

</div>
