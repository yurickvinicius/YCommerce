<?php

namespace YCommerce\Http\Controllers;

use Illuminate\Http\Request;
use YCommerce\Http\Requests;
use YCommerce\Tag;

class TagsController extends Controller
{

    private $tagModel;

    public function __construct(Tag $tag){
        $this->tagModel = $tag;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tags = $this->tagModel->paginate(10);
        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\TagRequest $request)
    {
        $tag = $this->tagModel->fill($request->all());
        $tag->save();

        return redirect()->route('tags');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $tag = $this->tagModel->find($id);
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\TagRequest $request, $id)
    {
        $this->tagModel->find($id)->update($request->all());
        return redirect()->route('tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->tagModel->find($id)->delete($id);

        return redirect()->route('tags');
    }
}
