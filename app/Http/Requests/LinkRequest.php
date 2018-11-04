<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
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
            'linkAddress' => 'required|min:3|max:512',
            'description' => 'required|min:1|max:512',
            'category_id' => 'required',
            'tags'        => 'required',
        ];
    }
}
