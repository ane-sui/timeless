<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Http\Requests\StoreBidRequest;
use App\Http\Requests\UpdateBidRequest;
use App\Models\Wallet;
use Illuminate\Http\Request;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $bid = new Bid();
        $bid->amount = $request->amount;
        $bid->product_id = $request->product_id;
        $bid->user_id = auth()->user()->id;

       
        $bid = auth()->user()->bids()->save($bid);
        $product = $bid->product;
        // Check if the user has enough balance in their wallet
        $wallet = Wallet::where('user_id', auth()->user()->id)->first();
        if(!$wallet) {
            return redirect()->back()->with('error', 'Wallet not found.');
        }
        if ($wallet->amount < $request->amount) {
            return redirect()->back()->with('error', 'Insufficient balance in wallet.');
        }
        // Deduct the bid amount from the user's wallet
        Wallet::where('user_id', auth()->user()->id)->decrement('amount', $request->amount);
        

        // Update product price to match the bid amount
        if ($product) {
            $product->price = $bid->amount;
            $product->save();
        }

        if (!$bid) {
            return redirect()->back()->with('error', 'Bid creation failed.');
        }

        return redirect()->back()->with('success', 'Bid created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bid $bid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bid $bid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBidRequest $request, Bid $bid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bid $bid)
    {
        
    }
}
