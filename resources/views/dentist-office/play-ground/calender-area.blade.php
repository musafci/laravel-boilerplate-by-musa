
<div style="width: 100%; overflow-x: auto; padding-top: 1rem">
    <div style="width: 100%; display: flex; flex-direction: column; gap: 0.5rem" >
        @foreach($range_array[$variable] as $key => $data)
            <div style="display: flex; flex-direction: row;">
                <div
                    style="min-width: 70px;padding: 10px; display: flex; flex-direction: column; justify-content: right; align-items: center; font-weight: bold; font-size: 10px;"
                >
                    <span style="text-align: center;">{{  $data['day_name'] }}</span>
                </div>
                <div style="display: flex; flex-direction: row; gap: 0.3rem; width: 100%">

                    @foreach($range_data_array[$variable][$data['date']] as $key_today => $today_value)
                        <div
                            style="min-width: 52px; min-height: 30px; display: flex; justify-content: center; align-items: center;
                                    @if($today_value['count'] > 0)
                                        background-color: #fdd7b5;
                                    @else
                                        background-color: lightgray;
                                    @endif
                                    border-radius: 10px;
                                    "
                        >
                            @if($today_value['count'] > 0)
                                {{ $today_value['count'] }}
                            @endif

                        </div>
                    @endforeach

                </div>
            </div>
        @endforeach

    </div>

    <div  style="display: flex; flex-direction: row; margin-top: 1rem">
        <div  style="min-width: 66px"></div>
        <div style="display: flex; flex-direction: row; gap: 0.5rem">
            @php
                $start_date = date('Y-m-d', strtotime(NOW()));
            @endphp
            @foreach($range_data_array[$variable][$data['date']] as $key_today => $today_value)
                <div
                    style="min-width: 50px; min-height: 0px; display: flex; justify-content: center; align-items: center; font-size: 12px; font-weight: bold; "
                >{{$today_value['start_time']}}</div>
            @endforeach

        </div>
    </div>
</div>
