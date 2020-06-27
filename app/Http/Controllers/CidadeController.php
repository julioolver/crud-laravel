<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Estado;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function index()
    {
        $cidades  = Cidade::paginate(10);
        $estados  = Estado::ativos()->get();

        return view('cidade.index', compact('cidades', 'estados'));
    }

    public function searchCity(Request $request, Cidade $cidadeBusca){
        $dadosBusca = $request->except('_token');

        $cidades = $cidadeBusca->search($dadosBusca);
        $estados  = Estado::ativos()->get();

        return view('cidade.index', compact('estados', 'cidades', 'dadosBusca'));
    }

    public function create()
    {
        $cidades = Cidade::all();
        $estados = Estado::ativos()->get();

        return view('cidade.create', compact('cidades', 'estados'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        isset($dados['situacao']) ? $dados['situacao'] = 1 : $dados['situacao'] = 0;

        cidade::create($dados);

        return redirect()->route('cidade.index');
    }

    public function edit($id)
    {
        if (!($cidade = cidade::find($id)))
        {
            $mensagem = "Houve um erro na alteração do registro.";
            return $this->retornaMensagemErro('cidade.index', $mensagem);
        }

        $estados = Estado::ativos()->get();

        return view(
            'cidade.edit', compact('estados', 'cidade'), [
                              'formAction' => route('cidade.update', $id),
                          ]
        );
    }

    public function update($id, Request $request)
    {
        try
        {
            if (!($cidade = cidade::find($id)))
            {
                dd('erro1');
            }

            $dados = $request->all();
            isset($dados['situacao']) ? $dados['situacao'] = 1 : $dados['situacao'] = 0;
            /*$cidade->fill($dados);
            $cidade->save();*/
            $cidade->update($dados);

            return redirect()->route('cidade.index');

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
            if (!($cidade = cidade::find($request->cidade)))
            {
                return json_encode(
                    [
                        'success'  => false,
                        'redirect' => redirect()->route('cidade.index')
                    ]
                );
            }

            $dados = $request->all();

            $cidade->update($dados);

            $mensagem = 'A Situação do cidade foi atualizada!';

            return json_encode(['success' => true, 'mensagem' => $mensagem]);


        }
        catch (\Exception $e)
        {
            return json_encode(
                [
                    'success'  => false,
                    'redirect' => redirect()->route('cidade.index')
                ]
            );
        }
    }

    public function destroy($id)
    {
        try
        {
            if (!($cidade = cidade::find($id)))
            {
                return json_encode(
                    [
                        'success'  => false,
                        'redirect' => redirect()->route('cidade.index')
                    ]
                );
            }

            $cidade->delete();

            $mensagem = 'cidade excluída com Sucesso!';

            return json_encode(
                [
                    'success'  => true,
                    'mensagem' => $mensagem,
                    'redirect' => redirect()->route('cidade.index')
                ]
            );
        }
        catch (\Exception $e)
        {
            return json_encode(
                [
                    'success'  => false,
                    'redirect' => redirect()->route('cidade.index')
                ]
            );
        }
    }
}
