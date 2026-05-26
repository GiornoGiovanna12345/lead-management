<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index(){
        $leads=Lead::all();
        return view('leads.index'. compact('leads'));
    }

    public function create(){
        return view('leads.create');
    }

    public function store(Request $request){
        $request->validate(['name'=>'required','email'=>'required|email']);
        Lead::create($request->all());
        return redirect()->route('leads.index')->with('success','Lead created succesfully!');
    }
    
    public function show(Lead $lead){
        return view('leads.show',compact('lead'));
    }

    public function edit(Lead $lead){
        return view('leads.edit',compact('lead'));
    }

    public function store(Request $request, Lead $lead){
        $request->validate(['name'=>'required','email'=>'required|email']);
        $lead->upadte($request->all());
        return redirect()->route('leads.index')->with('success','Lead updated succesfully!');
    }

    public function destroy(Lead $lead){
        $lead->delete();
         return redirect()->route('leads.index')->with('success','Lead deleted succesfully!');
    }
}
