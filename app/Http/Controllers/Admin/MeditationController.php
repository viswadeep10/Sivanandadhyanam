<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Meditation;


use Illuminate\Http\Request;

class MeditationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
      	$data = Meditation::orderBy('position','ASC')->paginate(10);
        return view('admin.meditation.index',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin.meditation.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'desc' => 'required',
            'image_base64' => 'required',
            'audio' => 'nullable|file|mimes:mp3,wav,ogg,aac|max:15000',


        ]);
        $input = $request->all();
        if($request->audio)
        {
              $audio = time().'.'.$request->audio->getClientOriginalExtension();
              $request->audio->move(public_path('/uploads'), $audio);
              $data['audio'] = $audio;

        }
        $data['name'] = $input['name'];
        $data['position'] = $input['position'];
        $data['desc'] = $input['desc'];
        $data['image'] = $this->storeBase64($input['image_base64']);
        $data['status'] = isset($input['status']) ? 1 : 0 ;
        Meditation::create($data);
        return redirect()->route('meditation.index')
        ->with('success','Meditation created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('Meditation::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $meditation = Meditation::find($id);
        return view('admin.meditation.edit',compact('meditation'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
          $this->validate($request, [
            'name' => 'required',
            'desc' => 'required',
            'audio' => 'nullable|file|mimes:mp3,wav,ogg,aac|max:15000',


        ]);
        $input = $request->all();
        $meditation = Meditation::find($id);
        if($request->audio)
        {
              $this->removeFile(public_path('uploads/').$meditation->audio);
              $audio = time().'.'.$request->audio->getClientOriginalExtension();
              $request->audio->move(public_path('/uploads'), $audio);
              $data['audio'] = $audio;

        }
        $data['image'] = $meditation->image;
        if($input['image_base64'])
        {
              $this->removeFile(public_path('uploads/').$meditation->image);
              $data['image'] = $this->storeBase64($input['image_base64']);

        }
        $data['name'] = $input['name'];
        $data['desc'] = $input['desc'];
        $data['status'] = isset($input['status']) ? 1 : 0 ;
        $data['position'] = $input['position'];
        $meditation->update($data);
        return redirect()->route('meditation.index')
        ->with('success','Meditation update successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $meditation = Meditation::find($id);

        if($meditation)
        {
            $meditation->delete();
            return redirect()->route('Meditations.index')->with('success','Meditation deleted successfully');
        }
    }
}
