<?php

namespace App\Http\Controllers\API;

use App\Models\Tour;
use App\Models\Travel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TravelController extends Controller
{
    public function store(Request $request)
    {
        dd($request);
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'is_public' => 'boolean',
            'slug' => 'required|unique:travels',
            'number_of_days' => 'required|integer|min:1',
        ]);

        $travel = Travel::create($data);

        return response()->json(['message' => 'Travel created successfully', 'data' => $travel], 201);
    }


    public function publicTravels(Request $request)
    {
        $perPage = $request->input('per_page', 5);

        $travels = Travel::where('is_public', 1)->paginate($perPage);

        return response()->json($travels);
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'is_public' => 'required|boolean',
            'number_of_days' => 'required|integer|min:1',
        ]);


        $travel = Travel::findOrFail($id);

        $travel->update($validatedData);

        return response()->json(['message' => 'Travel updated successfully']);
    }

    public function storetour(Request $request, $travel_id)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'starting_date' => 'required|date',
            'ending_date' => 'required|date',
            'price' => 'required|integer',
        ]);


        $travel = Travel::findOrFail($travel_id);


        $tour = $travel->tours()->create($validatedData);

        return response()->json(['message' => 'Tour created successfully', 'tour' => $tour]);
    }

    public function index(Request $request, $slug)
    {
        $query = Tour::whereHas('travel', function ($query) use ($slug) {
            $query->where('slug', $slug);
        });

        // Filtering
        if ($request->has('priceFrom')) {
            $query->where('price', '>=', $request->priceFrom);
        }
        if ($request->has('priceTo')) {
            $query->where('price', '<=', $request->priceTo);
        }
        if ($request->has('dateFrom')) {
            $query->where('starting_date', '>=', $request->dateFrom);
        }
        if ($request->has('dateTo')) {
            $query->where('starting_date', '<=', $request->dateTo);
        }

        // Sorting
        if ($request->has('sortBy')) {
            $sortField = $request->sortBy;
            $sortOrder = $request->has('sortDesc') && $request->sortDesc === 'true' ? 'desc' : 'asc';

            if ($sortField === 'price') {
                $query->orderBy('price', $sortOrder);
            } elseif ($sortField === 'starting_date') {
                $query->orderBy('starting_date', $sortOrder);
            }
        } else {
            $query->orderBy('starting_date', 'asc');
        }
        // dd($request->query());
        $tours = $query->paginate(5);

        return response()->json(['tours' => $tours]);
    }

}
