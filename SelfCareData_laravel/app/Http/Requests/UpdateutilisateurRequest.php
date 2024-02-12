<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateutilisateurRequest extends FormRequest
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
        $userId = $this->route('user')->id;

        return [
            'nom' => 'string',
            'prenom' => 'string',
            'email' => ['email', Rule::unique('users')->ignore($userId)],
            'login_windows' => [ Rule::unique('users')->ignore($userId)],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->filled('email')) {
                $loginWindowsDomain = explode('@', $this->login_windows)[1] ?? null;
                if ($loginWindowsDomain !== 'orange-sonatel.com') {
                    $validator->errors()->add('email', 'Le champ email doit appartenir au domaine @orange-sonatel.com');
                }
            }
        });
    }


    public function messages()
    {
        return [
            'name.required' => 'Le champ nom est requis.',
            'name.string' => 'Le champ nom doit être une chaîne de caractères.',
            'email.required' => 'Le champ email est requis.',
            'email.email' => 'L\'adresse e-mail doit être valide.',
            'email.unique' => 'Cet e-mail est déjà utilisé par un autre utilisateur.',
            'login_windows.required' => 'Le champ login Windows est requis.',
            'login_windows.email' => 'Le login windows doit être valide.',
            'login_windows.unique' => 'Le login windows est déjà utilisé par un autre utilisateur.',

        ];
    }
}
