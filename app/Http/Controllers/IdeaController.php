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
            'ideas' => Idea::all(),
        ]);
    }
    /**
     * @Route("/idea/{idea}", name="idea.show", name="idea.show")
     */
    public function show(Idea $idea)
    {
        return view('idea.show', compact('idea'));
    }
}
