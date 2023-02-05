<?php

namespace App\Repositories;

use App\Http\Resources\InvoiceCollection;
use App\Interfaces\InvoiceInterface;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;

class InvoiceRepository implements InvoiceInterface
{
    public function index()
    {
        return new InvoiceCollection(Invoice::paginate(10));
    }

    public function store($request)
    {
        // id
        // patient_id
        // appointment_id
        // received_date
        // payment_method
        // amount
        // is_paid
        // created_at
        // updated_at
        $payment = new Payment();
        // id
        // payment_id	
        // total_amount	
        // tax	
        // created_at	
        // updated_at
        $invoice = new Invoice;
        // id
        // invoice_id	
        // invoice_notes	
        // created_at	
        // updated_at
        $details = new InvoiceDetail;
    }

    public function show($id)
    {
        $invoice = InvoiceCollection::formatInvoice(Invoice::findOrFail($id));
        return response()->json([
            'code' => 1,
            'data' => $invoice,
        ]);
    }

    public function update($request, $id)
    {
        $invoice = Invoice::find($id);
        if (!$invoice) {
            return response()->json(['code'=>0,'message' => 'هذه الفاتورة غير موجودة']);
        }
        $invoice->update($request->all());
        return response()->json(['code'=>1,'message' => 'تم تحديث الفاتورة بنجاح']);
    }

    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        if (!$invoice) {
            return response()->json(['code'=>0,'message' => 'هذه الفاتورة غير موجودة']);
        }
        $invoice->delete();
        return response()->json(['code'=>1,'message' => 'تم حذف الفاتورة بنجاح']);
    }
}
