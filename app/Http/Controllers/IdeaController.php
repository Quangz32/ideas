<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {

        $validated = request()->validate([
            'content' => 'required|min:5|max:240',
        ]);

        $validated['user_id'] = auth()->id();

        Idea::create(
            $validated,
        );

        return redirect()->route('dashboard')->with('success', 'Idea was created successfully!');
    }

    public function destroy(Idea $idea)
    {

        if (auth()->id() !== $idea->user_id){
            abort(404);
        }


        //where id=1
        // $idea = Idea::where('id', $id)->firstOrFail();
        // $idea->delete();

        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }

    public function show(Idea $idea)
    {
        //dd($idea);
        //dd($idea->comments);
        return view('ideas.show', [
            'idea' => $idea,
        ]);

        // return view('ideas.show',compact('idea'));
    }

    public function edit(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id){
            abort(404);
        }

        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {

        if (auth()->id() !== $idea->user_id){
            abort(404);
        }

        request()->validate([
            'content' => 'required|min:3|max:240'
        ]);
        $idea->content = request()->get('content', '');
        $idea->save();

        return redirect()->route('ideas.show',$idea->id)->with('success','Idea updated successfully!');
    }
}
