<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use CrudTrait;
    protected $fillable = ['name', 'additional_price_percent'];
}
