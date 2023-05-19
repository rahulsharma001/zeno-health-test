<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class NotFoundResource extends JsonResource
{
    /**
     * @inheritDoc
     */
    public function toArray($request)
    {
        $this->withoutWrapping();

        return [
            'error' => Response::HTTP_NOT_FOUND,
            'message'   => $this->resource
        ];
    }

    /**
     * @inheritDoc
     */
    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_NOT_FOUND);
    }
}
