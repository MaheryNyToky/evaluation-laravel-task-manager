<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Les colonnes qu'on a le droit de remplir via un formulaire
    protected $fillable = ['name', 'description', 'user_id'];

    // Un projet appartient à un utilisateur (Relation 1:N)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un projet contient plusieurs tâches (Relation 1:N)
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
