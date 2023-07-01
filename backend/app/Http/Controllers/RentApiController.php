<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getUserBooks()
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Retrieve the book IDs and types for the user
        $books = Rent::where('user_id', $userId)
            ->select('book_id', 'type', 'created_at')
            ->get();

        // Optionally, you can return a response or pass the books to a view
        return response()->json($books);
    }


    public function buy(Request $request, $bookId)
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Find the existing rent entry by user ID and book ID
        $existingRent = Rent::where('user_id', $userId)
            ->where('book_id', $bookId)
            ->first();

        // If an existing rent entry is found, delete it
        if ($existingRent) {
            $existingRent->delete();
        }

        // Create a new rent entry
        $newRent = new Rent();
        $newRent->user_id = $userId;
        $newRent->book_id = $bookId;
        $newRent->type = 'Bought';
        $newRent->save();

        // Optionally, you can return a response or redirect the user
        return response()->json(['message' => 'Book purchased successfully']);
    }

    public function rent(Request $request, $bookId)
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Create a new rent entry
        $newRent = new Rent();
        $newRent->user_id = $userId;
        $newRent->book_id = $bookId;
        $newRent->type = 'Rented';
        $newRent->save();

        // Optionally, you can return a response or redirect the user
        return response()->json(['message' => 'Rent created successfully'], 201);
    }

    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($bookId)
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Find the rent entry by user ID and book ID
        $rent = Rent::where('user_id', $userId)
                    ->where('book_id', $bookId)
                    ->first();

        // Check if the rent entry exists
        if (!$rent) {
            return response()->json(['message' => 'Rent entry not found'], 404);
        }

        // Delete the rent entry
        $rent->delete();

        // Optionally, you can return a response or redirect the user
        return response()->json(['message' => 'Rent entry deleted successfully']);
    }
}
