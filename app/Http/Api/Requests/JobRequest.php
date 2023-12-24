<?php

namespace App\Http\Api\Requests;

use App\Models\ReizJob;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Exceptions\HttpResponseException;

class JobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the after hooks that should be applied to the validator.
     * trying to validate if url and selectors is already exists in db
     *
     * @return array<callable(Validator):void>
     */
    public function after(): array
    {
        return [
            function (Validator $validator) {
                return true;
                $alreadyExists = ReizJob::query()
                    ->where('url', stripslashes($this->get('url')))
                    ->where('selectors', $this->get('selectors'))
                    ->exists();

                if ($alreadyExists) {
                    $validator->errors()->add('url', 'this url and selector already exists!');
                }
            }
        ];
    }


    public function failedValidation(Validator $validator)
    {
        // if validation fails, return json with errors
        throw new HttpResponseException(
            response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY)
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return match ($this->getMethod()) {
            // 'GET' => [
            //     'url' => 'required',
            //     'selectors' => 'required|array'
            // ],
            'POST' => [
                'url' => 'required|url',
                'selectors' => 'required'
            ]
        };
    }
}
