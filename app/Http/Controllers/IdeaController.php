<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            "content" => "required|min:3|max:240",
        ]);

        $idea = new Idea($validated);
        $idea->likes = 0;
        $idea->save();

        return redirect()->route("dashboard")->with("success", "Idea created successfully");
    }

    public function show(Idea $idea)
    {
        return view("ideas.show", compact("idea"));
    }

    public function edit(Idea $idea)
    {
        $editing = true;

        return view("ideas.show", compact("idea", "editing"));
    }

    public function update(Idea $idea, Request $request)
    {
        $validated = $request->validate([
            "content" => "required|min:3|max:240",
        ]);

        $idea->update($validated);

        return redirect()->route("ideas.show", compact("idea"))->with("success", "Idea updated successfully");
    }

    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect()->route("dashboard")->with("success", "Idea removed successfully");
    }
}
