<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view("dashboard", ["ideas" => Idea::orderBy("created_at", "DESC")->paginate(5)]);
    }

    public function search(Request $request)
    {
        $request->validate([
            "search" => "required",
        ]);

        $search = $request->input("search");
        $ideas = Idea::where("content", "LIKE", "%" . $search . "%")->orderBy("created_at", "DESC")->paginate(5);

        return view("dashboard", compact("ideas"));
    }
}
