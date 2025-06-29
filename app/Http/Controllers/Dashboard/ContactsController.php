<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    //
    public function index(){
        return view('dashboard.contacts.index');
    }
    public function create(){
        return view('dashboard.contacts.create');

    }
}
