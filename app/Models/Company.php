<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * Tabela utilizada no banco de dados.
     *
     * @var string
     */
    protected $table = 'companies';

    protected $fillable =[
        'symbol',
        'companyName',
        'currency',
        'lastPrice',
        'industry',
        'website',
        'sector',
    ];

}
