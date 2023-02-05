<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class InvoiceDetailCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($invoiceDetail) {
                return $this->formatInvoiceDetail($invoiceDetail);
            }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }

    public static function formatInvoiceDetail($invoiceDetail){
        return [
            'id' => $invoiceDetail->id,
            'invoice' => InvoiceCollection::formatInvoice($invoiceDetail->invoice),
            'invoice_notes' => $invoiceDetail->invoice_notes,
            "created_at"=>$invoiceDetail->created_at,
            "updated_at"=>$invoiceDetail->updated_at,
        ];
    }
}
