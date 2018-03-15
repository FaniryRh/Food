@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li>
                <select class="searchable-field form-control"></select>
            </li>

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            <li> 
                <a href="{{url('admin/calendar')}}">
                  <i class="fa fa-calendar"></i>
                  <span class="title">
                    Calendar
                  </span>
                </a>
            </li>
        
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_action_access')
                <li class="{{ $request->segment(2) == 'user_actions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.user_actions.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span class="title">
                                @lang('quickadmin.user-actions.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('statique_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.statiques.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('typepayement_access')
                <li class="{{ $request->segment(2) == 'typepayements' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.typepayements.index') }}">
                            <i class="fa fa-folder"></i>
                            <span class="title">
                                @lang('quickadmin.typepayement.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('etat_livraison_access')
                <li class="{{ $request->segment(2) == 'etat_livraisons' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.etat_livraisons.index') }}">
                            <i class="fa fa-folder"></i>
                            <span class="title">
                                @lang('quickadmin.etat-livraison.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('etat_commande_access')
                <li class="{{ $request->segment(2) == 'etat_commandes' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.etat_commandes.index') }}">
                            <i class="fa fa-folder"></i>
                            <span class="title">
                                @lang('quickadmin.etat-commande.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('compte_access')
            <li class="{{ $request->segment(2) == 'comptes' ? 'active' : '' }}">
                <a href="{{ route('admin.comptes.index') }}">
                    <i class="fa fa-folder"></i>
                    <span class="title">@lang('quickadmin.compte.title')</span>
                </a>
            </li>
            @endcan
            
            @can('commande_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span class="title">@lang('quickadmin.commandes.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('commandes_simple_access')
                <li class="{{ $request->segment(2) == 'commandes_simples' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.commandes_simples.index') }}">
                            <i class="fa fa-folder"></i>
                            <span class="title">
                                @lang('quickadmin.commandes-simples.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('inventaires_simple_access')
                <li class="{{ $request->segment(2) == 'inventaires_simples' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.inventaires_simples.index') }}">
                            <i class="fa fa-folder-open"></i>
                            <span class="title">
                                @lang('quickadmin.inventaires-simple.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('commandes_avec_compte_access')
                <li class="{{ $request->segment(2) == 'commandes_avec_comptes' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.commandes_avec_comptes.index') }}">
                            <i class="fa fa-folder"></i>
                            <span class="title">
                                @lang('quickadmin.commandes-avec-compte.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('inventaires_avec_compte_access')
                <li class="{{ $request->segment(2) == 'inventaires_avec_comptes' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.inventaires_avec_comptes.index') }}">
                            <i class="fa fa-folder-open"></i>
                            <span class="title">
                                @lang('quickadmin.inventaires-avec-compte.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('menu_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span class="title">@lang('quickadmin.menu.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('produit_access')
                <li class="{{ $request->segment(2) == 'produits' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.produits.index') }}">
                            <i class="fa fa-folder"></i>
                            <span class="title">
                                @lang('quickadmin.produit.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('option_access')
                <li class="{{ $request->segment(2) == 'options' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.options.index') }}">
                            <i class="fa fa-folder"></i>
                            <span class="title">
                                @lang('quickadmin.options.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('categorie_access')
                <li class="{{ $request->segment(2) == 'categories' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.categories.index') }}">
                            <i class="fa fa-folder"></i>
                            <span class="title">
                                @lang('quickadmin.categorie.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('gallerie_access')
            <li class="{{ $request->segment(2) == 'galleries' ? 'active' : '' }}">
                <a href="{{ route('admin.galleries.index') }}">
                    <i class="fa fa-folder"></i>
                    <span class="title">@lang('quickadmin.gallerie.title')</span>
                </a>
            </li>
            @endcan
            
            @can('actualite_access')
            <li class="{{ $request->segment(2) == 'actualites' ? 'active' : '' }}">
                <a href="{{ route('admin.actualites.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.actualite.title')</span>
                </a>
            </li>
            @endcan
            

            

            
            @php ($unread = App\MessengerTopic::countUnread())
            <li class="{{ $request->segment(2) == 'messenger' ? 'active' : '' }} {{ ($unread > 0 ? 'unread' : '') }}">
                <a href="{{ route('admin.messenger.index') }}">
                    <i class="fa fa-envelope"></i>

                    <span>Messages</span>
                    @if($unread > 0)
                        {{ ($unread > 0 ? '('.$unread.')' : '') }}
                    @endif
                </a>
            </li>
            <style>
                .page-sidebar-menu .unread * {
                    font-weight:bold !important;
                }
            </style>



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

