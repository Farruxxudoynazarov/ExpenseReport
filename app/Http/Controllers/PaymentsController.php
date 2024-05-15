<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PaymentsController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum');
    }


    public function index(){
        // $payments = Auth::user()->payments()->with('category')->get();
        $payments = Auth::user()->payments()->with('category')->get();
        return response()->json($payments);
    }

    public function store(Request $request){

        $request->validate([
            'category_id' => 'required|exists:categories, id',
            'amount' => 'required|numeric',
            'description' => 'required|string'
        ]);

        $payment = Payment::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'description' => $request->description
        ]);

        return response()->json($payment, 201);
    }


    public function show($id){
    //   $
    }

    public function update(){

    }



}
