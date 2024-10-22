<?php

namespace App\Http\Controllers;


use App\Models\Filme;
use App\Responses\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilmeController extends Controller
{
    public function salvar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:200',
            'ano' => 'required|numeric',
            'diretor' => 'required|string|max:150',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(), 'Validation error');
        }

        $customer = Filme::create($request->all());
        return ApiResponse::ok('Filme salvo com sucesso', $customer);


    }
    public function listar()
    {
        $customers = 
        Filme::all();
        return ApiResponse::ok('lista de filmes', $customers);
    }

    public function listarPeloId(int $id)
    {
        $customer = Filme::findOrFail($id);
        return ApiResponse::ok('Filmes a ser listados', $customer);
        

    }
    public function editar(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:200',
            'ano' => 'required|numeric',
            'diretor' => 'required|string|max:150',
        ]);

        if ($validator->fails()) {
            return Apiresponse::error($validator->errors(), 'Validation error');
        }

        $customer = 
        Filme::findOrFail($id);
        $customer->update($request->all());

        return ApiResponse::ok('Filme atualizado com sucesso', $customer);
    }
    public function excluir(int $id)
    {
        $customer = Filme::findOrFail($id);
        $customer->delete();
        return ApiResponse::ok('Filme removido com sucesso', $customer);

    }
}
