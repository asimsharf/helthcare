<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PaymentCollection extends ResourceCollection
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
            'code'=> 1,
            'data' => $this->collection->transform(function ($payment) {
                return $this->formatPayment($payment);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }

    public static function formatPayment($payment){
        return [
            'id' => $payment->id,
            'patient' => PatientCollection::formatPatient($payment->patient),
            'appointment' => AppointmentCollection::formatAppointment($payment->appointment),
            'received_date' => $payment->received_date,
            'payment_method' => $payment->payment_method,
            'amount' => $payment->amount,
            'is_paid' => $payment->is_paid,
            "created_at"=>$payment->created_at,
            "updated_at"=>$payment->updated_at,
        ];
    }
}
