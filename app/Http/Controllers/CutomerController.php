<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Hash;

class CutomerController extends Controller
{
    public function index(Request $request)
    {
        $url = url("/customer");
        $title = "Customer Registration";
        $data = compact('url', 'title');    
        return view('customer')->with($data);
    }
    public function store(Request $request)
    {

        // echo "<pre>";
        // print_r($request->all());

        // laravel in insert query
        $customer = new Customers;
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->dob = $request['dob'];
        $customer->address = $request['address'];
        $customer->password = Hash::make($request['password']);
        // $customer->status = $request['status'];
        $customer->points = $request['points'];
        $customer->save();

        return redirect("/customer/view");
    }
    public function view(Request $request)
    {
        $search = $request['search'] ?? ""; 
        
        if($search != ""){
            // where
            $customers = Customers::where('name','LIKE','%'.$search.'%')->orWhere('email','LIKE','%'.$search.'%')->paginate(5);
            // dd($customers);
        }else{

            $customers = Customers::paginate(5);
        }
        $data = compact("customers");
        return view("customer-view")->with($data);
    }

    public function trash()
    {
        $customers = Customers::onlyTrashed()->get();
        return view("customer-trash", compact("customers"));
    }

    public function delete($id)
    {
        $customer = Customers::find($id)->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $customer = Customers::withTrashed()->find($id);

        if (!is_null($customer)) {
            $customer->restore();
        }
        return redirect('/customer/view');
    }

    public function forceDelete($id)
    {
        $customer = Customers::withTrashed()->find($id);

        if (!is_null($customer)) {
            $customer->forceDelete();
        }
        return redirect('/customer/trash');
    }

    public function edit($id)
    {
        $customer = Customers::find($id);

        if (is_null($customer)) {
            // not  found
            return redirect('customer/view');
        } else {
            $title = "Upadate Customer";
            $url = url("/customer/update") . "/" . $id;
            $data = compact('customer', 'url', 'title');
            return view('customer')->with($data);
        }
    }
    public function update($id, Request $request)
    {
        $customer = Customers::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->dob = $request['dob'];
        $customer->address = $request['address'];
        $customer->password = Hash::make($request['password']);
        // $customer->status = $request['status'];
        $customer->points = $request['points'];
        $customer->save();
        return redirect("/customer/view");
    }
}
