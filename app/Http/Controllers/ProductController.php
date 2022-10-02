<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $product_code = $request->get('product_code');

        $products = DB::table('products')
        ->product_code('product_code')
        ->paginate(4);
        // $products = Product::all();

        //return response()->json($product);

        return view('welcome', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventary.createProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'product_code' =>['required', 'alpha_num', 'max:13'],
            'product_name' =>['required', 'alpha_num'],
            'product_price' => ['required', 'numeric'],
            'product_stock' =>['required', 'numeric'],
            'product_lote' => ['required', 'alpha_num'],
            'category_id' => ['required', 'integer']

        ]);



               // return redirect('/home');

        $consulta = $request->input('product_name');


        $respuesta = DB::table('products')
        ->where('product_name', '=', $consulta)
        ->first();

        $consulta2 = $request->input('product_code');


        $respuesta2 = DB::table('products')
        ->where('product_code', '=', $consulta2)
        ->first();


        if(!$respuesta && !$respuesta2)
        {
            $product = new Product;
                $product->product_name =  $consulta;
                $product->product_code = $consulta2;
                $product->product_price = $request->product_price;
                $product->product_stock = $request->product_stock;
                $product->product_lote = $request->product_lote;
                $product->category_id = $request->category_id;
                $product->save();
            // return response()->json([
            //     'data' => $product,
            //     'msg' => 'Este producto no existe',
            //     'msg2' => 'Producto creado con exito'
            // ],200);

             $success2 = "Producto creado con exito";
            return redirect('/home')->with(compact('success2'));
        }
        if($respuesta)
        {
            $error = "Este nombre del producto ya existe";

            return redirect('/home')->with( compact('error'));
            // return response()->json([
            //     'data' => $respuesta,
            //     'msg' => 'Este producto ya existe'
            // ],200);
        }
        if($respuesta2)
        {
            $error2 = "Este codigo de producto ya existe";

            return redirect('/home')->with( compact('error2'));
            // return response()->json([
            //     'data' => $respuesta,
            //     'msg' => 'Este producto ya existe'
            // ],200);
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return response()->json($product);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'data' => null,
                'msg' => 'Producto no encontrada'
            ], 400);
        }


        $product->product_name = $request->input('product_name');
        $product->product_code = $request->input('product_code');
        $product->product_price = $request->input('product_price');
        $product->product_stock = $request->input('product_stock');
        $product->product_lote = $request->input('product_lote');
        $product->category_id = $request->input('category_id');
        $product->save();

        return response()->json([
            'data' => $product,
            'msg' => 'Actualizado con exito'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            // return response()->json([
            //     'data' => null,
            //     'msg' => 'Producto no encontrada'
            // ], 400);
            $error = "Este producto no existe";
            return redirect('/home')->with('error');
        }

        $product->delete();

        $success = "Producto eliminado con exito";

        return redirect('/home')->with('success');

        // return response()->json([
        //     'data' => $product,
        //     'msg' => 'Eliminado con exito'
        // ],200);

    }
}
