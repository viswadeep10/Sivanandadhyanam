<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubProgram;
use App\Models\Product;
use App\Models\Faq;
use App\Models\Course;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\Payment;
use App\Models\Coupan;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Mail;



use Illuminate\Http\Request;

class CartController extends Controller
{
    
    public function index()
    {
        
           
        return view('front.cart');
    }
    
    public function addTocart(Request $request)
    {
      $id = $request->id;
      $price = $request->price;
      $course = Course::findOrFail($id); 
      if($course){    
      $cart = session()->get('cart', []);
      $cart[$id] = [
                "name" => $course->name,
                "quantity" => 1,
                "price" => $price,
            ];
        session()->put('cart', $cart);
        $status['success'] = true;
        $status['count'] = count($cart);
          }
          else
            {
        $status['success'] = false;
          }
      return response()->json($status);

    }

    public function removeCart(Request $request)
    {
        if($request->item) {

            $cart = session()->get('cart');

            if(isset($cart[$request->item])) {

                unset($cart[$request->item]);

                session()->put('cart', $cart);

            }
                $status['success'] = true;
                $status['count'] = count($cart);
                return response()->json($status);

        }


    }
  
    public function checkout(Request $request)
    {

        try {
        $api = new Api(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));

        $order = $api->order->create([
            'receipt'         => uniqid(),
            'amount'          => $request->amount * 100, // amount in paise
            'currency'        => 'INR',
            'payment_capture' => 1 // auto-capture
        ]);

        return response()->json([
            'order_id' => $order['id'],
            'amount'   => $request->amount,
            'currency' => 'INR',
            'key'      => env('RAZORPAY_API_KEY'),
        ]);

        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('PAYMENT_STORE_ERROR'.$th->getMessage());
            return response()->json(['success' => false, 'message' => $th->getMessage()]);

        }
    }

    public function verifyPayment(Request $request)
    {
        $signature = $request->razorpay_signature;
        $paymentId = $request->razorpay_payment_id;
        $orderId   = $request->razorpay_order_id;

        $generated_signature = hash_hmac(
            'sha256',
            $orderId . '|' . $paymentId,
            env('RAZORPAY_API_SECRET')
        );

        if ($generated_signature === $signature) {
          
          $res = Payment::create([
                'r_payment_id' => $paymentId,
                'r_order_id'  => $orderId,
                'currency' => "INR",
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->contact,
                'amount' => $request->amount,
                'coupan_id' => $request->coupan_id,
                'status' => 'success',
                'json_response' => json_encode((array) $request->all()),
                'cart'=> json_encode((array) session()->get('cart'))
            ]);
            $checkCoupan = Coupan::find($request->coupan_id);
            if($checkCoupan) 
            {
            $checkCoupan->attemp = $checkCoupan->attemp-1;
            $checkCoupan->save();
            }
            session()->forget('cart');
            $id = $this->encryptString($res->id);
            $link = route('download-assignment',['id'=>$id]);
            $message = 'Hello <br><br>
            Please download your assignment using below link.<br><br>
            ---<br>
            <a href="'.$link.'">Click</a><br>';
            $this->sendMail($request->email,$message);
            $res= \App\Helpers\AppHelper::sendMessage($request->contact,$link);
            if(!$res)
            {
            return response()->json(['success' => false, 'message' => 'Message not sent']);

            }
            return response()->json(['success' => true, 'message' => 'Payment verified successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Signature verification failed!']);
        }
    }

    public function DownloadAassignment(Request $request,$id)
    {
        $items = [];
        if ($request->isMethod('POST')) 
        {
        $pid = $this->DecryptString($id);
        $where['id'] = $pid;
        $verify = $request->verify;
        if (filter_var($verify, FILTER_VALIDATE_EMAIL)) 
        {
        $where['email'] = $verify; 
        } else {
        $where['phone'] = $verify; 
        }

        $payment = Payment::where($where)->first();
        if(!$payment)
        {
        return redirect()->back()->with('error','Verification failed');
        }

        $items = json_decode($payment->cart,true);
        foreach($items as $k=>$item)
        {
            $items[$k]['pdf'] = Course::find($k)->pdf;
        }   
            $success = 'Verification successfully';
   
        return view('front.download-assignment',compact('items','id','success'));

        }

        
        return view('front.download-assignment',compact('items','id'));

    }
    public function ThankYou()
    {
      return view('front.thank-you');
    }

        public function ApplyCoupan(Request $request)
        {
            try {
            $coupan = $request->coupan;
            $checkCoupan = Coupan::where(['title'=>$coupan,'status'=>1])->first();
            if(!$checkCoupan)
            {
            return response()->json(['success' => false, 'message' => 'Invalid Coupan']);
            }
            if($checkCoupan->attemp<1)
            {
            return response()->json(['success' => false, 'message' => 'Coupan Limit Expired !']);
            }
            return response()->json(['success' => true, 'message' => 'Applied Successfully','data'=>$checkCoupan]);
            } 
            catch (\Throwable $th) 
            {
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
           }

        }

    private function sendMail($to,$body)
    {
    $subject = 'Assignment Download';
    $res= Mail::html($body, function ($message) use ($to, $subject) {
        $message->to($to)->subject($subject);
    });
    return $res;
    }

    private function encryptString($string)
    {
    
// Store the cipher method
$ciphering = "AES-128-CTR";

// Use OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;

// Non-NULL Initialization Vector for encryption
$encryption_iv = '1234567891011121';

// Store the encryption key
$encryption_key = "ignouking";

// Use openssl_encrypt() function to encrypt the data
$encryption = openssl_encrypt($string, $ciphering,
            $encryption_key, $options, $encryption_iv);

return $encryption;
    }
    
    private function DecryptString($string)
    {
    $options = 0;
    $ciphering = "AES-128-CTR";
    $decryption_iv = '1234567891011121';
    $decryption_key = "ignouking";
    $decryption=openssl_decrypt ($string, $ciphering, 
        $decryption_key, $options, $decryption_iv);
    return $decryption;
    }
}
