<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CommandesAvecCompte
 *
 * @package App
 * @property string $compte
 * @property string $user
 * @property string $adresse_de_livraison
 * @property string $date_heur_souhaitee
 * @property string $date_depot_cmd
 * @property string $date_livre_cmd
 * @property integer $total_addition
 * @property string $etat_cmd
 * @property string $typepayement
 * @property string $date_encaisse
 * @property string $etat_livraison
 * @property string $map
*/
class CommandesAvecCompte extends Model
{
    use SoftDeletes;

    protected $fillable = ['adresse_de_livraison', 'date_heur_souhaitee', 'date_depot_cmd', 'date_livre_cmd', 'total_addition', 'date_encaisse', 'map_address', 'map_latitude', 'map_longitude', 'compte_id', 'user_id', 'etat_cmd_id', 'typepayement_id', 'etat_livraison_id'];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        CommandesAvecCompte::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCompteIdAttribute($input)
    {
        $this->attributes['compte_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateHeurSouhaiteeAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['date_heur_souhaitee'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['date_heur_souhaitee'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateHeurSouhaiteeAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateDepotCmdAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['date_depot_cmd'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['date_depot_cmd'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateDepotCmdAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateLivreCmdAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['date_livre_cmd'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['date_livre_cmd'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateLivreCmdAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setTotalAdditionAttribute($input)
    {
        $this->attributes['total_addition'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setEtatCmdIdAttribute($input)
    {
        $this->attributes['etat_cmd_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTypepayementIdAttribute($input)
    {
        $this->attributes['typepayement_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateEncaisseAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['date_encaisse'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['date_encaisse'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateEncaisseAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setEtatLivraisonIdAttribute($input)
    {
        $this->attributes['etat_livraison_id'] = $input ? $input : null;
    }
    
    public function compte()
    {
        return $this->belongsTo(Compte::class, 'compte_id')->withTrashed();
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function etat_cmd()
    {
        return $this->belongsTo(EtatCommande::class, 'etat_cmd_id')->withTrashed();
    }
    
    public function typepayement()
    {
        return $this->belongsTo(Typepayement::class, 'typepayement_id')->withTrashed();
    }
    
    public function etat_livraison()
    {
        return $this->belongsTo(EtatLivraison::class, 'etat_livraison_id')->withTrashed();
    }
    
    public function inventaires_avec_comptes() {
        return $this->hasMany(InventairesAvecCompte::class, 'cmd_compt_id');
    }
}
