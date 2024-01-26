<?php

namespace App\Http\Resources;

use App\Models\Attribute;
use App\Models\Value;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $result = [
            'stock_id' => $this->id,
            'quantity' => $this->quantity,
        ];
        return $this->getAttributes($result);
    }

    public function getAttributes(array $result): array
    {
        $attributes = json_decode($this->attributes);

        foreach ($attributes as $StockAttributes) {
            $attributes = Attribute::find($StockAttributes->attribute_id);
            $value = Value::find($StockAttributes->value_id);
            $result[$attributes->name] = $value->name;
        }
        return $result;
    }
}
