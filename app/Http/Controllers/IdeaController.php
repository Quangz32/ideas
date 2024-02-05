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
            'idea' => 'required|min:5|max:240',
        ]);

        Idea::create(
            [
                'content' => request()->get('idea', ''),
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
    }
}
