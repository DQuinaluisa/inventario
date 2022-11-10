<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Provider;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return response()->json($products);

    }

    public function listOfProductsforSale(Request $request)
    {



        $buscar = $request->get('buscar');

        $products = DB::table('products')
        ->where('product_code', 'LIKE', '%' .$buscar.  '%')
        ->orWhere('product_lote', 'LIKE', '%' .$buscar. '%')
        ->paginate(10);

        $data = [
            'products' => $products,
            'buscar' => $buscar
        ];
        // $products = Product::all();

        //return response()->json($product);

       return view('sales.listProductsSale', $data);
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
            'product_name' =>['required', 'string'],
            'product_price' => ['required', 'numeric'],
            'product_stock' =>['required', 'numeric'],
            'product_lote' => ['required', 'alpha_num'],
            'provider_id' => ['required', 'integer'],
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
                $product->provider_id = $request->provider_id;
                $product->category_id = $request->category_id;
                $product->save();
            // return response()->json([
            //     'data' => $product,
            //     'msg' => 'Este producto no existe',
            //     'msg2' => 'Producto creado con exito'
            // ],200);

            $reports = new Report();
            $reports->product_name =  $consulta;
            $reports->product_code = $consulta2;
            $reports->product_price = $request->product_price;
            $reports->product_stock = $request->product_stock;
            $reports->product_lote = $request->product_lote;

            $reports->save();

             $success2 = "Producto creado con exito";

            //  return response()->json([
            //         'data' => $product,
            //         'data2' => $reports,

            //         'msg2' => 'Producto creado con exito'
            //     ],200);
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
         $product = Product::find($id);

        // $product = DB::table('products')
        // ->select('id', 'product_name', 'product_code', 'product_lote', 'product_stock', 'product_price', 'category_id')
        // ->find($id);
       $category = Category::all();
       $providers = Provider::all();


        return view('inventary.editProduct', compact('product', 'category', 'providers'));
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

        $request->validate([
            'product_code' =>['required', 'alpha_num', 'max:13'],
            'product_name' =>['required', 'string'],
            'product_price' => ['required', 'numeric'],
            'product_stock' =>['required', 'numeric'],
            'product_lote' => ['required', 'alpha_num'],
            'category_id' => ['required', 'integer'],
            'provider_id' => ['required', 'integer']

        ]);


        $product->product_name = $request->input('product_name');
        $product->product_code = $request->input('product_code');
        $product->product_price = $request->input('product_price');
        $product->product_stock = $request->input('product_stock');
        $product->product_lote = $request->input('product_lote');
        $product->provider_id = $request->input('provider_id');
        $product->category_id = $request->input('category_id');
        $product->save();

        // return response()->json([
        //     'data' => $product,
        //     'msg' => 'Actualizado con exito'
        // ],200);

        $success3 = "Producto Actualizado con exito";

        return redirect('home')->with(compact('success3'));
    }


    public function edit2($id)
    {
         $product = Product::find($id);

        // $product = DB::table('products')
        // ->select('id', 'product_name', 'product_code', 'product_lote', 'product_stock', 'product_price', 'category_id')
        // ->find($id);
       $category = Category::all();
       $providers = Provider::all();


        return view('inventary.addProducts', compact('product', 'category', 'providers'));
    }

    public function productsAdd (Request $request, $id)
    {
        $product = Product::find($id);

        $cantidad = $request->input('product_stock');

        $product_add = DB::select("UPDATE products
        SET products.product_stock = products.product_stock + $cantidad
        WHERE products.id = $id");


        $valor1 = $product['product_name'];
        $valor2 = $product['product_code'];
        $valor3 = $product['product_price'];
        $valor4 = $product['product_stock'];
        $valor5 = $product['product_lote'];

        $reports = new Report();
        $reports->product_name =  $valor1;
        $reports->product_code = $valor2;
        $reports->product_price =$valor3;
        $reports->product_stock = $cantidad;
        $reports->product_lote = $valor5;

        $reports->save();

        $success3 = "Productos Agregados con exito";
        return redirect('home')->with(compact('success3'));

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
