<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Box;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $loans = Loan::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('loans.index', compact('loans'));
    }


    public function create()
    {
        
    
        $boxes = Box::all(); 
    
        return view('loans.create', compact('boxes'));
    }

    public function show(Loan $loan)
    {

        return view('loans.show', compact('loan'));
    }




    public function returnLoan(Loan $loan)
    {
        // Verificar si el préstamo no ha sido devuelto
        if (!$loan->returned) {
            $loan->return_date = now();
            $loan->returned = true;
            $loan->save();
        }

        return redirect()->route('loans.index')->with('success', 'Loan returned successfully.');
    }
}
