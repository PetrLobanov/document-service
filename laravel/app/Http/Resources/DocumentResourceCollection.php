<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DocumentResourceCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($document) {
                return [
                    'uuid' => $this->uuid,
                    'name' => $this->name,
                    'discription' => $this->description,
                    'version_number' => $this->version_number,
                    'file_path' => $this->file_path,
                ];
            }),
        ];
    }
}
