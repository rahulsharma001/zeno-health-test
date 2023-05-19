<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class Created extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        Created::withoutWrapping();
        return [
            "status" => Response::HTTP_CREATED,
            "message" => $this->resource,
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_CREATED); // 201
    }
}
