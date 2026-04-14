<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Un tag appartient à plusieurs tâches (Relation N:N)
    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}
