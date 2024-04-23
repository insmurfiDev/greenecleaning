<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class CleaningType extends Model
{
    use CrudTrait;
    protected $fillable = ['type', 'additional_price_percent'];
}
