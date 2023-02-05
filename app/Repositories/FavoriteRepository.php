<?php

namespace App\Repositories;

use App\Http\Resources\FavoriteCollection;
use App\Models\Favorite;
use App\Interfaces\FavoriteInterface;

class FavoriteRepository implements FavoriteInterface
{
    public function index()
    {
        try {
            return new FavoriteCollection(Favorite::with(['doctor', 'patient'])->paginate(10));
        } catch (\Exception $e) {
            return response()->json(['code'=>0,'message' => $e->getMessage()], 500);
        }
    }

    public function store($request)
    {
        try {
            $favorite = new Favorite();
            $favorite->user_id = $request->user_id;
            $favorite->product_id = $request->product_id;
            $favorite->save();
            return response()->json(['code'=>1,'message' => 'Favorite created successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['code'=>0,'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            return FavoriteCollection::formatFavorite(Favorite::with(['doctor', 'patient'])->findOrFail($id));
        } catch (\Exception $e) {
            return response()->json(['code'=>0,'message' => $e->getMessage()], 500);
        }
    }

    public function update($request, $id)
    {
        try {
            $favorite = Favorite::findOrFail($id);
            $favorite->user_id = $request->user_id;
            $favorite->product_id = $request->product_id;
            $favorite->save();
            return response()->json(['code'=>1,'message' => 'Favorite updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['code'=>0,'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $favorite = Favorite::findOrFail($id);
            $favorite->delete();
            return response()->json(['code'=>1,'message' => 'Favorite deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['code'=>0,'message' => $e->getMessage()], 500);
        }
    }
}
