<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public function index() 
    {
        $events = []; 

        foreach (\App\CommandesSimple::all() as $commandessimple) { 
           $crudFieldValue = $commandessimple->getOriginal('date_heur_souhaitee'); 

           if (! $crudFieldValue) {
               continue;
           }

           $eventLabel     = $commandessimple->date_heur_souhaitee; 
           $prefix         = 'Visiteur :'; 
           $suffix         = ''; 
           $dataFieldValue = trim($prefix . " " . $eventLabel . " " . $suffix); 
           $events[]       = [ 
                'title' => $dataFieldValue, 
                'start' => $crudFieldValue, 
                'url'   => route('admin.commandessimples.edit', $commandessimple->id)
           ]; 
        } 

        foreach (\App\CommandesAvecCompte::all() as $commandesaveccompte) { 
           $crudFieldValue = $commandesaveccompte->getOriginal('date_heur_souhaitee'); 

           if (! $crudFieldValue) {
               continue;
           }

           $eventLabel     = $commandesaveccompte->adresse_de_livraison; 
           $prefix         = 'Client :'; 
           $suffix         = ''; 
           $dataFieldValue = trim($prefix . " " . $eventLabel . " " . $suffix); 
           $events[]       = [ 
                'title' => $dataFieldValue, 
                'start' => $crudFieldValue, 
                'url'   => route('admin.commandesaveccomptes.edit', $commandesaveccompte->id)
           ]; 
        } 


       return view('admin.calendar' , compact('events')); 
    }

}
