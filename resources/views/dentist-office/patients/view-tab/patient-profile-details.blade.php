<div class="card-body">
    <div class="form-group">
        <table class="table table-bordered table-striped">
            <tbody>

                <tr>
                    <th>
                        Name
                    </th>
                    <td>
                        {{ $patient_data['patient_details']['first_name'] . " " . $patient_data['patient_details']['middle_name'] . " " . $patient_data['patient_details']['last_name'] ?? null }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Gender
                    </th>
                    <td>
                        {{ $patient_data['patient_details']['gender'] ?? null }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Marital Status
                    </th>
                    <td>
                        {{ $patient_data['patient_details']['marital_status'] ?? null }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Date of Birth
                    </th>
                    <td>
                        {{ $patient_data['patient_details']['dob'] ?? null }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Height
                    </th>
                    <td>
                        {{ $patient_data['patient_details']['height'] ?? null }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Weight
                    </th>
                    <td>
                        {{ $patient_data['patient_details']['weight'] ?? null }}
                    </td>
                </tr>
                <tr>
                    <th>
                        BMI
                    </th>
                    <td>
                        {{ $patient_data['patient_details']['bmi'] ?? null }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Address
                    </th>
                    <td>
                        {{ $patient_data['patient_details']['address_one'] . " " . $patient_data['patient_details']['address_two'] ?? null }}
                    </td>
                </tr>
                <tr>
                    <th>
                        City
                    </th>
                    <td>
                        {{ $patient_data['patient_details']['city'] ?? null }}
                    </td>
                </tr>
                <tr>
                    <th>
                        State
                    </th>
                    <td>
                        {{ $patient_data['patient_details']['state'] ?? null }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Zipcode
                    </th>
                    <td>
                        {{ $patient_data['patient_details']['zipCode'] ?? null }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Phone Number
                    </th>
                    <td>
                        {{ $patient_data['patient_details']['phone_numbers'] ?? null }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Status
                    </th>
                    <td>
                        {{ $patient_data['patient_details']['status'] ?? null }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Created At
                    </th>
                    <td>
                        {{ isset($patient_data['patient_details']['created_at']) ? date('j F, Y H:i:s A', strtotime($patient_data['patient_details']['created_at'])) : null }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Last Updated
                    </th>
                    <td>
                        {{ isset($patient_data['patient_details']['updated_at']) ? date('j F, Y H:i:s A', strtotime($patient_data['patient_details']['updated_at'])) : null }}
                    </td>
                </tr>

            </tbody>
        </table>
{{--        <div class="form-group">--}}
{{--            <a class="btn btn-default" href="{{route('user.index')}}">--}}
{{--                Back--}}
{{--            </a>--}}
{{--        </div>--}}
    </div>
</div>

