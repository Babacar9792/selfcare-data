<?php

namespace App\Http\Requests\Role;

use App\Rules\IfSupportFonctionnelExist;
use App\Trait\ResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class AssiRoleRequest extends FormRequest
{
    use ResponseTrait;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "user_id" => ['required','exists:users,id', new IfSupportFonctionnelExist],
            "role_id" => "required|exists:roles,id",
        ];
    }

    public function messages()
    {
        return [
            "role_id.required" => "Veuiller choisir un role à assigner à l'utilisateur",
            "role_id.exists" => "Role inconnu",
            "user_id.required" => "Aucun utilisateur selectionner pour l'assignation",
            "user_id.exists" => "Role inconnu",
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
