<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lenguage extends Model
{
    use HasFactory;
    protected $table='lenguages';

    protected $fillable=[
        "name",
        "slug",
    ];
    public function projects(){
        return $this->belongsToMany(Project::class);
    }
}
