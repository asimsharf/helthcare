<?php

namespace App\Http\Controllers;

use App\Interfaces\CountryInterface;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    private CountryInterface $countryRepository;

    public function __construct(CountryInterface $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function index()
    {
        return $this->countryRepository->index();
    }

    public function store(Request $request)
    {
        return $this->countryRepository->store($request);
    }

    public function show($id)
    {
        return $this->countryRepository->show($id);
    }

    public function update(Request $request,  $id)
    {
        return $this->countryRepository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->countryRepository->destroy($id);
    }

}
