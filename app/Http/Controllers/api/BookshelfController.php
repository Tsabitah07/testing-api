<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BookShelf;
use App\Models\Category;
use Illuminate\Http\Request;

class BookshelfController extends Controller
{
    public function store(Request $request)
    {
        $bookshelf = BookShelf::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'publish_date' => $request->publish_date,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'price' => $request->price
        ]);

        return response()->json([
            'message' => 'Bookshelf created successfully',
            'data' => $bookshelf
        ], 200);
    }

    public function index(Request $request)
    {
        if ($request->query('book_id')) {
            $bookshelf = BookShelf::find($request->query('book_id'));

            if (!$bookshelf) {
                return response()->json([
                    'message' => 'Bookshelf not found'
                ], 404);
            }
        } else {
            $bookshelf = BookShelf::all();
        }

        return response()->json([
            'message' => 'Bookshelves retrieved successfully',
            'data' => $bookshelf
        ], 200);
    }

    public function update(Request $request)
    {
        $bookshelf = BookShelf::find($request->query('book_id'));

        if (!$bookshelf) {
            return response()->json([
                'message' => 'Bookshelf not found'
            ], 404);
        }

        $bookshelf->update([
            'title' => $request->title ?? $bookshelf->title,
            'author' => $request->author ?? $bookshelf->author,
            'description' => $request->description ?? $bookshelf->description,
            'publish_date' => $request->publish_date ?? $bookshelf->publish_date,
            'category' => $request->category ?? $bookshelf->category,
            'quantity' => $request->quantity ?? $bookshelf->quantity,
            'price' => $request->price ?? $bookshelf->price
        ]);

        return response()->json([
            'message' => 'Bookshelf updated successfully',
            'data' => $bookshelf
        ], 200);
    }

    public function destroy(Request $request)
    {
        $bookshelf = BookShelf::find($request->query('book_id'));

        if (!$bookshelf) {
            return response()->json([
                'message' => 'Bookshelf not found'
            ], 404);
        }

        $bookshelf->delete();

        return response()->json([
            'message' => 'Bookshelf deleted successfully'
        ], 200);
    }

    public function search(Request $request)
    {
        $bookshelf = BookShelf::where('title', 'like', '%' . $request->query('title') . '%')->get();

        return response()->json([
            'message' => 'Bookshelves retrieved successfully',
            'data' => $bookshelf
        ], 200);
    }

    public function category()
    {
        return response()->json([
            'message' => 'Categories retrieved successfully',
            'data' => Category::all()
        ], 200);
    }
}
