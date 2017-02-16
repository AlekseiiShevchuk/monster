<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLocalizationsRequest extends FormRequest
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
            
            'abbreviation' => 'required|unique:localizations,abbreviation,'.$this->route('localization'),
            'name' => 'required|unique:localizations,name,'.$this->route('localization'),
            'is_active' => 'required',
            
        ];
    }
}
