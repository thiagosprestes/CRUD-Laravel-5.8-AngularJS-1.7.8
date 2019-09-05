<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = [
        'data' => 'date: d/m/Y',
        'total' => 'decimal: 2'
    ];
    
    protected $fillable = [
        'cliente', 'qtdEspetinhosCarne', 'qtdEspetinhosFrango', 'sanduiches', 'total', 'situacao', 'data'
    ];
}
