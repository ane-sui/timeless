<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wallet = auth()->user()->wallet; // not paginate, just a single wallet
        return view('wallet.index', compact('wallet'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wallet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'numeric|required|min:0.01',
        ]);
    
        try {
            $user = auth()->user();
            $wallet = Wallet::firstOrNew(['user_id' => $user->id]);
            
            $wallet->amount = isset($wallet->amount) 
                ? $wallet->amount + $validatedData['amount'] 
                : $validatedData['amount'];
                
            $wallet->save();

            return redirect()->route('wallet.index')
                ->with('success', 'Wallet topped up successfully!');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to process transaction')
                ->withInput();
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wallet $wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWalletRequest $request, Wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wallet $wallet)
    {
        //
    }
}
