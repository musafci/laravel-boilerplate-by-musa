<div class="card-body">
    <div class="form-group">
        <table class="table table-bordered table-striped">
            <tbody>

            @if( empty($patient_data['insurances']) )
                <h1 class="text-center">No insurance data found or registered!</h1>
            @else

                <tr>

                    <th>Insurance Type</th>
                    <th>Insurance Company Name</th>
                    <th>Phone Number</th>
                    <th>Claiming Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip Code</th>
                    <th>Member Id</th>
                    <th>Group Or Policy</th>
                    <th>Insurer Relationship</th>
                </tr>

                @foreach($patient_data['insurances'] as $insurance)
                    <tr>
                        <td>{{ $insurance['insurance_type'] ?? null }}</td>
                        <td>{{ $insurance['insurance_company_name'] ?? null }}</td>
                        <td>{{ $insurance['phone_number'] ?? null }}</td>
                        <td>{{ $insurance['claim_mailing_address_1'] ?? null  . " " . $insurance['claim_mailing_address_2'] ?? null }}</td>
                        <td>{{ $insurance['claim_mailing_city'] ?? null }}</td>
                        <td>{{ $insurance['claim_mailing_state'] ?? null }}</td>
                        <td>{{ $insurance['claim_mailing_zipcode'] ?? null }}</td>
                        <td>{{ $insurance['member_id'] ?? null }}</td>
                        <td>{{ $insurance['group_or_policy'] ?? null }}</td>
                        <td>{{ $insurance['insurer_relationship'] ?? null }}</td>
                    </tr>
                @endforeach
            @endif


            </tbody>
        </table>
{{--                <div class="form-group">--}}
{{--                    <a class="btn btn-default" href="{{route('user.index')}}">--}}
{{--                        Back--}}
{{--                    </a>--}}
{{--                </div>--}}
    </div>
</div>

