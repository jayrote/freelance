<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $parent_category = $this->category_parent_id ? $this->parant->name : 'null';

        $status = $this->status == 1 ? 'Active' : 'Inactive';

        return [
            'id' => $this->id,
            'name' => $this->name,
            'category_parent_id' => $parent_category,
            'status' => $status
        ];
    }
}
