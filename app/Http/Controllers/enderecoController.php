<?php

namespace App\Http\Controllers;

use App\Http\Requests\Endereco\SalvarRequest;
use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class enderecoController extends Controller
{
    public function index()
    {
        $enderecos = Endereco::all();
        return view('listagem')->with(
            [
            'enderecos' => $enderecos
            ]
        );
    }
    public function adicionar(){
        return view('busca');
    }

    public function buscar(Request $request)
    {
         $cep = $request->input('cep');
         $response = Http::get("https://viacep.com.br/ws/".$cep."/json/")->json();
         return view('adicionar')->with([
            'cep'=>$response['cep'],
            'logradouro'=>$response['logradouro'],
            'complemento'=>$response['complemento'],
            'bairro'=>$response['bairro'],
            'localidade'=>$response['localidade'],
            'uf'=>$response['uf'],
            'ddd'=>$response['ddd'],
         ]);
    }
    public function salvar(SalvarRequest $request)
    {
        $endereco = Endereco::where('cep',$request->input('cep'))->first();

        if ($endereco == false) {
            $endereco = Endereco::create(
                [
                    'cep' => $request->input('cep'),
                    'logradouro' => $request->input('logradouro'),
                    'complemento' => $request->input('complemento'),
                    'bairro' => $request->input('bairro'),
                    'localidade' => $request->input('localidade'),
                    'uf' => $request->input('uf'),
                    'ddd' => $request->input('ddd'),
                    
                ]
                );
                return redirect('/')->with( session()->put('Sucesso', 'Cadastro realizado com sucesso'));
        }
        
        
        
        return redirect('/')->with( session()->put('Erro', 'Erro CEP ja cadastrado'));
            
    }
    public function deletar($id)
    {
        $endereco = Endereco::findOrFail($id);
        if ($endereco) {
            $endereco->delete();
            return redirect('/')->with( session()->put('Sucesso', 'CEP deletado com sucesso'));
        }
            return redirect('/')->with( session()->put('Erro', 'Não foi possivel deletar o CEP'));
    }
}
