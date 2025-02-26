<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function phones(): HasMany
    {
        //1 - 1
       // return $this->hasOne(Phone::class );
       //Si no se respeta la nomenclatura de nombres, Laravel no sabe a qué clave se refiere habría que ponerlo de la siguiente manera
        //return $this->hasOne(Phone::class, 'user_id', 'id' ); 

        //1 - n
        return $this->hasMany(Phone::class );
        //Si no se respeta la nomenclatura de nombres, Laravel no sabe a qué clave se refiere*/
        //return $this->hasMany(Phone::class /*, 'user_id', 'id' );
    }//return $this->hasOne(Phone::class, 'user_id', 'id' ); 
}
