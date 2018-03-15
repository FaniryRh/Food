<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Compte
 *
 * @package App
 * @property string $nom_compte
 * @property string $prenom_compte
 * @property string $mdp_compte
 * @property string $phone_compte
 * @property string $mail_compte
 * @property string $adresse_compte
 * @property string $ville_compte
 * @property string $quartier_compte
 * @property integer $solde_compte
*/
class Compte extends Model
{
    use SoftDeletes;

    protected $fillable = ['nom_compte', 'prenom_compte', 'mdp_compte', 'phone_compte', 'mail_compte', 'adresse_compte', 'ville_compte', 'quartier_compte', 'solde_compte'];
    public static $searchable = [
        'nom_compte',
        'prenom_compte',
        'mail_compte',
    ];
    
    public static function boot()
    {
        parent::boot();

        Compte::observe(new \App\Observers\UserActionsObserver);
    }/**
     * Hash password
     * @param $input
     */
    public function setMdpCompteAttribute($input)
    {
        if ($input)
            $this->attributes['mdp_compte'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setSoldeCompteAttribute($input)
    {
        $this->attributes['solde_compte'] = $input ? $input : null;
    }
    
}
