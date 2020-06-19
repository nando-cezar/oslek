<?php

namespace App\Http\Controllers;

use App\Setor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SetorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $setors = Setor::all();
        return $setors;
    }

    public function buscarSetorEmpresaID($id) {
        $setors = User::where('empresa_id', $id)->get();
        return $setors;

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        //
        try {
            $nome = $request->input('nome');
            $empresa_id = $request->input('empresa_id');

            if (!$name) return response('O Campo nome é obrigatório.', 400);
            if (!$empresa_id) return response('Empresa não encontrada.', 400);

            $setor = Setor::insert([
                'nome' => $nome,
                'empresa_id' => $empresa_id,
            ]);

            return [$setor, 'Retorno: ' => 'Atulizado com sucesso!'];;

        }  catch (Exception $e) {
            return response($e->getMessage(), 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function show(Setor $setor)
    {
        //
        return $setor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function edit(Setor $setor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setor $setor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setor $setor)
    {
        Setor::where('id', $setor->id)->delete();
    }
}

