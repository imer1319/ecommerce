<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use App\Models\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $categories = Category::all()->count();
        $products = Product::all()->count();
        $tags = Tag::all()->count();
        $roles = Role::all()->count();

        $year = [];
        $user = [];
        for ($i = -4; $i < 1; $i++) {
            $year[] = strval(date("Y") +$i);
        }
        foreach ($year as $key => $value) {
            $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"), $value)->count();
        }

        return view('home', compact('categories', 'products', 'tags', 'roles'))
            ->with('year', json_encode($year, JSON_NUMERIC_CHECK))->with('user', json_encode($user, JSON_NUMERIC_CHECK));
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
