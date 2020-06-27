<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $fillable = [
        'nome',
        'est_id',
        'situacao',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function estado(){
        return $this->belongsTo('App\Estado', 'est_id', 'id');
    }

    public static function ativos()
    {
        return (new static)->where('situacao', 1)->orderBy('nome');
    }

    public function search(Array $dados)
    {
        return $cidades =  $this->where(function ($query) use ($dados){
            if (isset($dados['nome']))
                $query->where('nome', 'like', '%' . $dados['nome'] . '%');

            if (isset($dados['est_id']))
                $query->where('est_id', $dados['est_id']);

            if (isset($dados['situacao']))
                $query->where('situacao', $dados['situacao']);
        })
            ->paginate(2);
    }
}
