<?php


namespace App\Http\Resources\Api;


use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class Deleted extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        Deleted::withoutWrapping();
        return [
            "status" => Response::HTTP_OK,
            "message" => $this->resource,
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_OK); // 200
    }
}