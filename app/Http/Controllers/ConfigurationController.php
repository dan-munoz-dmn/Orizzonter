<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    /**
     * Muestra el dashboard de configuraciones.
     */
    public function index()
    {
        return view('configurations.index');
    }

    public function darkMode()
    {
        return view('configurations.dark-mode');
    }

    public function language()
    {
        return view('configurations.language');
    }

    public function notifications()
    {
        return view('configurations.notifications');
    }

    public function security()
    {
        return view('configurations.security');
    }

    public function privacy()
    {
        return view('configurations.privacy');
    }

    public function account()
    {
        return view('configurations.account');
    }
}