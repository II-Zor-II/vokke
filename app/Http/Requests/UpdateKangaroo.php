<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKangaroo extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'birth_date' => 'date|date_format:Y-m-d',
            'name' => 'max:255',
            'nickname' => 'max:255',
            'color' =>'max:10',
            'gender' =>'in:male,female',
            'friendliness' => 'in:friendly,not friendly',
            'weight' =>'numeric|gt:0',
            'height' =>'numeric|gt:0',
        ];
    }
}
