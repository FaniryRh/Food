<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Typepayement
 *
 * @package App
 * @property string $designation_typepayement
*/
class Typepayement extends Model
{
    use SoftDeletes;

    protected $fillable = ['designation_typepayement'];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        Typepayement::observe(new \App\Observers\UserActionsObserver);
    }
    
}
