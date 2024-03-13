<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Idea $idea)
    {
        return view("ideas.show", compact("idea"));
    }

    public function store(Idea $idea, Request $request)
    {
        $validated = $request->validate([
            "content" => "required|min:3|max:250",
        ]);

        $comment = new Comment($validated);
        $comment->idea_id = $idea->id;
        $comment->save();

        return redirect()->route("ideas.show", $idea->id)->with("success", "Comment created successfully");
    }

    public function show(Comment $comment)
    {
        return view("comments.show", compact("comment"));
    }

    public function edit(Comment $comment)
    {
        $editing = true;

        return view("comments.show", compact("comment", "editing"));
    }

    public function update(Comment $comment, Request $request)
    {
        $validated = $request->validate([
            "content" => "required|min:3|max:250",
        ]);

        $comment->update($validated);

        return redirect()->route("ideas.show", $comment->idea_id)->with("success", "Comment updated successfully");
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route("ideas.show", $comment->idea_id)->with("success", "Comment removed successfully");
    }
}
