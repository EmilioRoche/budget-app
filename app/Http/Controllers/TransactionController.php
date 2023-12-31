<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class TransactionController extends Controller
{
    /**
     * Display the users transactions
     */
    public function index(Request $request): Response
    {
        $userExpense = Transaction::where('user_id', Auth::user()->id)->get();
        return Inertia::render('Expenses/Expenses' , ['Expenses' => $Expenses]);

    }

    /**
     * Create new transaction
     */
    public function create(Request $request): Response
    {
        return Inertia::render('Expenses/CreateNewExpense');
    }
}

