<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class InvoiceCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($invoice) {
                return $this->formatInvoice($invoice);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }

    public static function formatInvoice($invoice){
        return [
            'id' => $invoice->id,
            'payment' => PaymentCollection::formatPayment($invoice->payment),
            'total_amount' => $invoice->total_amount,
            'tax' => $invoice->tax,
            'invoice_details' => $invoice->invoiceDetails->collect(function ($invoiceDetail) {
                return InvoiceDetailCollection::formatInvoiceDetail($invoiceDetail);
            }),
            "created_at"=>$invoice->created_at,
            "updated_at"=>$invoice->updated_at,
        ];
    }
}
