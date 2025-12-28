<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Schedule;


use Illuminate\Http\Request;

class ScheduleController extends Controller
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
        
      	$data = Schedule::orderBy('position','ASC')->paginate(10);
        return view('admin.schedule.index',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin.schedule.create');
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
            'type' => 'required',
            'image_base64' => 'required',
            'media' => 'nullable|file|max:15000',


        ]);
        $input = $request->all();
        if($request->media)
        {
              $media = time().'.'.$request->audio->getClientOriginalExtension();
              $request->media->move(public_path('/uploads'), $media);
              $data['media'] = $media;

        }
        $data['name'] = $input['name'];
        $data['position'] = $input['position'];
        $data['start_time'] = $input['start_time'];
        $data['poster_image'] = $this->storeBase64($input['image_base64']);
        $data['status'] = isset($input['status']) ? 1 : 0 ;
        Schedule::create($data);
        return redirect()->route('schedule.index')
        ->with('success','Schedule created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('Schedule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $schedule = Schedule::find($id);
        return view('admin.schedule.edit',compact('schedule'));
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
            'type' => 'required',
            'media' => 'nullable|file|max:15000',


        ]);
        $input = $request->all();
        $schedule = Schedule::find($id);
        if($request->media)
        {
              $this->removeFile(public_path('uploads/').$schedule->media);
              $audio = time().'.'.$request->media->getClientOriginalExtension();
              $request->media->move(public_path('/uploads'), $media);
              $data['media'] = $media;

        }
        $data['poster_image'] = $schedule->poster_image;
        if($input['image_base64'])
        {
              $this->removeFile(public_path('uploads/').$schedule->poster_image);
              $data['poster_image'] = $this->storeBase64($input['image_base64']);

        }
        $data['name'] = $input['name'];
        $data['start_time'] = $input['start_time'];
        $data['status'] = isset($input['status']) ? 1 : 0 ;
        $data['position'] = $input['position'];
        $schedule->update($data);
        return redirect()->route('schedule.index')
        ->with('success','Schedule update successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $schedule = Schedule::find($id);

        if($schedule)
        {
            $schedule->delete();
            return redirect()->route('schedule.index')->with('success','Schedule deleted successfully');
        }
    }
}
