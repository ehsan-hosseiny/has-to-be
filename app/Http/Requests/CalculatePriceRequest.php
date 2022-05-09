<?php

namespace App\Http\Requests;

use App\Rules\TimeValidate;
use Dotenv\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CalculatePriceRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules['rate'] = ['required'];
        $rules['rate'] = ['required'];
        $rules['cdr'] = ['required'];
        $rules['cdr.meterStart'] = ['required'];
        $rules['cdr.meterStop'] = ['required','gt:cdr.meterStart'];

        $rules['cdr.timestampStart'] = ['required',
        new TimeValidate($this->request->all())
        ];
        $rules['cdr.timestampStop'] = ['required'];
        $rules['cdr.timestampStop'] = ['required'];
        return $rules;
    }

    public function messages()
    {
        return [
            'cdr.required' => 'CDR (charge detail record) Parameters are required',
            'cdr.meterStart.required' => 'A Meter Start is required',
            'cdr.meterStop.gt' => 'a meter stop should greater than meter start',
        ];
    }

}
