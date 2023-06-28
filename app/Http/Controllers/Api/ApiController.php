<?php

namespace App\Http\Controllers\Api;

use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Fractal\Resource\Collection;

class ApiController extends Controller
{
    protected $statusCode = 200;
    protected $fractal;

    public function __construct()
    {
        $this->fractal = new Manager;

        if (isset($_GET['include'])) {
            $this->fractal->parseIncludes($_GET['include']);
        }
    }
    /**
     * Get the status code
     * 
     * @return int $statusCode
     */
    public function getStatusCode() {
        return $this->statusCode;
    }

    /**
     * Set the status code
     * 
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Repond a no content response
     * 
     * @return response
     */
    public function noContent() {
        return response()->json(null, 204);
    }

    /**
     * Repond the item data
     * 
     * @param $item
     * @param $callback;
     * @return mixed
     */
    public function respondWithItem($item, $callback, $message = 'success') {
        $resource = new Item($item, $callback);
        $data = $this->fractal->createData($resource)->toArray();
        $data['message'] = $message;

        return $this->respondWithArray($data);
    }

    /**
     * Respond the collection
     * 
     * @param $collection
     * @param $callback
     * @return mixed
     */
    public function respondWithCollection($collection, $callback, $message = 'success') {
        $resource = new Collection($collection, $callback);
        $data = $this->fractal->createData($resource)->toArray();
        $data['message'] = $message;

        return $this->respondWithArray($data);
    }
    
    /**
     * Respond the message
     * 
     * @param string $message
     * @return json
     */
    public function respondWithMessage($message) {
        return $this->setStatusCode(200)->respondWithArray([
            'message' => $message
        ]);
    }

    /**
     * Respond with error
     * @param string $message
     * @return json
     */
    public function respondWithError($message, $errors) {
        return $this->respondWithArray([
            'errors' => $errors,
            'message' => $message
        ]);
    }

    /**
     * Respond the error of 'Unauthorized'
     * 
     * @param string $message
     * @return json
     */
    public function errorUnauthorized($message = "unauthorized", $errors = []) {
        return $this->setStatusCode(401)->respondWithError($message, $errors);
    }
    
    /**
     * Respond the data
     * 
     * @param array @array
     * @param array $headers
     * 
     * @return mixed
     */
    public function respondWithArray(array $array, array $headers = []) {
        return response()->json($array, $this->statusCode, $headers);
    }
}
