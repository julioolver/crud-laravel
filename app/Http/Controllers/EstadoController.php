<?php

namespace App\Http\Controllers;

use App\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function index()
    {
        $estados  = Estado::paginate(10);

        return view('estado.index', compact('estados', 'estados'));
    }

    public function searchState(Request $request, Estado $estadoBusca){
        $dadosBusca = $request->except('_token');

        $estados = $estadoBusca->search($dadosBusca);

        return view('estado.index', compact('estados', 'dadosBusca'));
    }

    public function create()
    {
        $estados = Estado::all();

        return view('estado.create', compact('estados'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();

        isset($dados['situacao']) ? $dados['situacao'] = 1 : $dados['situacao'] = 0;

        estado::create($dados);

        return redirect()->route('estado.index');
    }

    public function edit($id)
    {
        if (!($estado = estado::find($id)))
        {
            $mensagem = "Houve um erro na alteração do registro.";
            return $this->retornaMensagemErro('estado.index', $mensagem);
        }

        $estados = Estado::all();

        return view(
            'estado.edit', compact('estados', 'estado'), [
                              'formAction' => route('estado.update', $id),
                          ]
        );
    }

    public function update($id, Request $request)
    {
        try
        {
            if (!($estado = estado::find($id)))
            {
                dd('erro1');
            }

            $dados = $request->all();
            isset($dados['situacao']) ? $dados['situacao'] = 1 : $dados['situacao'] = 0;
            /*$estado->fill($dados);
            $estado->save();*/
            $estado->update($dados);

            return redirect()->route('estado.index');

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
            if (!($estado = estado::find($request->estado)))
            {
                return json_encode(
                    [
                        'success'  => false,
                        'redirect' => redirect()->route('estado.index')
                    ]
                );
            }

            $dados = $request->all();

            $estado->update($dados);

            $mensagem = 'A Situação do estado foi atualizada!';

            return json_encode(['success' => true, 'mensagem' => $mensagem]);


        }
        catch (\Exception $e)
        {
            return json_encode(
                [
                    'success'  => false,
                    'redirect' => redirect()->route('estado.index')
                ]
            );
        }
    }

    public function destroy($id)
    {
        try
        {
            if (!($estado = Estado::find($id)))
            {
                return json_encode(
                    [
                        'success'  => false,
                        'redirect' => redirect()->route('estado.index')
                    ]
                );
            }

            $estado->delete();

            $mensagem = 'Estado excluído com Sucesso!';

            return json_encode(
                [
                    'success'  => true,
                    'mensagem' => $mensagem,
                    'redirect' => redirect()->route('estado.index')
                ]
            );
        }
        catch (\Exception $e)
        {
            return json_encode(
                [
                    'success'  => false,
                    'redirect' => redirect()->route('estado.index')
                ]
            );
        }
    }
}
