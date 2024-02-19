<?php

namespace App\Http\Requests\Version;

use Illuminate\Foundation\Http\FormRequest;

class VersionRequest extends FormRequest
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
            case 'DELETE':
            {
                return [];
            }
            case 'PUT':
            {
                return [
                    'version_number' => 'required|unique:app_versions,version_number,'.$this->route('version')->id.',id',
                    'status' => 'required|in:Active,Inactive',
                ];
            }
            case 'POST':
            {
                return [
                    'version_number' => 'required|unique:app_versions',
                    'status' => 'required|in:Active,Inactive',
                ];
            }

            default:break;
        }
    }
}
