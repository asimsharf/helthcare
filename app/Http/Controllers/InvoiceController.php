<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Resources\InvoiceCollection;
use App\Interfaces\InvoiceInterface;
use App\Models\Invoice;

class InvoiceController extends Controller
{

  private InvoiceInterface $invoiceRepository;

    public function __construct(InvoiceInterface $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function index()
    {
        return $this->invoiceRepository->index();
    }

    public function store(StoreInvoiceRequest $request)
    {
        return $this->invoiceRepository->store($request);
    }

    public function show($id)
    {
        return $this->invoiceRepository->show($id);
    }

    public function update(UpdateInvoiceRequest $request, $id)
    {
        return $this->invoiceRepository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->invoiceRepository->destroy($id);
    }
    
}
