<?php

namespace App\Repositories;

use App\Http\Resources\CouponCollection;
use App\Models\Coupon;
use App\Interfaces\CouponInterface;

class CouponRepository implements CouponInterface
{
    public function index()
    {
        try {
            return new CouponCollection(Coupon::with(['payment'])->paginate(10));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function store($request)
    {
        try {
            $coupon = Coupon::create($request->all());
            return new CouponCollection($coupon);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            return CouponCollection::formatCoupon(Coupon::with(['payment'])->findOrFail($id));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update($request, $id)
    {

        try {
            $coupon = Coupon::findOrFail($id);
            $coupon->update($request->all());
            return new CouponCollection($coupon);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            $coupon = Coupon::findOrFail($id);
            $coupon->delete();
            return new CouponCollection($coupon);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
