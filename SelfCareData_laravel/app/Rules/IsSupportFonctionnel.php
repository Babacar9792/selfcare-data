<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IsSupportFonctionnel implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::where("id", $value)->first();
        if($user && !$user->hasRole("Support fonctionnel")){
            $fail("L'utilisateur : ".$user->name." n'a pas le role de support fonctionnel dans le département ".$user->departement["name"]);
        }
    }
}
