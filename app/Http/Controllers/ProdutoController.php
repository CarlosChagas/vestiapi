<?php

namespace App\Http\Controllers;

use App\Models\Tamanho;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        foreach($produtos as $produto){
            $produto['id_tamanho'] = Tamanho::find($produto['id_tamanho'])->value('tamanho');
            $produto['id_categoria'] = Categoria::find($produto['id_categoria'])->value('categoria');
            
         }
        return $produtos;
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
                    'nome'=> 'required',
                    'codigo'=>'required',
                    'preco'=>'required',
                    'quantidade'=>'required',
            ]);

            if($request->hasFile('image') && $request->file('imagem')->isValid()){
               $requestImagem = $request->imagem;
               $extensao = $requestImagem->extension();
               $imagemNome = md5($requestImagem->getClientOriginalName() . strtotime('now')) . "." . $extensao;

               $requestImagem->move(public_path('/image/produtos'), $imagemNome);
            }
               return Produto::create($request->all());              
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $produto = Produto::find($id);
       $produto['id_tamanho'] = Tamanho::find($produto['id_tamanho'])->value('tamanho');
       $produto['id_categoria'] = Categoria::find($produto['id_categoria'])->value('categoria');

        return $produto;
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
         $produto = Produto::find($id);
         $produto->update($request->all());
         return $produto;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        Produto::destroy($id);
        return $produto;
        
    }
}
