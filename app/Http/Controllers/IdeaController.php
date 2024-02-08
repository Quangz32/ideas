<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        // $idea = new Idea(
        //     [
        //         'content' => request()->get('idea', ''),
        //     ]
        // );

        request()->validate([
            'content' => 'required|min:5|max:240',
        ]);

        Idea::create(
            [
                'content' => request()->get('content', ''),
            ]
        );

        return redirect()->route('dashboard')->with('success', 'Idea was created successfully!');
    }

    public function destroy(Idea $idea)
    {

        //where id=1
        // $idea = Idea::where('id', $id)->firstOrFail();
        // $idea->delete();

        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }

    public function show(Idea $idea)
    {
        //dd($idea);
        return view('ideas.show', [
            'idea' => $idea,
        ]);

        // return view('ideas.show',compact('idea'));
    }

    public function edit(Idea $idea)
    {
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {

        //$editing = true;
        request()->validate([
            'content' => 'required|min:3|max:240'
        ]);
        $idea->content = request()->get('content', '');
        $idea->save();

        return redirect()->route('ideas.show',$idea->id)->with('success','Idea updated successfully!');
    }
}
