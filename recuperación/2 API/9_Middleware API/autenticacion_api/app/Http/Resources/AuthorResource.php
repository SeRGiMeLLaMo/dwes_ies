<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /*
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'username' => 'El nombre de usuario es: ' . $this->username,
            'email' => 'El email es: ' . $this->email,
            'password' => 'La contraseña es: ' . $this->password
        ];
    }
}
