<?php

namespace App\Http\Controllers\Vendas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Venda;

class vendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaVendas = Venda::orderBy('id', 'DESC')->get();

        return $listaVendas; 
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
        $dados = json_decode($request->getContent(), true);
        
        $dados['total'] = str_replace(',', '.', $dados['total']);

        //Formata data para o padrão europeu 
        $dados['data'] = date('Y-m-d', strtotime(str_replace('/', '-', $dados['data'])));

        Venda::create($dados);
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
        $dados = json_decode($request->getContent(), true);

        $dados['total'] = str_replace(',', '.', $dados['total']);
        
        //Formata data para o padrão europeu 
        $dados['data'] = date('Y-m-d', strtotime(str_replace('/', '-', $dados['data'])));

        Venda::find($id)->update($dados);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Venda::find($id)->delete();
    }
}
