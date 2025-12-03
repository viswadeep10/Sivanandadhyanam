<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Category;


use Illuminate\Http\Request;

class FaqController extends Controller
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
        $keyword = isset($request->keyword) ? $request->keyword : '';
      	$data = Faq::orderBy('created_at','desc')->where(function ($query) use ($keyword) {
            $query->where('brief_info', "like", "%" . $keyword . "%");
            $query->orWhere('brif_info_hindi', "like", "%" . $keyword . "%");
        })->paginate(10);
        return view('admin.faq.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::select('id','name')->where('status',1)->get();
        return view('admin.faq.create',compact('categories'));
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
            'category_id' => 'required',

        ]);

        $pdf = NULL;
        $input = $request->all();
        if(isset($request->pdf)) {
            $fileName = time().'_'.$request->pdf->getClientOriginalName();
            $request->pdf->storeAs('uploads', $fileName, 'public');
            $pdf = $fileName;

        }
        $input['pdf'] = $pdf;
        $input['status'] = isset($input['status']) ? 1 : 0 ;
        $user = Faq::create($input);
        return redirect()->route('faq.index')
        ->with('success','Faq created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('Faq::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $faq = Faq::find($id);
        $categories = Category::select('id','name')->where('status',1)->get();
        return view('admin.faq.edit',compact('faq','categories'));
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
            'category_id' => 'required',

        ]);
        $faq = Faq::find($id);
        $input = $request->all();
        $pdf = $faq->pdf;
        if(isset($request->pdf)) {
            $fileName = time().'_'.$request->pdf->getClientOriginalName();
            $request->pdf->storeAs('uploads', $fileName, 'public');
            $pdf = $fileName;
        }
        $input['pdf'] = $pdf;
        $input['status'] = isset($input['status']) ? 1 : 0 ;
        $faq->update($input);
        return redirect()->route('faq.index')
        ->with('success','Faq update successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $faq = Faq::find($id);

        if($faq)
        {
            $faq->delete();
            return redirect()->route('faq.index')->with('success','Faq deleted successfully');
        }
    }
}
