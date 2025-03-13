<?php

namespace App\Filament\Resources\SaleResource\Pages;

use App\Filament\Resources\SaleResource;
use App\Models\Product;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateSale extends CreateRecord
{
    protected static string $resource = SaleResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        if (!isset($data['total_price'])) {
            $price = Product::findOrFail($data['product_id'])->price;
            $data['total_price'] = $price * $data['quantity'];
        }


        return static::getModel()::create($data);
    }
}
