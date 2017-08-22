<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
     
     protected $fillable = ['title', 'author', 'isbn'];
     
}
