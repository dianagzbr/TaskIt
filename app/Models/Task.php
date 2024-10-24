<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    //Relación uno a muchos: una tarea pertenece a un proyecto
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    //Relación uno a muchos: una tarea pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
