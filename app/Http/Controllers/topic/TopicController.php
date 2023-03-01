<?php

namespace App\Http\Controllers\topic;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $topic = Topic::where('topic', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $topic = Topic::latest()->paginate($perPage);
        }

        return view('topic.topic.index', compact('topic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('topic.topic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Topic::create($requestData);

        return redirect('topic/topic')->with('flash_message', 'Topic added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $topic = Topic::findOrFail($id);

        return view('topic.topic.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $topic = Topic::findOrFail($id);

        return view('topic.topic.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $topic = Topic::findOrFail($id);
        $topic->update($requestData);

        return redirect('topic/topic')->with('flash_message', 'Topic updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Topic::destroy($id);

        return redirect('topic/topic')->with('flash_message', 'Topic deleted!');
    }
}
