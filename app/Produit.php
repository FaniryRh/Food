<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Produit
 *
 * @package App
 * @property string $photo_produit
 * @property string $designation_produit
 * @property string $categorie
 * @property integer $prix_unit_produit
*/
class Produit extends Model
{
    use SoftDeletes;

    protected $fillable = ['photo_produit', 'designation_produit', 'prix_unit_produit', 'categorie_id'];
    public static $searchable = [
        'designation_produit',
    ];
    
    public static function boot()
    {
        parent::boot();

        Produit::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCategorieIdAttribute($input)
    {
        $this->attributes['categorie_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPrixUnitProduitAttribute($input)
    {
        $this->attributes['prix_unit_produit'] = $input ? $input : null;
    }
    
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id')->withTrashed();
    }
    
    public function option_id()
    {
        return $this->belongsToMany(Option::class, 'option_produit')->withTrashed();
    }
    
}
