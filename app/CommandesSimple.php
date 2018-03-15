<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CommandesSimple
 *
 * @package App
 * @property string $nom_client
 * @property string $adresse_client
 * @property string $phone_client
 * @property string $adresse_de_livraison
 * @property integer $total_addition
 * @property string $date_encaisse
 * @property string $user
 * @property string $etat_cmd
 * @property string $etat_livraison
 * @property string $date_heur_souhaitee
 * @property string $date_heur_arrive_livr
 * @property string $map
*/
class CommandesSimple extends Model
{
    use SoftDeletes;

    protected $fillable = ['nom_client', 'adresse_client', 'phone_client', 'adresse_de_livraison', 'total_addition', 'date_encaisse', 'date_heur_souhaitee', 'date_heur_arrive_livr', 'map_address', 'map_latitude', 'map_longitude', 'user_id', 'etat_cmd_id', 'etat_livraison_id'];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        CommandesSimple::observe(new \App\Observers\UserActionsObserver);
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
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
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
    public function setEtatLivraisonIdAttribute($input)
    {
        $this->attributes['etat_livraison_id'] = $input ? $input : null;
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
    public function setDateHeurArriveLivrAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['date_heur_arrive_livr'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['date_heur_arrive_livr'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateHeurArriveLivrAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function etat_cmd()
    {
        return $this->belongsTo(EtatCommande::class, 'etat_cmd_id')->withTrashed();
    }
    
    public function etat_livraison()
    {
        return $this->belongsTo(EtatLivraison::class, 'etat_livraison_id')->withTrashed();
    }
    
    public function inventaires_simples() {
        return $this->hasMany(InventairesSimple::class, 'cmd_simpl_id');
    }
}
