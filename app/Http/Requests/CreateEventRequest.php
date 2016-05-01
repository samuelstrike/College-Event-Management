<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateEventRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|min:5|max:15',
            'title' => 'required|min:5|max:100',
            'time'  => 'required|available|duration'
            //
        ];
    }
}
