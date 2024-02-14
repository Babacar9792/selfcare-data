<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['libelle'];
    protected $hidden = [
        "deleted_at",
        "created_at",
        "updated_at"
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
