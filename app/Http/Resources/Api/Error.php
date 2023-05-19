<?php
declare(strict_types = 1);

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

/**
 * Class Error is used to format API response of error GET request in the format decided for
 * Discovery API response format. Controller of error GET request must return instance of this class.
 *
 * @package App\Http\Resources\Api
 */
class Error extends JsonResource
{
    /**
     * @inheritDoc
     */
    public function toArray($request)
    {
        Error::withoutWrapping();
        $errorMessage = null;

        if(isset($this->resource['entity_list'])) {
            $errorMessage = ["entity_list" => [$this->resource['entity_list']]];
        }
        if(isset($this->resource['sso_id'][0])) {
            $errorMessage = ["sso_id" => $this->resource['sso_id'][0]];
        }
        return [
            "status" => Response::HTTP_UNPROCESSABLE_ENTITY,
            "message" => $this->resource['message'][0] ?? null,
            "errors" => $errorMessage
        ];
    }

    /**
     * @inheritDoc
     */
    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY); // 422
    }
}
