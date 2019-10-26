<?php

namespace App\Http\Requests\HotelsIntegrations;

use App\Rules\IATACodeValidationRule;
use App\Traits\JsonRespondTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class SearchRequest extends FormRequest
{
    use JsonRespondTrait;

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

    /**
     * OVERRIDE FAILED VALIDATION METHOD TO MAKE ALL JSON RESPONSE AS SAME SIGNATURE.
     * THROW HttpResponseException WITH STATUS CODE 422 VALIDATION ERROR.
     *
     * @param Validator $validator
     *
     * @return JsonResponse|void
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            $this->_ReturnJsonResponse('Validation Error', $validator->errors()->all(), [], Response::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
