<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Collective;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CollectiveRequest;

class CollectiveController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth', 'verified'])->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $collectives = Collective::where('user_id', auth()->user()->id)
            ->latest()->paginate(10);
        return view('collectives.index')->with([
            'collectives' => $collectives
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('collectives.create')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollectiveRequest $request)
    {
        //
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['slug'] = Str::slug($request->title);
        Collective::create($data);
        return redirect()->route('collectives.index')->with([
            'success' => 'Collective added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collective  $collective
     * @return \Illuminate\Http\Response
     */
    public function show(Collective $collective)
    {
        //
        return view('collectives.show')->with([
            'collective' => $collective
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collective  $collective
     * @return \Illuminate\Http\Response
     */
    public function edit(Collective $collective)
    {
        $categories = Category::all();
        return view('collectives.edit')->with([
            'categories' => $categories,
            'collective' => $collective
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collective  $collective
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collective $collective)
    {
        //
        if ($collective->owner($collective->user_id)) {
            $this->validate($request, [
                'title' => 'required|min:10|unique:collectives,id,' . $collective->id,
                'description' => 'required|min:10',
                'category_id' => 'required|numeric'
            ]);
            $data = $request->except('_token', '_method');
            $data['user_id'] = auth()->user()->id;
            $data['slug'] = Str::slug($request->title);
            $collective->update($data);
            return redirect()->route('collectives.index')->with([
                'success' => 'Collective updated successfully'
            ]);
        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collective  $collective
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collective $collective)
    {
        //
        if ($collective->owner($collective->user_id)) {
            $collective->delete();
            return redirect()->route('collectives.index')->with([
                'success' => 'Collective deleted successfully'
            ]);
        }
        abort(403);
    }
}
