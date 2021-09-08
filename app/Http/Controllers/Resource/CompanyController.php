<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Iex\IexApi;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('search');
    }

    public function create($quote, $companyData)
    {
        $company = New Company();
        $company->symbol = $quote['symbol'];
        $company->companyName = $quote['companyName'];
        $company->currency = $quote['currency'];
        $company->latestPrice = $quote['latestPrice'];
        $company->industry = $companyData['industry'];
        $company->website = $companyData['website'];
        $company->sector = $companyData['sector'];
        $company->save();
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'symbol' => 'required|',
        ]);

        $iex = New IexApi();
        $quote = $iex->getQuote($request->symbol);
        $companyData = $iex->getCompany($request->symbol);

        if($quote){
            $company  = Company::where("symbol",$request->symbol)->get()->first();
            if($company){ //atualizar o lastprice
                $this->update($company, $quote);
            } else {
                $this->create($quote, $companyData);
            }
            return view('company')->with('quote', $quote);
        } else {
            return redirect('/')->with('error', 'Symbol Not Found');
        }
    }

    public function update($company, $quote)
    {
        $company->latestPrice = $quote['latestPrice'];
        $company->save();
    }

}
