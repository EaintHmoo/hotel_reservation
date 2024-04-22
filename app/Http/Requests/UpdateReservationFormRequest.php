<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('form_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => [
                'string', 'required'
            ],
            'last_name' => [
                'string', 'required'
            ],
            'address' => [
                'string', 'required'
            ],
            'zip_code' => [
                'integer', 'required'
            ],
            'city' => [
                'string', 'required'
            ],
            'state' => [
                'string', 'required'
            ],
            'email' => [
                'email', 'required'
            ],
            'phone' => [
                'string', 'required'
            ],
            'check_in_date' => [
                'required', 'date_format:' . config('panel.date_format'),
            ],
            'check_out_date' => [
                'required', 'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
