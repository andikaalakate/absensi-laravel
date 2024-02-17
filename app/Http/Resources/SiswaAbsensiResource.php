<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SiswaAbsensiResource extends ResourceCollection
{
    public $status;
    public $messsage;
    public $resource;
    /**
     * Transform the resource collection into an array.
     *
     * __construct
     * 
     * @param mixed $status
     * @param mixed $message
     * @param mixed $resource
     * 
     */

    public function __construct($status, $message, $resource)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->messsage = $message;
        $this->resource = $resource;
    }

    /**
     * 
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray(Request $request)
    {
        return [
            'succes' => $this->status,
            'message' => $this->messsage,
            'data' => $this->resource
        ];
    }
}
