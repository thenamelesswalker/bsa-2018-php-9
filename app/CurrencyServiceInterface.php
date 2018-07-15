<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 13.07.18
 * Time: 0:41
 */

namespace App;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface CurrencyServiceInterface
{
    public function findAll(): Collection;

    public function findById(int $id): ?Currency;

    public function deleteById(int $id): void;

    public function store(array $data): void;

    public function update(Currency $currency, array $data): void;
}