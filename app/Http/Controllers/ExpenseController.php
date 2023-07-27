<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return all expenses
        return Expense::orderBy('id', 'DESC')->get();
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
        if(Auth::check()) {
            $newExpense = new Expense();
            $user = Auth::user();
            $newExpense->user_id = $user->id;
            $newExpense->name = $request->expense["name"];
            $newExpense->month = $request->expense["month"];
            $newExpense->year = $request->expense["year"];
            $newExpense->type = $request->expense["type"];
            $newExpense->recurring = $request->expense["recurring"];
            $newExpense->price = $request->expense["price"];
            $newExpense->save();
            return $newExpense;
            
        }
        else {
            Log::info('Authentication Status:', ['is_authenticated' => Auth::check()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
