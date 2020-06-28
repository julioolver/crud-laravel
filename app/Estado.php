<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = [
        'nome',
        'uf',
        'situacao',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public static function ativos()
    {
        return (new static)->where('situacao', 1)->orderBy('nome');
    }

    public function search(Array $dados)
    {
        return $estados =  $this->where(function ($query) use ($dados){
            if (isset($dados['nome']))
                $query->where('nome', 'like', '%' . $dados['nome'] . '%');

            if (isset($dados['uf']))
                $query->where('uf', 'like', '%' . $dados['uf'] . '%');

            if (isset($dados['situacao']))
                $query->where('situacao', $dados['situacao']);
        })
            ->paginate(5);
    }
}
