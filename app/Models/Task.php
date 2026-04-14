<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'is_completed', 'project_id'];

    // Une tâche appartient à un projet (Relation 1:N)
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Une tâche possède plusieurs tags (Relation N:N)
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
