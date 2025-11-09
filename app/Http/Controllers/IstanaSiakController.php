<?php

namespace App\Http\Controllers;

use App\Models\Main;
use App\Models\Review;
use Illuminate\Http\Request;

class IstanaSiakController extends Controller
{
public function index()
    {
        // Ambil semua data dari tabel main
        $mains = Main::all();

        // Pisahkan data berdasarkan kategori
        $todoPosts = Main::where('category', 'todo_post')->get();
        $koleksiPosts = Main::where('category', 'koleksi_post')->get();
        $wisatas = Main::where('category', 'wisata')->get();
        $hero = Main::where('category', 'hero')->first();
        $reviews = Review::latest()->take(4)->get();
        return view('index', compact('todoPosts', 'koleksiPosts', 'wisatas', 'mains', 'hero', 'reviews'));
    }


    public function submitReview(Request $request)
    {
        $validates = [
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:500|min:10',
        ];

        $messages = [
            'rating.required' => 'Rating wajib diisi.',
            'rating.integer' => 'Rating harus berupa angka.',
            'rating.min' => 'Rating minimal adalah 1.',
            'rating.max' => 'Rating maksimal adalah 5.',
            'review.required' => 'Ulasan wajib diisi.',
            'review.string' => 'Ulasan harus berupa teks.',
            'review.max' => 'Ulasan maksimal 500 karakter.',
            'review.min' => 'Ulasan minimal 10 karakter.',
        ];

        $request->validate($validates, $messages);

        Review::create([
            'user_id' => auth()->user()->id,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        // Reset form setelah submit
        // $request-(['rating','review']);

        return redirect()->back()->with('success', 'Terima kasih atas ulasan Anda!');


    }
}
