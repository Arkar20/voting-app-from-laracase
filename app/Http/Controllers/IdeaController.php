<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\votes;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * @Route("/", name="idea.index")
     */

    public function index()
    {
        return view('idea.index', [
            'ideas' => Idea::addSelect([
                'voted_at_id' => votes::select('id')
                    ->where('user_id', auth()->id())
                    ->whereColumn('idea_id', 'ideas.id'),
            ])
                ->latest()
                ->simplePaginate(10),
        ]);
    }
    /**
     * @Route("/idea/{idea}", name="idea.show", name="idea.show")
     */
    public function show(Idea $idea)
    {
        return view('idea.show', compact('idea'));
    }
    /**
     * @Route("/", name="idea.store")
     */
    public function store(Request $request)
    {
        Idea::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'category_id' => 1,
            'status_id' => 1,
            'user_id' => 1,
        ]);

        return back();
    }
}
