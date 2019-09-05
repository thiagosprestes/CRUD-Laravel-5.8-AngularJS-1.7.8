<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dado extends Model
{
    public static function dados()
    {
        $dados = DB::table('vendas')
                    ->select(DB::raw('
                        date_format(data, "%d/%m/%Y") as data,
                        COUNT(cliente) as clientes, 
                        SUM(qtdEspetinhosCarne) as qtdEspetinhosCarne,
                        SUM(qtdEspetinhosFrango) as qtdEspetinhosFrango,
                        SUM(sanduiches) as qtdSanduiches,
                        SUM(total) as total
                    '))
                    ->groupBy('data')
                    ->orderBy('data', 'DESC')
                    ->get();

        return $dados;
    }
}
