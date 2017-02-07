<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResultsRequest extends FormRequest
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
            'user_id' => 'required',
            'test_id' => 'required',
            'earned_scores' => 'required',
            'correct_answers' => 'required',
            'incorrect_answers' => 'required',
        ];
    }
}
