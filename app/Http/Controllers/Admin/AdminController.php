<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Ukm;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $ukms = Ukm::count();
        $users = User::count();

        return view('pages.admin.index', compact('ukms', 'users'));
    }
}
