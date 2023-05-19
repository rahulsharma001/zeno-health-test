<?php
declare(strict_types = 1);

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

/**
 * Class Success is used to format API response of successful GET request in the format decided for
 *
 * @package App\Http\Resources\Api
 */
class Success extends JsonResource
{
    /**
     * @inheritDoc
     */
    public function toArray($request)
    {
        Success::withoutWrapping();
        return [
            "status" => Response::HTTP_OK,
            "data" => $this->resource,
        ];
    }

    /**
     * @inheritDoc
     */
    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_OK); // 200
    }
}
