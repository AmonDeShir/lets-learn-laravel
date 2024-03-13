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
        $request->validate([
            "content" => "required|min:3|max:250",
        ]);

        $comment = new Comment([
            "idea_id" => $idea->id,
            "content" => $request->input("content", ""),
        ]);

        $comment->save();

        return redirect()->route("ideas.show", $idea->id)->with("success", "Comment created successfully");
    }

    public function show(Comment $comment): void
    {
    }

    public function edit(Comment $comment): void
    {
    }

    public function update(Comment $comment, Request $request): void
    {
    }

    public function destroy(Comment $comment): void
    {
    }
}
