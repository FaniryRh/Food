<?php
Route::get('/', function () { return redirect('/admin/home'); });
Route::get('/index', function () { return redirect('/index'); });
Route::get('/index', 'IndexController@index_site');

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

// Registration Routes..
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');

// Social Login Routes..
Route::get('login/{driver}', 'Auth\LoginController@redirectToSocial')->name('auth.login.social');
Route::get('{driver}/callback', 'Auth\LoginController@handleSocialCallback')->name('auth.login.social_callback');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/calendar', 'Admin\SystemCalendarController@index'); 
  
    Route::resource('commandes_simples', 'Admin\CommandesSimplesController');
    Route::post('commandes_simples_mass_destroy', ['uses' => 'Admin\CommandesSimplesController@massDestroy', 'as' => 'commandes_simples.mass_destroy']);
    Route::post('commandes_simples_restore/{id}', ['uses' => 'Admin\CommandesSimplesController@restore', 'as' => 'commandes_simples.restore']);
    Route::delete('commandes_simples_perma_del/{id}', ['uses' => 'Admin\CommandesSimplesController@perma_del', 'as' => 'commandes_simples.perma_del']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('produits', 'Admin\ProduitsController');
    Route::post('produits_mass_destroy', ['uses' => 'Admin\ProduitsController@massDestroy', 'as' => 'produits.mass_destroy']);
    Route::post('produits_restore/{id}', ['uses' => 'Admin\ProduitsController@restore', 'as' => 'produits.restore']);
    Route::delete('produits_perma_del/{id}', ['uses' => 'Admin\ProduitsController@perma_del', 'as' => 'produits.perma_del']);
    Route::resource('typepayements', 'Admin\TypepayementsController');
    Route::post('typepayements_mass_destroy', ['uses' => 'Admin\TypepayementsController@massDestroy', 'as' => 'typepayements.mass_destroy']);
    Route::post('typepayements_restore/{id}', ['uses' => 'Admin\TypepayementsController@restore', 'as' => 'typepayements.restore']);
    Route::delete('typepayements_perma_del/{id}', ['uses' => 'Admin\TypepayementsController@perma_del', 'as' => 'typepayements.perma_del']);
    Route::resource('options', 'Admin\OptionsController');
    Route::post('options_mass_destroy', ['uses' => 'Admin\OptionsController@massDestroy', 'as' => 'options.mass_destroy']);
    Route::post('options_restore/{id}', ['uses' => 'Admin\OptionsController@restore', 'as' => 'options.restore']);
    Route::delete('options_perma_del/{id}', ['uses' => 'Admin\OptionsController@perma_del', 'as' => 'options.perma_del']);
    Route::resource('inventaires_simples', 'Admin\InventairesSimplesController');
    Route::post('inventaires_simples_mass_destroy', ['uses' => 'Admin\InventairesSimplesController@massDestroy', 'as' => 'inventaires_simples.mass_destroy']);
    Route::post('inventaires_simples_restore/{id}', ['uses' => 'Admin\InventairesSimplesController@restore', 'as' => 'inventaires_simples.restore']);
    Route::delete('inventaires_simples_perma_del/{id}', ['uses' => 'Admin\InventairesSimplesController@perma_del', 'as' => 'inventaires_simples.perma_del']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('etat_livraisons', 'Admin\EtatLivraisonsController');
    Route::post('etat_livraisons_mass_destroy', ['uses' => 'Admin\EtatLivraisonsController@massDestroy', 'as' => 'etat_livraisons.mass_destroy']);
    Route::post('etat_livraisons_restore/{id}', ['uses' => 'Admin\EtatLivraisonsController@restore', 'as' => 'etat_livraisons.restore']);
    Route::delete('etat_livraisons_perma_del/{id}', ['uses' => 'Admin\EtatLivraisonsController@perma_del', 'as' => 'etat_livraisons.perma_del']);
    Route::resource('etat_commandes', 'Admin\EtatCommandesController');
    Route::post('etat_commandes_mass_destroy', ['uses' => 'Admin\EtatCommandesController@massDestroy', 'as' => 'etat_commandes.mass_destroy']);
    Route::post('etat_commandes_restore/{id}', ['uses' => 'Admin\EtatCommandesController@restore', 'as' => 'etat_commandes.restore']);
    Route::delete('etat_commandes_perma_del/{id}', ['uses' => 'Admin\EtatCommandesController@perma_del', 'as' => 'etat_commandes.perma_del']);
    Route::resource('commandes_avec_comptes', 'Admin\CommandesAvecComptesController');
    Route::post('commandes_avec_comptes_mass_destroy', ['uses' => 'Admin\CommandesAvecComptesController@massDestroy', 'as' => 'commandes_avec_comptes.mass_destroy']);
    Route::post('commandes_avec_comptes_restore/{id}', ['uses' => 'Admin\CommandesAvecComptesController@restore', 'as' => 'commandes_avec_comptes.restore']);
    Route::delete('commandes_avec_comptes_perma_del/{id}', ['uses' => 'Admin\CommandesAvecComptesController@perma_del', 'as' => 'commandes_avec_comptes.perma_del']);
    Route::resource('comptes', 'Admin\ComptesController');
    Route::post('comptes_mass_destroy', ['uses' => 'Admin\ComptesController@massDestroy', 'as' => 'comptes.mass_destroy']);
    Route::post('comptes_restore/{id}', ['uses' => 'Admin\ComptesController@restore', 'as' => 'comptes.restore']);
    Route::delete('comptes_perma_del/{id}', ['uses' => 'Admin\ComptesController@perma_del', 'as' => 'comptes.perma_del']);
    Route::resource('inventaires_avec_comptes', 'Admin\InventairesAvecComptesController');
    Route::post('inventaires_avec_comptes_mass_destroy', ['uses' => 'Admin\InventairesAvecComptesController@massDestroy', 'as' => 'inventaires_avec_comptes.mass_destroy']);
    Route::post('inventaires_avec_comptes_restore/{id}', ['uses' => 'Admin\InventairesAvecComptesController@restore', 'as' => 'inventaires_avec_comptes.restore']);
    Route::delete('inventaires_avec_comptes_perma_del/{id}', ['uses' => 'Admin\InventairesAvecComptesController@perma_del', 'as' => 'inventaires_avec_comptes.perma_del']);
    Route::resource('user_actions', 'Admin\UserActionsController');
    Route::resource('galleries', 'Admin\GalleriesController');
    Route::post('galleries_mass_destroy', ['uses' => 'Admin\GalleriesController@massDestroy', 'as' => 'galleries.mass_destroy']);
    Route::post('galleries_restore/{id}', ['uses' => 'Admin\GalleriesController@restore', 'as' => 'galleries.restore']);
    Route::delete('galleries_perma_del/{id}', ['uses' => 'Admin\GalleriesController@perma_del', 'as' => 'galleries.perma_del']);
    Route::resource('actualites', 'Admin\ActualitesController');
    Route::post('actualites_mass_destroy', ['uses' => 'Admin\ActualitesController@massDestroy', 'as' => 'actualites.mass_destroy']);
    Route::post('actualites_restore/{id}', ['uses' => 'Admin\ActualitesController@restore', 'as' => 'actualites.restore']);
    Route::delete('actualites_perma_del/{id}', ['uses' => 'Admin\ActualitesController@perma_del', 'as' => 'actualites.perma_del']);
    Route::resource('categories', 'Admin\CategoriesController');
    Route::post('categories_mass_destroy', ['uses' => 'Admin\CategoriesController@massDestroy', 'as' => 'categories.mass_destroy']);
    Route::post('categories_restore/{id}', ['uses' => 'Admin\CategoriesController@restore', 'as' => 'categories.restore']);
    Route::delete('categories_perma_del/{id}', ['uses' => 'Admin\CategoriesController@perma_del', 'as' => 'categories.perma_del']);

    Route::model('messenger', 'App\MessengerTopic');
    Route::get('messenger/inbox', 'Admin\MessengerController@inbox')->name('messenger.inbox');
    Route::get('messenger/outbox', 'Admin\MessengerController@outbox')->name('messenger.outbox');
    Route::resource('messenger', 'Admin\MessengerController');


    Route::get('search', 'MegaSearchController@search')->name('mega-search');
    Route::get('language/{lang}', function ($lang) {
        return redirect()->back()->withCookie(cookie()->forever('language', $lang));
    })->name('language');});
