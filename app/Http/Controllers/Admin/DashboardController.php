<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $contactstatus =  ContactStatus::withCount('contacts')->get()->keyBy('name');
        return view('dashboard.index', compact('contactstatus'));
    }
}
