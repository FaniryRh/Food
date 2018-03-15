<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EtatLivraison
 *
 * @package App
 * @property string $designation_etatlivraison
*/
class EtatLivraison extends Model
{
    use SoftDeletes;

    protected $fillable = ['designation_etatlivraison'];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        EtatLivraison::observe(new \App\Observers\UserActionsObserver);
    }
    
}
