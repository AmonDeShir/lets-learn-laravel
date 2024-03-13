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
        $idea->user_id = auth()->id();
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

        if (auth()->id() !== $idea->user_id) {
            abort(403, "");
        }

        return view("ideas.show", compact("idea", "editing"));
    }

    public function update(Idea $idea, Request $request)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(403, "");
        }

        $validated = $request->validate([
            "content" => "required|min:3|max:240",
        ]);

        $idea->update($validated);

        return redirect()->route("ideas.show", compact("idea"))->with("success", "Idea updated successfully");
    }

    public function destroy(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(403, "");
        }

        $idea->delete();

        return redirect()->route("dashboard")->with("success", "Idea removed successfully");
    }
}
