<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AquaponicController extends Controller
{
    public function index() {
        $latest_aquaponic_data = DB::table('post_table_aquaponic')->latest()->first();
        return view('dashboard.index', ['latest_aquaponic_data' => $latest_aquaponic_data]);
    }
}