<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentsRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'departmentName' => 'required',
            'departmentHead' => 'required',
            // 'departmentStartDate' => 'required',
            // 'departmentEndDate' => 'required',
            'departmentDetails' => 'required',
        ];
    }
}