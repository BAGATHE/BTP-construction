<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
class ClientDevisController extends Controller
{
    public function index(){
       return view('client.homeclient');
    }

    public function showDevisForm(){
        return view('client.formdevisclient');
    }
}
