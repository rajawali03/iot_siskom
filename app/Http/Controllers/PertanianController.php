<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pertanian_Aquaponic_Controller extends Controller
{
public function index() {
$latest_aquaponic_data = DB::table('post_table_aquaponic')->orderBy('created_at', 'desc')->first();
$latest_pertanian_data = DB::table('posts_table_pertanian')->orderBy('created_at', 'desc')->first();

return view('dashboard.index', [
'latest_aquaponic_data' => $latest_aquaponic_data,
'latest_pertanian_data' => $latest_pertanian_data
]);
}
}