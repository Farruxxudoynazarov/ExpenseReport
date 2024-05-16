<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\Payment;
use Carbon\Carbon;

class PaymentsController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum');
    }


    public function index(){
            $payments = Payment::where('user_id', Auth::id())->with('category')->get();
            return response()->json($payments);
    }


    public function store(StorePaymentRequest $request){

        $payment = Payment::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'description' => $request->description,
            'type' => $request->type,
            'payment_date' => $request->payment_date    
        ]);

        return response()->json($payment, 201);
    }


   public function show($id)
    {
        $payment = Payment::where('user_id', Auth::id())->with('category')->findOrFail($id);
        return response()->json($payment);
    }


    
    public function update(UpdateCategoryRequest $request, $id){
        $payment = Payment::where('user_id', Auth::id())->findOrFail($id);

        $payment->update([
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'description' => $request->description,
            'type' => $request->type,
            'payment_date' => $request->payment_date
        ]);
        return response()->json($payment);
    }

    

    public function destroy($id)
{
    $payment = Payment::where('user_id', Auth::id())->findOrFail($id);
    $payment->delete();

    return response()->json(['message' => 'Payment deleted']);
}


    public function statistics(Request $request){
        $userId = Auth::id();

        $type = $request->get('type', 'expense');
        $timeFrame = $request->get('timeFrame', 'daily');

        $queary = Payment::where('user_id', $userId)->where('type', $type);

        switch($timeFrame){
            case 'daily':
            $queary->whereDate('payment_date', Carbon::today());
            break;

            case 'weekly':
            $queary->whereBetween('payment_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            break;

            case 'monthly':
            $queary->whereMonth('payment_date', Carbon::now()->month);
            break;

            case 'yearly':
                $queary->whereYear('payment_date', Carbon::now()->year);
                break;
        }
        
        $statistics = $queary->get();
        // logger($statistics);
         return response()->json($statistics);


    
    }



}
