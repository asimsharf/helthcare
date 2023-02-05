<?php

namespace App\Http\Controllers;

use App\Interfaces\CouponInterface;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    private CouponInterface $couponInterface;

    public function __construct(CouponInterface $couponInterface)
    {
        $this->couponInterface = $couponInterface;
    }

    public function index()
    {
        return $this->couponInterface->index();
    }

    public function store(Request $request)
    {
        return $this->couponInterface->store($request);
    }

    public function show($id)
    {
        return $this->couponInterface->show($id);
    }

    public function update(Request $request, Coupon $coupon)
    {
        return $this->couponInterface->update($request, $coupon);
    }

    public function destroy(Coupon $coupon)
    {
        return $this->couponInterface->destroy($coupon);
    }

}
