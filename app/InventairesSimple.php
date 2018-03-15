<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InventairesSimple
 *
 * @package App
 * @property string $cmd_simpl
 * @property string $produit
 * @property integer $quantite
*/
class InventairesSimple extends Model
{
    use SoftDeletes;

    protected $fillable = ['quantite', 'cmd_simpl_id', 'produit_id'];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        InventairesSimple::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCmdSimplIdAttribute($input)
    {
        $this->attributes['cmd_simpl_id'] = $input ? $input : null;
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
    
    public function cmd_simpl()
    {
        return $this->belongsTo(CommandesSimple::class, 'cmd_simpl_id')->withTrashed();
    }
    
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id')->withTrashed();
    }
    
    public function options()
    {
        return $this->belongsToMany(Option::class, 'inventaires_simple_option')->withTrashed();
    }
    
}
