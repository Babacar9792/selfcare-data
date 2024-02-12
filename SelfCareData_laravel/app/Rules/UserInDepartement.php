<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UserInDepartement implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $departement_id = request()->input("departement_id");
        $user = User::where("id", $value)->first();
        if($user && $user->departement_id != $departement_id){
            $fail("L'utilisateur : ".$user->name." n'est pas present dans le departement selectionne");
        }
    }
}
