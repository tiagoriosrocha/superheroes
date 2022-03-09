<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuperHero extends Model
{
    protected $fillable = ['id','nome','raca','editora','alinhamento'];
}
