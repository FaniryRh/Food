<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Categorie
 *
 * @package App
 * @property string $designation
*/
class Categorie extends Model
{
    use SoftDeletes;

    protected $fillable = ['designation'];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        Categorie::observe(new \App\Observers\UserActionsObserver);
    }
    
}
