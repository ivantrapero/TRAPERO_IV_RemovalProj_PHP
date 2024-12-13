<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Fetch all items
    public function index()
    {
        return response()->json(Item::all(), 200);
    }

    // Fetch a specific item by ID
    public function show($id)
    {
        $item = Item::find($id);
        if ($item) {
            return response()->json($item, 200);
        }
        return response()->json(['message' => 'Item not found'], 404);
    }

    // Create a new item
   public function store(Request $request)
{
    Log::info('Store method reached. Request data:', $request->all()); // Log request data

    $validatedData = $request->validate([
        'id' => 'required|string|unique:items,id',
        'name' => 'required|string|max:255',
    ]);

    $item = Item::create($validatedData);
    return response()->json($item, 201);
}

    // Update an existing item by ID
    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        if ($item) {
            $validatedData = $request->validate([
                'name' => 'sometimes|required|string|max:255',
            ]);

            $item->update($validatedData);
            return response()->json($item, 200);
        }
        return response()->json(['message' => 'Item not found'], 404);
    }

    // Delete an item by ID
    public function destroy($id)
    {
        $item = Item::find($id);
        if ($item) {
            $item->delete();
            return response()->json(['message' => 'Item deleted successfully'], 200);
        }
        return response()->json(['message' => 'Item not found'], 404);
    }
}