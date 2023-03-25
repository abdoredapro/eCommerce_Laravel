<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShippingDivisionController extends Controller
{
    public function divisionManage() {
        $division = Division::orderBy('id','DESC')->get();

        return view('backend.shipping.division',compact('division'));
    }

    public function divisionStore(Request $request) {
        $request->validate([
            'division_name' =>'required'
        ]);
        
        Division::insert([
            'division_name'=>$request->division_name,
            'created_at' => Carbon::now(),
        ]);
    
        $notfication =  array(
            'message' => 'Division Adedd Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notfication);


    }
    public function divisionEdit($id) {
        $division = Division::findOrFail($id);

        return view('backend.shipping.division_edit',compact('division'));

    }

    public function divisionUpdate(Request $request,$id) {

        Division::findOrFail($id)->update([
            'division_name'=> $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notfication =  array(
            'message' => 'Division Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('manage.division')->with($notfication);
    }

    public function divisionDelete($id) {
        Division::findOrFail($id)->delete();
        $notfication =  array(
            'message' => 'Division Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notfication);
    }

    // start district ===============================
    public function districtManage() {
        $district = District::orderBy('id','DESC')->get();
        $division = Division::orderBy('id','DESC')->get();

        return view('backend.shipping.district.district_view',compact('district','division'));
    }
    public function districtStore(Request $request) {
        $request->validate([
            'division_id'=> 'required',
            'district_name'=>'required',
        ]);
        
        District::insert([
            'division_id'=> $request->division_id,
            'district_name'=> $request->district_name,
            'created_at' =>Carbon::now(),
        ]);
        $notfication =  array(
            'message' => 'District Adedd Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notfication);

    }

    public function districtEdit($id) {
        $district = District::findOrFail($id);
        $division = Division::orderBy('id','DESC')->get();

        return view('backend.shipping.district.district_edit',
        compact('district','division'));
    }
    public function districtUpdate(Request $request,$id) {
        $request->validate([
            'division_id'=> 'required',
            'district_name'=>'required',
        ]);
        District::findOrFail($id)->update([
            'division_id'=> $request->division_id,
            'district_name'=> $request->district_name,
            'created_at' =>Carbon::now(),
        ]);

        $notfication =  array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('manage.district')->with($notfication);
    }

    public function districtDelete($id) {
        District::findOrFail($id)->delete();
        $notfication =  array(
            'message' => 'District Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notfication);
    }
    // end district ===============================
    
    // ===================== start state ================
    public function stateManage() {
        $states =  State::orderBy('id','DESC')->get();
        $division = Division::orderBy('id','DESC')->get();
        $district = District::orderBy('id','DESC')->get();
        return view('backend.shipping.state.state_view',
        compact('states','division','district'));
    }
    public function stateStore(Request $request) {

        $request->validate([
            'division_id'=> 'required',
            'district_id'=>  'required',
            'state_name'=>  'required',
        ]);

        State::insert([
            'division_id'=> $request->division_id,
            'district_id'=> $request->district_id,
            'state_name'=> $request->state_name,
        ]);

        $notfication =  array(
            'message' => 'State Adedd Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notfication);

    }
    public function stateEdit($id) {
        $state = State::findOrFail($id);
        $division = Division::orderBy('id','DESC')->get();
        $district = District::orderBy('id','DESC')->get();

        return view('backend.shipping.state.state_edit',
        compact('state','division','district'));

    }
    public function stateUpdate(Request $request,$id) {
        $request->validate([
            'division_id'=>'required',
            'district_id'=>'required',
            'state_name'=>'required',
        ]);

        State::findOrFail($id)->update([
            'division_id'=>$request->division_id,
            'district_id'=>$request->district_id,
            'state_name'=>$request->state_name,
        ]);

        $notfication =  array(
            'message' => 'State Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('manage.state')->with($notfication);
    }

    public function stateDelete($id) {
        State::findOrFail($id)->delete();
        $notfication =  array(
            'message' => 'State Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notfication);
    }
    // ===================== end state ================
    
    public function getProduct() {
        $all = Auth::user();

        return [
            'response_message' => 'All User Done',
            'success' => 'Done'
        ];

    }

}
