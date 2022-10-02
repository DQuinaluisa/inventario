<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

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

       return view('home', $data);
    }

    public function index2(Request $request)
    {

    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            // return response()->json([
            //     'data' => null,
            //     'msg' => 'Producto no encontrada'
            // ], 400);
            $error = "Este producto no existe";
            return redirect('/home')->with( compact('error') );
        }

        $product->delete();

        $success = "Producto eliminado con exito";

        return redirect('/home')->with(compact('success'));

        // return response()->json([
        //     'data' => $product,
        //     'msg' => 'Eliminado con exito'
        // ],200);

    }
}
