<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\Produto;
use \App\Models\Categoria;

use Illuminate\Support\Facades\Gate;

class siteController extends Controller
{
    public function index()
    {
        // return 'index';
        //Produto::all() -> aqui nos tras todos os produtos do db 
        $produtos = Produto::paginate(3); // 3 produtos por pagina 

        return view('site.home', compact('produtos')); 
    }

    public function details($slug) {
        $produto = Produto::where('slug', $slug)->first();

        if(Gate::allows('ver-produto', $produto)) {
            return view('site.details', compact('produto'));
        }

        if(Gate::denies('ver-produto', $produto)) {
            return redirect()->route('site.index');
        }
        
        // Gate::authorize('ver-produto', $produto);
        // $this->authorize('verProduto', $produto);
    } 

    public function categoria($id) {
        $categoria = Categoria::find($id);
        $produtos = Produto::where('id_categoria', $id)->paginate(3);
        return view('site.categoria', compact('produtos', 'categoria'));
    } 
}
