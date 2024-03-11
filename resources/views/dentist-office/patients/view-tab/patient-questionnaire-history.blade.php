<div class="card-body">
    <div class="form-group">
        <table class="table table-bordered table-striped" style=" table-layout: fixed; width: 100%">
            <tbody>
                @if( empty($patient_data['history']) )
                    <h1 class="text-center">No history data found!</h1>
                @else
                    @foreach($patient_data['history'] as $key => $value)
                        <tr>
                            <th style="width:30%;">
                                {{ ucfirst(implode(" ", preg_split("/(?=(?<![A-Z]|^)[A-Z])/", $key))) }}
                            </th>
                            <td>
                                @switch($key)
                                    @case('allergensArr')
                                    @case('medicationArr')
                                    @case('familyHistory')
                                    @case('socialHistory')
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
                                    @case('dentalHistoryArr')
                                        <table class="table table-bordered table-striped" style="table-layout: fixed; width: 100%">
                                            <tbody>
                                                @foreach($value as $item)
                                                    <tr>
                                                        <td>{{ $item['key'] }}</td>
                                                        <td>{{ $item['value'] }}</td>
                                                        <td>{{ $item['state'] ? 'True' : 'False' }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @break
                                    @default
                                        @if(gettype($value) == 'boolean')
                                            {{ ($value) ? 'True' : 'False' }}
                                        @else
                                            {{ $value }}
                                        @endif
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

