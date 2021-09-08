<?php

namespace App\Iex;

use Illuminate\Support\Facades\Http;

/**
 * Classe com os métodos necessários para utilizar o Iex.
 */
class IexApi
{
/**
     * Retorna a url gravada em  em .env
     *
     * @return string
     */
    protected function url()
    {
        return config('iex.url');
    }

    /**
     * Retorna o token gravado em .env
     *
     * @return string
     */
    protected function token()
    {
        return config('iex.token');
    }

    /**
     * Retorna a quote do simbolo
     *
     * @return string
     */
    public function getQuote($symbol)
    {
        $getQuote = strval($this->url() . '/stable/stock/' . $symbol . '/quote/?token='. $this->token());
        $response = Http::get($getQuote);
        $response = json_decode($response, true);
        return $response;
    }

    /**
     * Retorna a quote do simbolo
     *
     * @return string
     */
    public function getCompany($symbol)
    {
        $getCompany = strval($this->url() . '/stable//stock/' . $symbol . '/company/?token='. $this->token());
        $response = Http::get($getCompany);
        $response = json_decode($response, true);
        return $response;
    }


}
