<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistricts;
use App\Models\ShipState;
use Carbon\Carbon;

class ShippingAreaController extends Controller
{
    public function AllDivision(){
        $division = ShipDivision::latest()->get();
        return view('backend.ship.division.division_all',compact('division'));
    } // End AllDivision



    public function AddDivision(){
        return view('backend.ship.division.division_add');
    } // End AddDivision



    public function StoreDivision(Request $request){

        ShipDivision::insert([
            'division_name' => $request->division_name,
        ]);

        $notification = array(
            'message' => 'ShipDivision Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.division')->with($notification);

    } // End StoreDivision



    public function EditDivision($id){

        $division = ShipDivision::findOrFail($id);
        return view('backend.ship.division.division_edit',compact('division'));

    } // End EditDivision


    public function UpdateDivision(Request $request){

        $division_id = $request->id;

        ShipDivision::findOrFail($division_id)->update([
            'division_name' => $request->division_name,
        ]);

        $notification = array(
            'message' => 'ShipDivision Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.division')->with($notification);


    } // End UpdateDivision


    public function DeleteDivision($id){

        ShipDivision::findOrFail($id)->delete();

        $notification = array(
            'message' => 'ShipDivision Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    } // End DeleteDivision



    /////////////// District CRUD ///////////////


    public function AllDistrict(){
        $district = ShipDistricts::latest()->get();
        return view('backend.ship.district.district_all',compact('district'));
    } // End AllDistrict



    public function AddDistrict(){
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        return view('backend.ship.district.district_add',compact('division'));
    } // End AddDistrict



    public function StoreDistrict(Request $request){

        ShipDistricts::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
        ]);

        $notification = array(
            'message' => 'ShipDistricts Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.district')->with($notification);

    } // End StoreDistrict



    public function EditDistrict($id){
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistricts::findOrFail($id);
        return view('backend.ship.district.district_edit',compact('district','division'));

    } // End UpdateDistrict


    public function UpdateDistrict(Request $request){

        $district_id = $request->id;

        ShipDistricts::findOrFail($district_id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
        ]);

        $notification = array(
            'message' => 'ShipDistricts Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.district')->with($notification);


    } // End UpdateDistrict


    public function DeleteDistrict($id){

        ShipDistricts::findOrFail($id)->delete();

        $notification = array(
            'message' => 'ShipDistricts Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    } // End DeleteDistrict
}
