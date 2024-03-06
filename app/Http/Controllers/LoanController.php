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
    public function index(): View
    {


        return view('loans.index', ['loans' => Loan::all()]);
    }


    public function create(): View
    {


        $boxes = Box::all();

        return view('loans.create', compact('loans'));
    }

    public function show(Loan $loan): View
    {

        return view('loans.show', compact('loans'));
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
