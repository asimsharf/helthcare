<?php

namespace App\Http\Controllers;

use App\Interfaces\RatingInterface;
use Illuminate\Http\Request;

class RatingController extends Controller
{

    private RatingInterface $ratingRepository;

    public function __construct(RatingInterface $ratingRepository)
    {
        $this->ratingRepository = $ratingRepository;
    }

    public function index()
    {
        return $this->ratingRepository->index();
    }

    public function store(Request $request)
    {
        return $this->ratingRepository->store($request);
    }

    public function show($id)
    {
        return $this->ratingRepository->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->ratingRepository->update($request, $id);
    }

}
