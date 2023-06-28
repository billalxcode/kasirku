<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Api\ApiController;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    /**
     * Get all products
     */
    protected $attributeHidden = [
        'category_id', 'unit_id'
    ];

    public function all(Request $request)
    {
        $filters = $request->post('filters');

        if ($filters && !is_array($filters)) {
            return $this->setStatusCode(400)->respondWithError('error', [
                'filters' => 'parameter must be array'
            ]);
        }
        
        $collection = Product::with('category')->get();
        
        return $this->respondWithCollection($collection, function (Product $product) {
            $result = [];
            $filters = request()->post('filters');
            
            if (isset($filters) && is_array($filters)) {
                foreach ($filters as $filter) {
                    $value = $product->getAttributeValue($filter);
                    if (!in_array($filter, $this->attributeHidden)) {
                        $result[$filter] = $value;
                    }
                }
            } else {
                $attributes = $product->getAttributes();
                foreach ($attributes as $attribute => $value) {
                    if (!in_array($attribute, $this->attributeHidden)) {
                        $result[$attribute] = $value;
                    }
                }
            }

            // relations
            $relations = $product->getRelations();
            foreach ($relations as $relation => $value) {
                $result[$relation] = $value;
            } 
            return $result;
        });
    }

    /**
     * Search product by code
     */
    public function search(Request $request)
    {
        $code = $request->post('code');
        $filters = $request->post('filters');

        if (!isset($code) || is_null($code)) {
            return $this->setStatusCode(400)->respondWithError('error', [
                'code' => 'parameter not found'
            ]);
        }
        if ($filters && !is_array($filters)) {
            return $this->setStatusCode(400)->respondWithError('error', [
                'filters' => 'parameter must be array'
            ]);
        }

        $collection = Product::where('product_code', $code)->first();

        return $this->respondWithItem($collection, function (Product $product) {
            $result = [];
            $filters = request()->post('filters');

            if (isset($filters) && is_array($filters)) {
                foreach ($filters as $filter) {
                    $value = $product->getAttributeValue($filter);
                    if (!in_array($filter, $this->attributeHidden)) {
                        $result[$filter] = $value;
                    }
                }
            } else {
                $attributes = $product->getAttributes();

                foreach ($attributes as $attribute => $value) {
                    if (!in_array($attribute, $this->attributeHidden)) {
                        $result[$attribute] = $value;
                    }
                }
            }
            
            // relations
            $relations = $product->getRelations();
            foreach ($relations as $relation => $value) {
                $result[$relation] = $value;
            } 
            return $result;
        });
    }
}
