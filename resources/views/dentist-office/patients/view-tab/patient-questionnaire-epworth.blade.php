<div class="card-body">
    <div class="form-group">
        <table class="table table-bordered table-striped" style=" table-layout: fixed; width: 100%">
            <tbody>
                @if( empty($patient_data['epworth']) )
                    <h1 class="text-center">No epworth data found!</h1>
                @else
                @foreach($patient_data['epworth'] as $key => $value)
                    <tr>
                        <th style="width:30%;">
                            {{ ucfirst(implode(" ", preg_split("/(?=(?<![A-Z]|^)[A-Z])/", $key))) }}
                        </th>
                        <td>
                            @switch($key)
                                @case('worth1')
                                @case('worth2')
                                    <table class="table table-bordered table-striped" style="table-layout: fixed; width: 100%">
                                        <tbody>
                                        @foreach($value as $key_item => $item)
                                            <tr>
                                                <td>{{ $key_item }}</td>
                                                <td>{{ $item  }}</td>
                                            </tr>
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

