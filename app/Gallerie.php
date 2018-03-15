<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Gallerie
 *
 * @package App
 * @property string $photo
 * @property string $titre
 * @property string $description
*/
class Gallerie extends Model
{
    use SoftDeletes;

    protected $fillable = ['photo', 'titre', 'description'];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        Gallerie::observe(new \App\Observers\UserActionsObserver);
    }
    
}
