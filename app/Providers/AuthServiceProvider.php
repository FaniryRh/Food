<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: Commandes simples
        Gate::define('commandes_simple_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('commandes_simple_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('commandes_simple_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('commandes_simple_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('commandes_simple_delete', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Produit
        Gate::define('produit_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('produit_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('produit_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('produit_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('produit_delete', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

        // Auth gates for: Typepayement
        Gate::define('typepayement_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('typepayement_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('typepayement_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('typepayement_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('typepayement_delete', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

        // Auth gates for: Statiques
        Gate::define('statique_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

        // Auth gates for: Options
        Gate::define('option_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('option_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('option_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('option_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('option_delete', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

        // Auth gates for: Inventaires simple
        Gate::define('inventaires_simple_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('inventaires_simple_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('inventaires_simple_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('inventaires_simple_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('inventaires_simple_delete', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Etat livraison
        Gate::define('etat_livraison_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('etat_livraison_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('etat_livraison_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('etat_livraison_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('etat_livraison_delete', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

        // Auth gates for: Etat commande
        Gate::define('etat_commande_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('etat_commande_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('etat_commande_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('etat_commande_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('etat_commande_delete', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

        // Auth gates for: Commandes avec compte
        Gate::define('commandes_avec_compte_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('commandes_avec_compte_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('commandes_avec_compte_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('commandes_avec_compte_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('commandes_avec_compte_delete', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

        // Auth gates for: Compte
        Gate::define('compte_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('compte_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('compte_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('compte_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('compte_delete', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

        // Auth gates for: Inventaires avec compte
        Gate::define('inventaires_avec_compte_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('inventaires_avec_compte_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('inventaires_avec_compte_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('inventaires_avec_compte_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('inventaires_avec_compte_delete', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

        // Auth gates for: Commandes
        Gate::define('commande_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

        // Auth gates for: Menu
        Gate::define('menu_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

        // Auth gates for: User actions
        Gate::define('user_action_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Gallerie
        Gate::define('gallerie_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('gallerie_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('gallerie_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('gallerie_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('gallerie_delete', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

        // Auth gates for: Actualite
        Gate::define('actualite_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('actualite_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('actualite_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('actualite_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('actualite_delete', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

        // Auth gates for: Categorie
        Gate::define('categorie_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('categorie_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('categorie_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('categorie_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('categorie_delete', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

    }
}
