<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Changelanguage extends Controller
{
    public function setLocale($lang){
        session(['language' => $lang]);
        return redirect()->back();
    }
}
