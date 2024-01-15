<?php

namespace App\Http\Resources;

use App\Models\Attribute;
use App\Models\Value;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $result = [
          'quantity' => $this->quantity,
        ];
        return $this->getAttributes($result);
    }

    public function getAttributes(array $result):array
    {
         $attributes = json_decode($this->attributes);

        foreach ($attributes as $StockAttributes)
            {
                $attributes = Attribute::find($StockAttributes->attribute_id);
                $value = Value::find($StockAttributes->value_id);
                $result[$attributes->name] = $value->name;
            }
        return $result;
    }
}
