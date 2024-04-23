<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class TimeWindow extends Model
{
    use CrudTrait;
    protected $fillable = ['time_start', 'time_end'];

    public function GetWindowAttribute(){
        return $this->time_start." - ".$this->time_end;
    }

}
