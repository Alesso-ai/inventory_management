<?php
 
namespace App\Http\Controllers;
 
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Item;
use App\Models\User;
 
class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
       
 
        return view('loans.index', [
            'loans' => Loan::all()
        ]);
 
 
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create(String $id)
    {
        //devuelve a la vista create con el id del item y todos los objetos para poder hacer un select con ellos
        return view('loans.create', [
            // mandamos el item_id para que sea la opcion predeterminada
            'item_id' => Item::find($id),
            'items' => Item::all()
        ]);
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
 
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
           
            'due_date' => 'required|date'
        ]);
 
        $validated['user_id'] = auth()->id();
        $validated['checkout_date'] = now();
 
        Loan::create($validated);
 
        return redirect(route('loans.index'))->with('success', 'Loan created successfully');
 
 
    }
 
    /**
     * Display the specified resource.
     */
    public function show(Loan $loan):View
    {
        //
        return view('loans.show', [
            'loan' => $loan,
            'item' => $loan->item,
            'user' => $loan->user
        ]);
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        //ponemos la fecha de hoy como returned date l loan que cogemos con id y redirigimos a index
        $loan = Loan::find($id);
        $loan->returned_date = now();
        $loan->save();
        return redirect(route('loans.index'))->with('success', 'Loan returned successfully');


    }
 
    public function returnLoan(Request $request, Loan $loan)
    {
        $loan->update([
            'returned_date' => now(),
        ]);
    
        return redirect(route('loans.index'))->with('success', 'Loan returned successfully');
    }
    
    
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        //
    }

    
}
 