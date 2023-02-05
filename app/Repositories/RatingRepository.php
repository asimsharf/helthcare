<?php

namespace App\Repositories;

use App\Http\Resources\RatingsCollection;
use App\Interfaces\RatingInterface;
use App\Models\Ratings;

class RatingRepository implements RatingInterface
{
    public function index()
    {
        return new RatingsCollection(Ratings::paginate(10));
    }

    public function store($request)
    {
        $ratings = new Ratings;
        $ratings->appointment_id = $request->appointment_id;
        $ratings->note = $request->note;
        $ratings->amount = $request->amount;
        $ratings->count = $request->count;
        $ratings->date = $request->date;
        $ratings->save();
        return response()->json(['code'=>1,'message' => 'Rating created successfully'], 201);
    }

    public function show($id)
    {
        $ratings = RatingsCollection::formatRating(Ratings::findOrFail($id));
        return response()->json([
            'code' => 1,
            'data' => $ratings,
        ]);
    }

    public function update($request, $id)
    {
        $rating = Ratings::find($id);
        if (!$rating) {
            return response()->json(['code'=>0,'message' => 'Rating not found'], 404);
        }
        $rating->user_id = $request->user_id;
        $rating->doctor_id = $request->doctor_id;
        $rating->rating = $request->rating;
        $rating->save();
        return response()->json(['code'=>1,'message' => 'Rating updated successfully'], 200);
    }

    public function destroy($id)
    {
        $rating = Ratings::find($id);
        if (!$rating) {
            return response()->json(['code'=>0,'message' => 'Rating not found'], 404);
        }
        $rating->delete();
        return response()->json(['code'=>1,'message' => 'Rating deleted successfully'], 200);
    }
}
