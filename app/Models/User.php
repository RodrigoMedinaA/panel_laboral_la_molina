<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles, HasUuids;

    // Debe coincidir con el guard definido en config/auth.php
    protected string $guard_name  = 'api';
    // public    bool   $incrementing = false; // Esto puede ir comentado
    // protected string $keyType      = 'string';

    // Solo los campos que existen en la tabla local.
    // sso_id es obligatorio — permite al guard identificar al usuario entre requests.
    protected $fillable = [
        'sso_id',
        'type',
        'name',
        'email',
        'phone',
    ];

    // Sin 'password' => 'hashed': esta app no maneja credenciales propias
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }
}
