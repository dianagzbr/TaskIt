<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    //Relación uno a muchos: un proyecto pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relación uno a muchos: un proyecto puede tener muchas tareas
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    //Relación muchos a muchos: un proyecto puede tener muchos usuarios colaboradores
    public function collaborators()
    {
        return $this->belongsToMany(User::class, 'project_user');
    }
}
