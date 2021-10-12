<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Category $category)
    {
        $questions = $category->questions->count() ?
            $category->questions()->paginate(10) : Question::latest()->paginate(10);
        $categories = Category::has('questions')->with('questions')
            ->get();
        return view('home')->with([
            'questions' => $questions,
            'categories' => $categories
        ]);
    }
}
