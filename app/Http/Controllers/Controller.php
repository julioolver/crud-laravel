<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function retornaMensagemErro($rota, $mensagem, $exception = false)
    {
        \Session::flash('mensagem', $mensagem);
        \Session::flash('status', 'erro');
        if($exception)
            \Session::flash('exception', $exception);
        return redirect()->route($rota);
    }

    public function retornaMensagem($rota, $mensagem)
    {
        \Session::flash('mensagem', $mensagem);

        if(\Session::has($rota)){
            $url = \Session::get($rota);
            return redirect($url);
        }

        return redirect()->route($rota);
    }
}

