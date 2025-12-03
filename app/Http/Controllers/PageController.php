<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Category;
use App\Models\SubProgram;
use App\Models\Product;
use App\Models\Faq;
use App\Models\Complaint;
use App\Models\Service;
use App\Models\Contact;
use App\Models\ServicePayment;
use App\Models\Help;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Mail;
use DB;


use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function index()
    {
        return view('front.index');
    }
    
    public function about()
    {
        return view('front.about');
    }
    
    public function assignment($slug)
    {
      $subprograms = NULL;
      if ($slug) 
      {
        $program_id = Program::where('slug',$slug)->value('id');
        $subprograms = SubProgram::where(['program_id'=>$program_id,'status'=>1])->orderBy('name','ASC')->get();
      }
        return view('front.assignment',compact('subprograms'));
    }
    
    public function contact()
    {
      
        return view('front.contact');
    }
    
    public function degree(Request $request)
    {
    if ($request->has('category')) {
        $category_id = decrypt($request->input('category'));
        $faq = Faq::with(['category'=>function($q){
            return $q->select('id','name');
        }])->where(['category_id'=>$category_id,'status'=>1])->first();
      }
      if($faq->pdf)
      {
        $path = asset('storage/uploads/'.$faq->pdf);
        $a = '<a href="'.$path.'" target="_blank">(Free Download)</a>';
        $faq->solution = str_replace('(Free Download)', $a, $faq->solution);
      }
      return view('front.single',compact('faq'));
    }

    public function getContent(Request $request)
    {
        $lang = $request->lang;
        if($lang=='hi')
        {
        $data = Faq::where('id',$request->id)->select('brif_info_hindi as title','solution_hindi as content','pdf')->first();
        $data->content = $data->content.
        '<br>
          <div class="content-wrapper">
            <p>यदि समस्या का समाधान नहीं हुआ है! हमारे विशेषज्ञों से संपर्क करें!</p>
            <p>विशेषज्ञ से बातचीत के समय, सभी आवश्यक दस्तावेज़ जैसे कि आवेदन पत्र, जमा रसीद आदि तैयार रखें और “Talking Time” का पूरा लाभ उठाएं।
          समय-आधारित शुल्क: ₹59 प्रत्येक 5 मिनट के स्लॉट के लिए।
          </p>
          </div>';
        }
        else
        {
        $data = Faq::where('id',$request->id)->select('brief_info as title','solution as content','pdf')->first();
        }
        if($data->pdf)
      {
        $path = asset('storage/uploads/'.$data->pdf);
        $a = '<a href="'.$path.'" target="_blank">(Free Download)</a>';
        $data->content = str_replace('(Free Download)', $a, $data->content);
      }
        return response()->json($data);


    }

    public function getAssignments(Request $request)
    {
      $id = $request->id;
      $products = Product::with('courses')->where(['sub_program_id'=>$id,'status'=>1])->first();
      $cart = session()->get('cart') ? session()->get('cart') : [];
      if($products)
      {
      $data['products'] = $products;
      }
      else
        {
            $data['products'] = [];
        }
      $data['cart'] = $cart;
      return response()->json($data);

    }

    public function saveComplain(Request $request)
    {
      $input = $request->all();
      $res = Complaint::create($input);
      if($res)
      {
       $response = ['success'=>true];
      }
      else
        {
       $response = ['success'=>false];

        }
        return response()->json($response);

    }
    
    public function enquiry(Request $request)
    {
      
      $input = $request->all();
      $res = Contact::create($input);

      if($res)
      {
       $response = ['success'=>true];
      }
      else
        {
       $response = ['success'=>false];
        }
        return response()->json($response);

    }

    public function service(Request $request)
    {
        try {

            $signature = $request->razorpay_signature;
        $paymentId = $request->razorpay_payment_id;
        $orderId   = $request->razorpay_order_id;

        $generated_signature = hash_hmac(
            'sha256',
            $orderId . '|' . $paymentId,
            env('RAZORPAY_API_SECRET')
        );

        if ($generated_signature === $signature) {
            $res = ServicePayment::create([
                'r_payment_id' => $paymentId,
                'r_order_id'     => $orderId,
                'currency' => "INR",
                'email' => $request->email,
                'mobile' => $request->mobile,
                'amount' => $request->amount,
                'status' => 'success',
                'name' => $request->name,
                'programme' => $request->programme,
                'enrolment_no' => $request->enrolment_no,
                'service' => $request->service,
                'other' => $request->other,

            ]);
           
            $service = Service::where('id',$request->service)->value('name');
            $body = 'Name:- '.$request->name.'<br>
            Service:-'.$service.'<br>
            Fess:-'.$request->amount.'
            ';
            $subject = 'Ignou Online Form Fill-up Services';
            $to = $request->email;
           $res= Mail::html($body, function ($message) use ($to, $subject) {
        $message->to($to)->subject($subject);
    });
            return response()->json(['success' => true, 'message' => 'Thanks for payment please check your mail']);
}
        } catch (\Throwable $th) {
           // Log::error('PAYMENT_STORE_ERROR'.$th->getMessage());
            return response()->json(['success' => false, 'message' => $th->getMessage()]);

        }

    }

    public function help(Request $request)
    {
              
              

        try {

            $category = Category::where('id',decrypt($request->category))->value('name');
       $signature = $request->razorpay_signature;
        $paymentId = $request->razorpay_payment_id;
        $orderId   = $request->razorpay_order_id;
        $generated_signature = hash_hmac(
            'sha256',
            $orderId . '|' . $paymentId,
            env('RAZORPAY_API_SECRET')
        );

        if ($generated_signature === $signature) {
            $res = Help::create([
                'r_payment_id' => $paymentId,
                'r_order_id'   => $orderId,
                'currency' => "INR",
                'mobile' => $request->mobile,
                'amount' => $request->amount,
                'status' => 'success',
                'json_response' => NULL,
                'name' => $request->name,
                'programme' => $request->programme,
                'enrolment_no' => $request->enrolment_no,
                'category' => $category,
                'detail' => $request->detail,

            ]);
            return response()->json(['success' => true, 'message' => 'Thanks for payment please we will touch with you']);
      }
        } catch (\Throwable $th) {
           // Log::error('PAYMENT_STORE_ERROR'.$th->getMessage());
            return response()->json(['success' => false, 'message' => $th->getMessage()]);

        }

    }

    public function getFess(Request $request)
    {
          
          $data['service'] = Service::select('name','description','price')->find($request->id);
          return response()->json($data);


    }
}
