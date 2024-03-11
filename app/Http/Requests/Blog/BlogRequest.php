<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'category_id' => 'required',
                    'title' => 'required',
                    'body' => 'required',
                    'image' => 'required',
                ];
            }
            case 'DELETE':
            case 'PUT':
            {
                return [];
            }
            case 'GET':
            {
                return [];
            }

            default:break;
        }
    }
}
