<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');

        $products = DB::table('products')
        ->where('product_code', 'LIKE', '%' .$buscar.  '%')
        ->orWhere('product_lote', 'LIKE', '%' .$buscar. '%')
        ->paginate(4);

        $data = [
            'products' => $products,
            'buscar' => $buscar
        ];
        // $products = Product::all();

        //return response()->json($product);

       return view('welcome', $data);
    }

}
