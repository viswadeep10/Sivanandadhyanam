<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SubProgram;
use App\Models\Program;


use Illuminate\Http\Request;

class SubProgramController extends Controller
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
        
      	$data = SubProgram::orderBy('id','ASC')->paginate(10);
        return view('admin.subprogram.index',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $programs = Program::where('status',1)->select('id','name')->get(); 
        return view('admin.subprogram.create',compact('programs'));
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
            'program_id' => 'required'

        ]);
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 1 : 0 ;
        $user = SubProgram::create($input);
        return redirect()->route('subprogram.index')
        ->with('success','Sub Program created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('subprogram::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $subprogram = SubProgram::find($id);
        $programs = Program::where('status',1)->select('id','name')->get(); 
        return view('admin.subprogram.edit',compact('subprogram','programs'));
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
        $subprogram = SubProgram::find($id);
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 1 : 0 ;
        $subprogram->update($input);
        return redirect()->route('subprogram.index')
        ->with('success','Sub Program update successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $subprogram = SubProgram::find($id);

        if($subprogram)
        {
            $subprogram->delete();
            return redirect()->route('subprogram.index')->with('success','Sub Program deleted successfully');
        }
    }
}
