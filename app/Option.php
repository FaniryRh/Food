<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Option
 *
 * @package App
 * @property string $designation_option
*/
class Option extends Model
{
    use SoftDeletes;

    protected $fillable = ['designation_option'];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        Option::observe(new \App\Observers\UserActionsObserver);
    }
    
}
