<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Importamos el trait

class Client extends Model
{
    use HasFactory, SoftDeletes; // Activamos el borrado lógico (Requerimiento)

    protected $fillable = ['name', 'email', 'phone'];

    // Definimos la relación Muchos a Muchos
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}