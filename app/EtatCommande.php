<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EtatCommande
 *
 * @package App
 * @property string $designation_etatcom
*/
class EtatCommande extends Model
{
    use SoftDeletes;

    protected $fillable = ['designation_etatcom'];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        EtatCommande::observe(new \App\Observers\UserActionsObserver);
    }
    
}
