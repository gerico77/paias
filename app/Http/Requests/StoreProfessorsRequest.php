<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfessorsRequest extends FormRequest
{
    /**
     * Determine if the professor is authorized to make this request.
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:professors,email',
            'joining_date' => 'required',
            'designation' => 'required',
            'department' => 'required',
            'gender' => 'required',
            'role_id' => 'required',
        ];
    }
}