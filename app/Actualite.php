<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Actualite
 *
 * @package App
 * @property string $titre
 * @property string $photo
 * @property text $description
*/
class Actualite extends Model
{
    use SoftDeletes;

    protected $fillable = ['titre', 'photo', 'description'];
    public static $searchable = [
        'description',
    ];
    
    public static function boot()
    {
        parent::boot();

        Actualite::observe(new \App\Observers\UserActionsObserver);
    }
    
}
