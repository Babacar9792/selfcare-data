<?php

namespace App\Http\Requests;

use Illuminate\Validation\ValidationException;
use App\Models\Departement;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreutilisateurRequest extends FormRequest
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
    return [
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'email' => ['required', 'email', Rule::unique('users')->whereNull('deleted_at')],
        'login_windows' => [
            'required',
            Rule::unique('users')->whereNull('deleted_at')->where(function ($query) {
                $query->where('login_windows', $this->login_windows)->orWhere('email', $this->login_windows);
            }),
            'regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/'
        ],
        'departement' => [
            'required',
            function ($attribute, $value, $fail) {
                if (!Departement::where('id', $value)->exists()) {
                    $fail('Le département sélectionné n\'existe pas.');
                }
            },
        ],
        'password' => 'required|string|min:8',
    ];
}



    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $email = explode('@', $this->email)[1] ?? null;
            if ($email !== 'orange-sonatel.com') {
                $validator->errors()->add('email', 'Le champ email doit appartenir au domaine @orange-sonatel.com');
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
            'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
            'login_windows.required' => 'Le champ login Windows est requis.',
            'login_windows.unique' => 'Ce login Windows est déjà utilisé.',
            'login_windows.regex' => 'Le champ login Windows doit contenir à la fois des lettres et des chiffres.',
            'password.required' => 'Le champ mot de passe est requis.',
            'password.string' => 'Le champ mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
        ];
    }
}
