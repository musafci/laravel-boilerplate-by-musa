<?php

namespace App\Http\Requests\AppSetting;

use Illuminate\Foundation\Http\FormRequest;

class AppSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        switch($this->method())
        {
            case 'GET':
            {
                return [];
            }
            case 'POST':
            case 'PUT':
            {
                return [
                    'app_name' => 'required',
                ];
            }
            case 'DELETE':
            {
                return [
                    'id' => 'required',
                ];
            }

            default:break;
        }
    }
}
