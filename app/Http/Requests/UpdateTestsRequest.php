<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestsRequest extends FormRequest
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
            
            'name_en' => 'required|unique:tests,name_en,'.$this->route('test'),
            'name_da' => 'required|unique:tests,name_da,'.$this->route('test'),
            'group' => 'required',
        ];
    }
}
