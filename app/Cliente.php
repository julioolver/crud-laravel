<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Array_;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'situacao',
        'cid_id',
        'data_nascimento',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function search(Array $dados)
    {
       return $clientes =  $this->where(function ($query) use ($dados){
            if (isset($dados['nome']))
                $query->where('nome', 'like', '%' . $dados['nome'] . '%');

            if (isset($dados['cid_id']))
                $query->where('cid_id', $dados['cid_id']);

            if (isset($dados['situacao']))
                $query->where('situacao', $dados['situacao']);
        })
        ->paginate(2);
    }
}
