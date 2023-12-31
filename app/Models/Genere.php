<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genere extends Model
{
    use HasFactory;
    protected $table='generes';

    protected $fillable=[
        "name",
        "slug",
    ];
    public function projects(){
        return $this->hasMany(Project::class);
    }
}
