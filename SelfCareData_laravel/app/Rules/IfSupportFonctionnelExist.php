<?php

namespace App\Rules;

use App\Http\Resources\User\UserResource;
use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Spatie\Permission\Models\Role;

class IfSupportFonctionnelExist implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::find($value);
        $allUserInDepartement = User::where("departement_id", $user->departement_id)->whereHas('roles', function ($query) {
            $query->where('name', 'Support fonctionnel'); 
        })
        ->get();
        $role = Role::where("id", request()->input("role_id"))->first();
        if(count($allUserInDepartement) != 0 && $role->name == "Support fonctionnel" ){
            $fail("Un support fonctionnel est déjà inscrit pour ce departement");
        }

    }
}
