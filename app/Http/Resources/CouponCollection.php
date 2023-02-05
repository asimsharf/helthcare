<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CouponCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'code' => 1,
            'data' => $this->collection->transform(function ($coupon) {
                return $this->formatCoupon($coupon);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }

    public static function formatCoupon($coupon)
    {
        return [
            "id" => $coupon->id,
            "payment" => PaymentCollection::formatPayment($coupon->payment),
            "code" => $coupon->code,
            "is_enabled" => $coupon->is_enabled,
            "discount" => $coupon->discount,
            "discount_description" => $coupon->discount_description,
            "discount_type" => $coupon->discount_type,
            "times_usage" => $coupon->times_usage,
            "expire_date" => $coupon->expire_date,
            "created_at" => $coupon->created_at,
            "updated_at" => $coupon->updated_at,
        ];
    }
}
