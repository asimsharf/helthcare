<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Interfaces\PaymentInterface;
use App\Models\Payment;

class PaymentController extends Controller
{
    private PaymentInterface $paymentInterface;

    public function __construct(PaymentInterface $paymentInterface)
    {
        $this->paymentInterface = $paymentInterface;
    }

    public function index()
    {
        return $this->paymentInterface->index();
    }

    public function store(StorePaymentRequest $request)
    {
        return $this->paymentInterface->store($request);
    }

    public function show($id)
    {
        return $this->paymentInterface->show($id);
    }

    public function update(UpdatePaymentRequest $request, $id)
    {
        return $this->paymentInterface->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->paymentInterface->destroy($id);
    }
}
