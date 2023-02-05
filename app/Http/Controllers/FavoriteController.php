<?php

namespace App\Http\Controllers;

use App\Interfaces\FavoriteInterface;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    private FavoriteInterface $favoriteInterface;

    public function __construct(FavoriteInterface $favoriteInterface)
    {
        $this->favoriteInterface = $favoriteInterface;
    }

    public function index()
    {
        return $this->favoriteInterface->index();
    }

    public function store(Request $request)
    {
        return $this->favoriteInterface->store($request);
    }

    public function show( $id)
    {
        return $this->favoriteInterface->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->favoriteInterface->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->favoriteInterface->destroy($id);
    }

}
