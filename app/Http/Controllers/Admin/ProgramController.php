<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Program;


use Illuminate\Http\Request;

class ProgramController extends Controller
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
        
      	$data = Program::orderBy('order_no','ASC')->paginate(10);
        return view('admin.program.index',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin.program.create');
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

        ]);
        $input = $request->all();
        $image = NULL;
        if(isset($request->image)) {
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $request->image->storeAs('uploads', $fileName, 'public');
            $image = $fileName;

        }
        $input['image'] = $image;
        $input['status'] = isset($input['status']) ? 1 : 0 ;
        $user = Program::create($input);
        return redirect()->route('program.index')
        ->with('success','Program created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('Program::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $program = Program::find($id);
        return view('admin.program.edit',compact('program'));
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

        ]);
        $program = Program::find($id);
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 1 : 0 ;
        $image = $program->image;
        if(isset($request->image)) {
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $request->image->storeAs('uploads', $fileName, 'public');
            $image = $fileName;

        }
        $input['image'] = $image;
        $program->update($input);
        return redirect()->route('program.index')
        ->with('success','Program update successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $program = Program::find($id);

        if($program)
        {
            $program->delete();
            return redirect()->route('Program.index')->with('success','Program deleted successfully');
        }
    }
}
