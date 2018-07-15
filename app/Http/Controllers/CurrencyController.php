<?php

namespace App\Http\Controllers;

use App\Currency;
use App\CurrencyServiceInterface;
use App\Http\Requests\CurrencyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CurrencyController extends Controller
{
    private $currencyService;

    /**
     * CurrencyController constructor.
     * @param $currencyService
     */
    public function __construct(CurrencyServiceInterface $currencyService)
    {
        $this->middleware('auth');
        $this->currencyService = $currencyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('currencies', ['currencies' => $this->currencyService->findAll()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create')) {
            return redirect('/');
        }
        return view('currency_form',['currency' => null, 'edit_mode' => false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyRequest $request)
    {
        if(Gate::denies('create')) {
            return redirect('/');
        }
        $data = $request->only(['title', 'short_name', 'price', 'logo_url']);
        $this->currencyService->store($data);
        return view('currencies', ['currencies' => $this->currencyService->findAll()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        return view('currency', ['currency' => $currency]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        var_dump($currency);
        if($currency == null || Gate::denies('update', $currency)) {
            return redirect('/');
        }
        return view('currency_form', ['currency' => $currency, 'edit_mode' => true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyRequest $request, Currency $currency)
    {
        if(Gate::denies('update', $currency)) {
            return redirect('/');
        }
        $data = $request->only(['title', 'short_name', 'price', 'logo_url']);
        $this->currencyService->update($currency, $data);
        return view('currency',['currency' => $currency]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        if(Gate::denies('delete', $currency)) {
            return redirect('/');
        }
        $this->currencyService->deleteById($currency->id);
        return redirect()->route('currencies.index');
    }
}
