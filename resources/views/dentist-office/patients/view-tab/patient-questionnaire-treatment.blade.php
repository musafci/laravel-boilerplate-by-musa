<div class="card-body">
    <div class="form-group">
        <table class="table table-bordered table-striped" style=" table-layout: fixed; width: 100%">
            <tbody>
                @if( empty($patient_data['treatment']) )
                    <h1 class="text-center">No treatment data found!</h1>
                @else
                    @foreach($patient_data['treatment'] as $key => $value)
                        <tr>
                            <th style="width:30%;">
                                {{ ucfirst(implode(" ", preg_split("/(?=(?<![A-Z]|^)[A-Z])/", $key))) }}
                            </th>
                            <td>
                                @switch($key)
                                    @case('complaints')
                                    @case('deviceCheckList')
                                        <table class="table table-bordered table-striped" style="table-layout: fixed; width: 100%">
                                            <tbody>
                                            @foreach($value as $item)
                                                <tr>
                                                    <td>{{ $item['key'] }}</td>
                                                    <td>{{ $item['value'] ? 'True' : 'False' }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @break
                                    @case('surgeryData')
                                        <table class="table table-bordered table-striped" style="table-layout: fixed; width: 100%">
                                            <tbody>
                                            @foreach($value as $item)
                                                @foreach($item as $single_key => $single_item)
                                                    <tr>
                                                        <td>{{ ucfirst(implode(" ", preg_split("/(?=(?<![A-Z]|^)[A-Z])/", $single_key))) }}</td>
                                                        <td>{{ $single_item  }}</td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @break
                                    @default
                                        {{ $value }}
                                        @break
                                @endswitch
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

    </div>
</div>

