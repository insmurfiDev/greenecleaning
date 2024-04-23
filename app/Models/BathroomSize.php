<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class BathroomSize extends Model
{
    use CrudTrait;
    protected $fillable = ['size', 'additional_price'];
}
