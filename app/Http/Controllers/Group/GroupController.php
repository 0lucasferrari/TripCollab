<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Group;
use App\Interest;

class GroupController extends Controller
{
    private $group;

    public function __construct(Group $group)
    {
        $this->group = $group;
    }

    // use UploadTrait;
    // public function __construct() {
    //     $this->middleware('user.has.store')->only(['create','store']);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = auth()->user()->group;
        $group = $groups->groups()->paginate(3);
        
        $footer = 'true';
        return view('Groups and Trips/index', compact('footer', 'group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $interests = \App\Interest::all(['id', 'name']);

        $footer = 'true';
        return view('Groups and Trips/Group/create', compact('footer','interests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $store = $this->group->create($data);
        // flash('Comunidade criada com sucesso')->success();
        return redirect()->route('group.create');
        
        // if($request->hasFile('logo')) {
        //     $data['logo'] = $this->imageUpload($request->file('logo')[0]);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show($group)
    {
        $group = $this->group->findOrFail($group);
        $admin = $group->admin()->first()->name;
        $footer = 'true';
        //dd($group);
        return view('/Groups and Trips/Group/show', compact('footer', 'group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = $this->group->findOrFail($id);
        $footer = 'true';
        // dd($group);
        return view('/Groups and Trips/Group/edit', compact('footer', 'group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $group = \App\Group::find($id);
        dd($group->update($data));

        /* *
        if(!is_null($categories))
        {
            $product->categories()->sync($categories);
        }* /
        /* *
        if($request->hasFile('photos')) {
            $images = $this->imageUpload($request->file('photos'), 'image');
            $product->photos()->createMany($images);
        }; */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = $this->group->find($id);
        $group->delete();

        return redirect()->route('/profile');
    }
}
