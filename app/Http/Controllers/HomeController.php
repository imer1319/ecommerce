<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\User;

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

        $date = Carbon::now();
        $year = [];
        $user = [];
        $meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
        $val_months = [];
        for ($i = 1 ; $i<= 12; $i++){
            $val_months[] = User::whereYear('created_at',$date->year)->whereMonth('created_at', '=', $i)->count();
        }

        for ($i = 4; $i > -1; $i--) {
            $year[] = $date->year - $i;
        }
        foreach ($year as $value) {
            $user[] = User::where(DB::raw("DATE_FORMAT(created_at, '%Y')"), $value)->count();
        }
        return view('home', compact('categories', 'products', 'tags', 'roles'))
            ->with('year', json_encode($year, JSON_NUMERIC_CHECK))->with('user', json_encode($user, JSON_NUMERIC_CHECK))->with('meses', json_encode($meses, JSON_NUMERIC_CHECK))->with('val_months', json_encode($val_months, JSON_NUMERIC_CHECK));
    }


    public function dashboard()
    {
        return view('dashboard');
    }
}
