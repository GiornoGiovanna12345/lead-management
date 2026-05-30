<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    public function index(){
        if(Auth::user()->role=='admin'){
            $leads=Lead::all();
        }else{
            $leads=Lead::where('assigned_to',Auth::id())->get();
        }
        return view('leads.index',compact('leads'));
    }

    public function create(){
        $staff=User::where('role','staff')->get();
        return view('leads.create'.compact('staff'));
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
        $staff=User::where('role','staff')->get();
        return view('leads.edit',compact('lead','staff'));
    }

    public function update(Request $request, Lead $lead){
        $request->validate(['name'=>'required','email'=>'required|email']);
        $lead->update($request->all());
        return redirect()->route('leads.index')->with('success','Lead updated succesfully!');
    }

    public function destroy(Lead $lead){
        $lead->delete();
         return redirect()->route('leads.index')->with('success','Lead deleted succesfully!');
    }
}
