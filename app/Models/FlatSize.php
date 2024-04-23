<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class FlatSize extends Model
{
    use CrudTrait;
    protected $fillable = ['size', 'price'];
}
