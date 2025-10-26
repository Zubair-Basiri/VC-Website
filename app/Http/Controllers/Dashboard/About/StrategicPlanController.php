<?php

namespace App\Http\Controllers\Dashboard\About;

use App\Http\Controllers\Controller;
use App\Models\StrategicPlan;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Http\Request;

class StrategicPlanController extends Controller
{
    public function index(){

        $strategicPlans = StrategicPlan::paginate(10);
        return view('dashboard.about.strategicPlan.index',[
            'strategicPlans'=>$strategicPlans
        ]);
    }

    public function create(){
        return view('dashboard.about.strategicPlan.create');
    }

    public function store(Request $request){
        $request->validate([
            'description'=>'required'
        ]);

        StrategicPlan::create([
            'description'=>$request->description
        ]);

        return redirect()->route('strategicPlan.index')->with('success','Strategic Plan added successfully');
    }

    public function show($id){
        //
    }

    public function edit(StrategicPlan $strategicPlan){
        return view('dashboard.about.strategicPlan.edit', compact('strategicPlan'));
    }

    public function update(Request $request, StrategicPlan $strategicPlan){
        $request->validate([
            'description'=>'required'
        ]);

        $strategicPlan->update([
            'description'=>$request->description
        ]);

        return redirect()->route('strategicPlan.index')->with('success','Strategic Plan updated successfully');
    }

    public function destroy(StrategicPlan $strategicPlan){
        $strategicPlan->delete();
        return redirect()->route('strategicPlan.index')->with('success','Strategic Plan deleted successfully');
    }
}
