<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 13.07.18
 * Time: 0:42
 */

namespace App;


use App\Http\Requests\CurrencyRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CurrencyService implements CurrencyServiceInterface
{
    public function findAll(): Collection {
        return Currency::all();
    }

    public function findById(int $id): ?Currency {
        return Currency::find($id);
    }

    public function deleteById(int $id): void
    {
        Currency::destroy($id);
    }

    public function store(array $data): void
    {
        $currency = new Currency($data);
        $currency->save();
    }

    public function update(Currency $currency, array $data): void
    {
        $currency->title = $data['title'];
        $currency->short_name = $data['short_name'];
        $currency->price = $data['price'];
        $currency->logo_url = $data['logo_url'];
        $currency->save();
    }
}