<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class BlockedUser implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::where('id', $value)->first();
        if($user && $user->blocked == false){
            $fail("L'utilisateur que vous essayez de débloquer n'est pas bloqué");
        }
    }
}
