<?php

namespace App\Http\Requests\Services;

use App\Http\Requests\Request;

class ServiceRequest extends Request
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
            'name' => 'required|min:3',
            'activityTime' => 'required|min:1',
            'value' => 'required|min:1',
        ];
    }
}
