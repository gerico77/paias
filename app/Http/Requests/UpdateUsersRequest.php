<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
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
<<<<<<< HEAD

            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->route('user'),

=======
            
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->route('user'),
            
>>>>>>> 090e796d1cdc19c55cafe785be19a3f8ef20afc3
            'role_id' => 'required',
            'role_id' => 'required',
        ];
    }
}
