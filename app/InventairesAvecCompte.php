<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InventairesAvecCompte
 *
 * @package App
 * @property string $cmd_compt
 * @property string $produit
 * @property integer $quantite
*/
class InventairesAvecCompte extends Model
{
    use SoftDeletes;

    protected $fillable = ['quantite', 'cmd_compt_id', 'produit_id'];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        InventairesAvecCompte::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCmdComptIdAttribute($input)
    {
        $this->attributes['cmd_compt_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProduitIdAttribute($input)
    {
        $this->attributes['produit_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setQuantiteAttribute($input)
    {
        $this->attributes['quantite'] = $input ? $input : null;
    }
    
    public function cmd_compt()
    {
        return $this->belongsTo(CommandesAvecCompte::class, 'cmd_compt_id')->withTrashed();
    }
    
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id')->withTrashed();
    }
    
    public function options()
    {
        return $this->belongsToMany(Option::class, 'inventaires_avec_compte_option')->withTrashed();
    }
    
}
