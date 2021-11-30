/* 
 * União Metropolitana de Educação e Cultura  
 * Bacharelado em Sistemas de Informação  
 * Programação para Web II 
 * Prof.: Pablo Ricardo Roxo Silva 
 * Aluno: José Ricardo Franco Silva Júnior 
 */

<?php

namespace App\Http\Controllers;

use App\Models\Postagem as Postagem;
use App\Http\Resources\Postagem as PostagemResource;
use Illuminate\Http\Request;

class PostagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postagens = Postagem::paginate(15);
        return PostagemResource::collection($postagens);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postagem = new Postagem;
        $postagem->titulo = $request->input('titulo');
        $postagem->tema = $request->input('tema');
        $postagem->conteudo = $request->input('conteudo');
        $postagem->link = $request->input('link');
        $postagem->criador = $request->input('criador');
        $postagem->tags = $request->input('tags');

        if( $postagem->save() ){
          return new PostagemResource( $postagem );
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
        $postagem = Postagem::findOrFail( $id );
        return new PostagemResource( $postagem );
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
    public function update(Request $request)
    {   
        $postagem = Postagem::findOrFail( $request->id );
        $postagem->titulo = $request->input('titulo');
        $postagem->tema = $request->input('tema');
        $postagem->conteudo = $request->input('conteudo');
        $postagem->link = $request->input('link');
        $postagem->criador = $request->input('criador');
        $postagem->tags = $request->input('tags');

        if( $postagem->save() ){
          return new PostagemResource( $postagem );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postagem = Postagem::findOrFail( $id );
        if( $postagem->delete() ){
          return new PostagemResource( $postagem );
        }
    }
}
