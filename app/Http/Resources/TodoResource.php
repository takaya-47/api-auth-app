<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class TodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'content'    => $this->content,
            'created_at' => Carbon::parse($this->created_at)->format('Y/m/d H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y/m/d H:i:s')
        ];
    }
}
