<?php

namespace App\Http\Requests\Role;

use App\Rules\IsSupportFonctionnel;
use App\Rules\UserInDepartement;
use App\Traits\ResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class InterimRequest extends FormRequest
{
    use ResponseTrait;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->hasRole("Admin");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            "departement_id" => ['required', 'exists:departements,id'],
            "current" => ["required", "exists:users,id", new UserInDepartement, new IsSupportFonctionnel],
            "new_user" => ["required", "exists:users,id", new UserInDepartement]

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->all();
        $message = implode(', ', $errors);
        throw new HttpResponseException(
            $this->responseData($message, false, Response::HTTP_BAD_REQUEST, [])
        );
    }
}
