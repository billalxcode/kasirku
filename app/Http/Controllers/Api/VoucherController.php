<?php

namespace App\Http\Controllers\Api;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends ApiController
{
    /**
     * Get all vouchers
     */

    public function all(Request $request) {
        $filters = $request->post('filters');

        if ($filters && !is_array($filters)) {
            return $this->setStatusCode(400)->respondWithError('error', [
                'filters' => 'parameter must be array'
            ]);
        }
        
        $collection = Voucher::all();

        return $this->respondWithCollection($collection, function (Voucher $voucher) {
            $result = [];
            $filters = request()->post('filters');
            
            if (isset($filters) && is_array($filters)) {
                foreach ($filters as $filter) {
                    $result[$filter] = $voucher->getAttributeValue($filter);
                }
            } else {
                $attributes = $voucher->getAttributes();
                foreach ($attributes as $attribute => $value) {
                    $result[$attribute] = $value;
                }
            }
            return $result;
        });
    }

    /**
     * Search voucher by code
     */
    public function search(Request $request) {
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
        
        $collection = Voucher::where('voucher_code', $code)->first();
        
        return $this->respondWithItem($collection, function (Voucher $voucher) {
            $result = [];
            $filters = request()->post('filters');
            
            if (isset($filters) && is_array($filters)) {
                foreach ($filters as $filter) {
                    $result[$filter] = $voucher->getAttributeValue($filter);
                }
            } else {
                $attributes = $voucher->getAttributes();
                
                foreach ($attributes as $attribute => $value) {
                    $result[$attribute] = $value;
                }
            }
            return $result;
        });
    }
}
