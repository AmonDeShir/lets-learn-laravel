<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "idea" => "required|min:3|max:240",
        ]);

        $idea = new Idea([
            "content" => $request->input("idea", ""),
        ]);

        $idea->save();

        return redirect()->route("dashboard")->with("success", "Idea created successfully");
    }

    public function show(Idea $idea)
    {
        return view("ideas.show", compact("idea"));
    }

    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect()->route("dashboard")->with("success", "Idea removed successfully");
    }
}
