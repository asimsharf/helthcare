<?php

namespace App\Repositories;

use App\Http\Resources\PaymentCollection;

use App\Interfaces\PaymentInterface;

use App\Models\Payment;

class PaymentRepository implements PaymentInterface
{
    public function index()
    {
        return new PaymentCollection(Payment::paginate(10));
    }

    public function show($id)
    {
        $payment = PaymentCollection::formatPayment(Payment::findOrFail($id));
        return response()->json([
            'code' => 1,
            'data' => $payment,
        ]);
    }

    public function store($request)
    {
        $payment = Payment::create($request->all());
        return response()->json([
            'code' => 1,
            'data' => $payment,
        ]);
    }

    public function update($request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update($request->all());
        return response()->json([
            'code' => 1,
            'data' => $payment,
        ]);
    }

    public function destroy($id)

    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return response()->json([
            'code' => 1,
            'data' => $payment,
        ]);
    }
}
