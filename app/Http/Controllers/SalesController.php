<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $sales = DB::table('products')
        // ->join('sales', 'products.id', '=', 'sales.product_id')
        // ->select('*')
        // ->orderBy('sales.id', 'desc')->paginate(10);

        $buscar = $request->get('buscar');

        $sales = DB::table('products')
        ->join('sales', 'products.id', '=', 'sales.product_id')
        ->where('departure_date', 'LIKE', '%' .$buscar.  '%')
        ->select('*')
         ->orderBy('sales.id', 'desc')->paginate(10);

        $data = [
            'sales' => $sales,
            'buscar' => $buscar
        ];
        // $products = Product::all();

        //return response()->json($product);

       return view('sales.listSales', $data);


    //  return view('sales.listSales', compact('sales'));

        // return response()->json([
        //     'data' => $sales
        // ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $sales = Product::find($id);


        //  return response()->json([
        //     'data' => $sales
        // ]);

        return view('sales.createSales', compact('sales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // $sales = new Sales();
        // $sales->products_sales = $request->input('products_sales');
        // $sales->product_id = $request->input('product_id');
        // $sales->save();

        // return response()->json([
        //     'data' => $sales
        // ]);

        //$idProducto = Sales::find($id);

       // $idProducto =  $request->input('product_id');


       $request->validate([
        'products_sales' =>['required', 'numeric'],
        'departure_date' =>['required', 'date']


    ]);
        $cantidad = $request->input('products_sales');

        $consulta = Product::find($id);

        $validar = $consulta['product_stock'];

        if($cantidad > $validar)
        {
            $mensaje =   'Actualmente solo dispone de la cantidad de'. ' ' . $consulta['product_stock']. ' ' . 'unidades'  ;


            return redirect('list-of-products-for-sale')->with(compact('mensaje'));
            // return response()->json([
            //     'msg' => $mensaje,
            //     'cantidad' => $stock
            // ]);
        }

        if($cantidad < $validar)
        {
                $sales = new Sales();
            $sales->products_sales = $cantidad;
            $sales->departure_date = $request->input('departure_date');
            $sales->product_id = $id;

            $sales->save();


            $product_sold = DB::select("UPDATE products INNER JOIN sales
            ON products.id = sales.product_id
            SET products.product_stock = products.product_stock - $cantidad
            WHERE products.id = $id");

            $success = "Venta realizada con exito";

            return redirect('list-sales')->with(compact('success'));

            // return response()->json([
            //     'data' => $sales,
            //     'msg' => "Venta realizada con Exito"
            // ]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
