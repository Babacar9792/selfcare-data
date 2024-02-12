<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
// use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'login_window',
        'tentative',
        'blocked'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'tentative'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function incrementTentatives()
    {
        $this->tentative++;
        $this->save();
        if ($this->tentative >= 5) {
            echo $this->blocked;
            $this->update(['blocked' => true]);
            $this->save();
             // Vous pouvez implémenter une méthode pour bloquer l'utilisateur
        }
    }

    public function resetTentatives()
    {
        $this->tentative = 0;
        $this->update(['blocked' => false]);
        $this->save();
    }

    public function blockUser($isBlocked)
    {
        $this->update(['blocked' => $isBlocked]);
    }

    public function departement(): BelongsTo{
        return $this->belongsTo(Departement::class);
    }
}
