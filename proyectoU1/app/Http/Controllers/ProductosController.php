<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductosController extends Controller
{
        //El constructor es lo que se ejecuta cuando haces una instacia al contructor
    public function __construct(){
        //Protegemos la URL
        //Al método index con el constructor le pasamos el parámetro de autentificación
        $this->middleware('auth');
    }
    //Método para mostrar la pagina productos
    public function index(){
        $productos = DB::table('products')->get();
        return view('products.productos',['productos'=>$productos]);
    }

    
    //Funcion para retornar la vista de agregar producto
    public function newProduct(){
        return view('products.newproduct');
    }

    //Funcion para agregar un producto nuevo a la base de datos
    public function store(Request $request){
        //Se añaden los productos a la base de datos
        Products::create([
            'name'=>$request->name,
            'descripcion_corta'=>$request->desc_corta,
            'descripcion_larga'=>$request->desc_larga,
            'precio_venta'=>$request->precio_venta,
            'precio_compra'=>$request->precio_compra,
            'stock'=>$request->stock,
            'peso'=>$request->peso
        ]);
        //Se retorna la vista de los productos
        return redirect()->route('productos')->with('success','El producto fue agregado con exito');

    }

    public function delete(Request $request){
        //Funcion para eliminar el producto
        $deleteProducto = DB::table('products')->where('id','=',$request->id)->delete();

        return redirect()->route('productos')->with('success','El producto fue eliminado con exito');

    }


}
