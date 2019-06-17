<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function getInfos() {

        $cle = 'user';
        $cle2 = 'other';
        if (!Session::has($cle)) {
            Session::put($cle, 'carine');
        }
        $valeur = Session::get($cle);
        
        if (!Session::has($cle2)) {
            session([$cle2 => 'geindreau']);
        }
        $valeur2= session($cle2);
        return 
        'La valeur de session pour la cle '. $cle . ' est '. $valeur. '<br/>'.
        'La valeur de session pour la cle '. $cle2 . ' est '. $valeur2.  '<br/>';
    }
}
