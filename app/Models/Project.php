<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table='projects';

    protected $fillable=[
        "genere_id",
        "title",
        "description",
        "type",
        "img",
    ];
    public function genere(){
        return $this->belongsTo(Genere::class);
    }
}
