<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * @Route("/", name="idea.index")
     */

    public function index()
    {
        return view('idea.index', [
            'ideas' => Idea::latest()->simplePaginate(10),
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
