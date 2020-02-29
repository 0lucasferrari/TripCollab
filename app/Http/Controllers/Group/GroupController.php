<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trip;
use App\Group;
use App\Topic;
use App\Interest;
use App\User;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    private $group;

    public function __construct(Group $group, Trip $trip, Interest $interests, User $user, Topic $topic)
    {
        $this->group = $group;
        $this->trip = $trip;
        $this->interests = $interests;
        $this->user = $user;
        $this->topic = $topic;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $interests = Interest::get();

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

        if($request->hasFile('photo'))
        {
            $image = $request->file('photo');
            $data['photo'] = $image->store('groups', 'public');
        } else {
            $data['photo'] = 'nophoto';
        }

        $store = $this->group->create($data);

        $store->interest()->sync($request->interest, false);

        return redirect()->route('group.create');
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
        
        $interests = DB::table('group_interest')
        ->where('group_id', $group->id)
        ->join('interests','group_interest.interest_id','=','interests.id')
        ->get();

        $confirmedMembers = DB::table('group_user')
        ->where('group_id', $group->id)
        ->join('users','group_user.user_id','=','users.id')
        ->get(['user_id','name','photo']);

        $admin = $group->admin()->first(['id','name']);
        $user = auth()->user(['id', 'name']);

        $userConfirmedPresence = DB::table('group_user')->where([
        ['user_id', auth()->user()->id],
        ['group_id', $group->id],
        ])->get();
            
        $confirmed = $userConfirmedPresence->count();
        
        $trips = DB::table('trips')
        ->where('group_id', $group->id)
        ->where('return_date', '<', today())
        ->get();
        
        $topics = DB::table('topics')
        ->where('group_id', $group->id)
        ->join('users', 'topics.user_id', '=', 'users.id')
        ->select('topics.id','topics.name as topicName','topics.description','topics.created_at','users.name as userName','users.photo')
        ->orderBy('topics.created_at', 'desc')
        ->paginate(3);
        
        foreach($topics as $key => $tpc)
        {
            $topicMessages = DB::table('topic_messages')
            ->where('topic_id', $tpc->id)
            ->join('users', 'topic_messages.user_id', '=', 'users.id')
            ->get('topic_id');
            
            $answer = $topicMessages->count();
            
            $tpc->answer = $answer;
        }

        $footer = 'true';
        return view('/Groups and Trips/Group/show', compact('footer', 'group', 'admin', 'user', 'confirmed', 'interests', 'confirmedMembers', 'topics', 'trips'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $interests = $this->interests->all(['id', 'name']);

        $group = $this->group->findOrFail($id);

        $selectedInterests = DB::table('group_interest')->where('group_id', $id)->get();
        
        $footer = 'true';

        return view('/Groups and Trips/Group/edit', compact('footer','interests', 'selectedInterests', 'group'));
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
        $interests = $request->get('interests', null);
        $group = $this->group->find($id);

        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            $data['photo'] = $image->store('groups', 'public');
        } else {
            $data['photo'] = 'nophoto';
        }

        $group->update($data);

        $group->interest()->sync($request->interest, false);

        return redirect()->route('group.show', ['id' => $id]);
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

        $group->interest()->detach();

        $group->user()->detach();

        $group->delete();

        return redirect()->route('home');
    }
    
    public function confirmPresence($groupId, $userId) {

        $group = $this->group->find($groupId);

        $user = $this->user->find($userId);

        $group->user()->attach($user);

        return redirect()->route('group.show', ['id' => $groupId]);
    }

    public function cancelPresence($groupId, $userId) {

        $group = $this->group->find($groupId);

        $user = $this->user->find($userId);

        $group->user()->detach($user);

        return redirect()->route('group.show', ['id' => $groupId]);
    }
}
