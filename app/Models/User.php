<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
    //Relación uno a muchos: un usuario puede crear muchos proyectos
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    //Relación muchos a muchos: un usuario puede colaborar en muchos proyectos
    public function collaborativeProjects()
    {
        return $this->belongsToMany(Project::class, 'project_user');
    }

    //Relación uno a muchos: un usuario puede tener muchas tareas asignadas
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}


