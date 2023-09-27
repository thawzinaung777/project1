<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

use PDF;
use Mail;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders=Order::paginate(10);
        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
         

        $file=$request->file('receipt');

        if($file){
            $receipt_photo=$file->getClientOriginalName();
            $file->move('public_path',$receipt_photo);
        }
        else{
            $receipt_photo="none";
        }
        
        $orderid="#".rand(1000,9999);
        $order_date=Date('d-m-y');

       



         Order::create([

            'orderid'=>$orderid,
            'order_date'=>$order_date,
            'order_list'=>$request->order_list,
            'total'=>$request->total,
            'customer_name'=>$request->customer_name,
            'customer_email'=>$request->customer_email,
            'customer_phone'=>$request->customer_phone,
            'customer_address'=>$request->customer_address,
            'payment_type'=>$request->payment_type,
            'payment_receipt'=>$receipt_photo,
            'order_confirm'=>0,
            'order_status'=>"none",
            'arrival_date'=>"none",
            'rider_name'=>"none",
            'rider_contact'=>"none",


         ]);


         $carts=session()->get('cart');
         session()->forget('cart');

      
         //send pdf order file to our customer
         $data["email"] = Auth::user()->email;
         $data["title"] = "From Thaw Zin Web Application";
         $data["orderid"]=$orderid;
         $data["order_date"]=$order_date;
         $data["order_list"]=$request->order_list;
         $data["total"]=$request->total;
         $data["customer_name"]=$request->customer_name;
         $data["customer_email"]=$request->customer_email;
         $data["customer_phone"]=$request->customer_phone;
         $data["customer_address"]=$request->customer_address;
         $data["payment_type"]=$request->payment_type;
         $data["payment_receipt"]=$receipt_photo;
         $data["order_confirm"]=0;
         $data["order_status"]="none";
         $data["arrival_date"]="none";
         $data["rider_name"]="none";
         $data["rider_contact"]="none";
         $data["body"] = "This is Testing";
        
         $pdf = PDF::loadView('emails.orderTemplate', $data);
   
         Mail::send('emails.orderTemplate', $data, function($message)use($data, $pdf) {
             $message->to($data["email"], $data["email"])
                     ->subject($data["title"])
                     ->attachData($pdf->output(), "order.pdf");
         });
   

         return view('order_success',compact('carts'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order=Order::findOrFail($id);
        return view('orders.details',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function checkout(){
        return view('checkout');
    }

    public function process($id){

            $order=Order::findOrFail($id);
            $order->order_status="processing";
           
            $order->save();

            return redirect()->back();

    }
    public function shipped($id){
        $order=Order::findOrFail($id);
        $order->order_status="shipping";
        $order->save();

        return redirect()->back();
    }

    public function route($id){
        $order=Order::findOrFail($id);

        $order->order_status="route";

        $order->save();

        return redirect()->back();
    }

    public function arrived($id){
        $order=Order::findOrFail($id);

        $order->order_status="arrived";

        $order->save();

        return redirect()->back();
    }
    public function orderInfoUpdate(Request $request,$id){
        $order=Order::findOrFail($id);

         $order->arrival_date=$request->arrival_date;
         $order->rider_name=$request->rider_name;
         $order->rider_contact=$request->rider_contact;

        $order->save();

        return redirect()->back();
    }
}
