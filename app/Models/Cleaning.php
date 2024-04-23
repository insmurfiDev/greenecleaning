<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cleaning extends Model
{
    use CrudTrait;
    protected $fillable = [
        'come_date', 
        'location_id', 
        'address', 
        'apt_number', 
        'name', 
        'email', 
        'phone', 
        'pay_now', 
        'card_number', 
        'card_cvv', 
        'card_exp', 
        'paypal_email', 
        'time_window_id', 
        'cleaning_type_id', 
        'flat_size_id', 
        'bathroom_size_id'];

    public function location() : BelongsTo{
        return $this->belongsTo(Location::class);
    }

    public function time_window() : BelongsTo{
        return $this->belongsTo(TimeWindow::class);
    }
    
    public function cleaning_type() : BelongsTo{
        return $this->belongsTo(CleaningType::class);
    }

    public function flat_size() : BelongsTo{
        return $this->belongsTo(FlatSize::class);
    }

    public function bathroom_size() : BelongsTo{
        return $this->belongsTo(BathroomSize::class);
    }

    public function extras() : BelongsToMany{
        return $this->belongsToMany(Extras::class, 'cleaning_extras');
    }

}
