<?php

namespace App\Http\Requests\HotelsIntegrations;

use App\Rules\IATACodeValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'from_date'      => 'sometimes|date_format:Y-m-d|after:yesterday',
            'to_date'        => 'sometimes|date_format:Y-m-d|after:from_date',
            'city'           => [
                'sometimes',
                new IATACodeValidationRule # THIS IS CUSTOM RULE TO VALIDATE IATA FORMAT.
            ] ,
            'adults_number'  => 'sometimes|integer',
        ];
    }
}
