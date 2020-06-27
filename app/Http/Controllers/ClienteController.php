<?php

namespace App\Http\Controllers;


use App\Cidade;
use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::paginate(10);
        $cidades  = Cidade::all();

        return view('cliente.index', compact('clientes', 'cidades'));
    }

    public function searchClient(Request $request, Cliente $clienteBusca){
        $dadosBusca = $request->except('_token');

        $clientes = $clienteBusca->search($dadosBusca);
        $cidades  = Cidade::all();

        return view('cliente.index', compact('clientes', 'cidades', 'dadosBusca'));
    }

    public function create()
    {
        $cidades = Cidade::all();

        return view('cliente.create', compact('cidades'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        isset($dados['situacao']) ? $dados['situacao'] = 1 : $dados['situacao'] = 0;

        Cliente::create($dados);

        return redirect()->route('cliente.index');
    }

    public function edit($id)
    {
        if (!($cliente = Cliente::find($id)))
        {
            $mensagem = "Houve um erro na alteração do registro.";
            return $this->retornaMensagemErro('cliente.index', $mensagem);
        }

        $cidades = Cidade::all();

        return view(
            'cliente.edit', compact('cidades', 'cliente'), [
                              'formAction' => route('cliente.update', $id),
                          ]
        );
    }

    public function update($id, Request $request)
    {
        try
        {
            if (!($cliente = Cliente::find($id)))
            {
                dd('erro1');
            }

            $dados = $request->all();
            isset($dados['situacao']) ? $dados['situacao'] = 1 : $dados['situacao'] = 0;
            /*$cliente->fill($dados);
            $cliente->save();*/
            $cliente->update($dados);

            return redirect()->route('cliente.index');

        }
        catch (\Exception $e)
        {
            dd('erro2');
        }
    }

    public function updateFast(Request $request)
    {
        try
        {
            if (!($cliente = Cliente::find($request->cliente)))
            {
                dd('erro1');
            }

            $dados = $request->all();

            $cliente->update($dados);

            $mensagem = 'A Situação do Cliente foi atualizada!';

            return json_encode(['success' => true, 'mensagem' => $mensagem]);


        }
        catch (\Exception $e)
        {
            dd('erro2');
        }
    }

    public function destroy($id)
    {
        try
        {
            if (!($cliente = Cliente::find($id)))
            {
                dd('erro1');
            }

            $cliente->delete();

            $mensagem = 'Cliente excluído com Sucesso!';

            return json_encode(
                [
                    'success'  => true,
                    'mensagem' => $mensagem,
                    'redirect' => redirect()->route('cliente.index')
                ]
            );
        }
        catch (\Exception $e)
        {
            dd('erro2');
        }
    }
}
