<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExamsRequest extends FormRequest
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
            'title' => 'required', 
            'category_id' => 'required', 
            'subject_id' => 'required', 
            'user_id' => 'required', 
            'time_limit' => 'required', 
            'start_date' => 'required', 
            'start_time'  => 'required'
        ];
    }
}
