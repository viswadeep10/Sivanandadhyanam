<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Program;
use App\Models\SubProgram;
use App\Models\Course;


use Illuminate\Http\Request;

class ProductController extends Controller
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
        
      	$data = Product::orderBy('id','DESC')->paginate(10);
        return view('admin.product.index',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $programes = Program::where('status',1)->select('id','name')->get();
        return view('admin.product.create',compact('programes'));
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
            'program_id' => 'required',
            'sub_program_id' => 'required',
            'price' => 'required',

        ]);
        $input = $request->all();
        if($request->course)
        {
            unset($input['course']);
        }
        $input['status'] = isset($input['status']) ? 1 : 0 ;
        $product = Product::create($input);
        if($request->course)
        {
            foreach($request->course as $k=>$course)
            {
            if (isset($course['pdf'])) 
            {
            $fileName = $k.time().'_'.$course['pdf']->getClientOriginalName();
            $course['pdf']->storeAs('uploads', $fileName, 'public');
            $pdf = $fileName;
            Course::create(['product_id'=>$product->id,'name'=>$course['name'],'pdf'=>$pdf]);
            }
            }
        }
        return redirect()->route('product.index')
        ->with('success','Product created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('Product::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $product = Product::with('courses')->find($id);
        $programes = Program::where('status',1)->select('id','name')->get();
        return view('admin.product.edit',compact('product','programes'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
       
        $this->validate($request, [
            'name' => 'required',
            'program_id' => 'required',
            'sub_program_id' => 'required',
            'price' => 'required',

        ]);
        $input = $request->all();
        if($request->course)
        {
            unset($input['course']);
        }
        $input['status'] = isset($input['status']) ? 1 : 0 ;
        $product = Product::find($id);
        $product->update($input);
        if($request->course)
        {
            foreach($request->course as $k=>$course)
            {
            if (isset($course['pdf'])) 
            {
            $fileName = $k.time().'_'.$course['pdf']->getClientOriginalName();
            $course['pdf']->storeAs('uploads', $fileName, 'public');
            $pdf = $fileName;
            if(isset($course['id']))
            {
                $c = Course::find($course['id']);
                $c->update(['product_id'=>$product->id,'name'=>$course['name'],'pdf'=>$pdf]);
            }
            else
            {
            Course::create(['product_id'=>$product->id,'name'=>$course['name'],'pdf'=>$pdf]);
            }
            }
            }
        }
        return redirect()->route('product.index')
        ->with('success','Product created successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);

        if($product)
        {
            $product->delete();
            return redirect()->route('Product.index')->with('success','Product deleted successfully');
        }
    }

    public function getSubProgram(Request $request)
    {
        $data['sub_program'] = SubProgram::where("program_id", $request->program_id)->get(["name", "id"]);
        return response()->json($data);


    }
}
