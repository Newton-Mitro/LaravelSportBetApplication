<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Method;
use App\Models\PhoneNumber;
use Illuminate\Http\Request;

class PhoneNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $methods = Method::all();
        $phones = PhoneNumber::all();
        return view('backend.phones.create')->with('methods',$methods)->with('phones',$phones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phone = new PhoneNumber();
        $phone->method_id = $request->method_id;
        $phone->phone_number = $request->phone_number;
        $phone->save();
        return redirect()->back()->with('success', 'A phone number has been created.');
    }

    public function storemethod(Request $request)
    {
        $method = new Method();
        $method->name = $request->name;
        $method->save();
        return redirect()->back()->with('success', 'A method has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phone = PhoneNumber::find($id);
        return view('backend.phones.edit')->with('phone', $phone);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $phone = PhoneNumber::find($id);
        $phone->phone_number = $request->phone_number;
        $phone->save();
        return redirect()->back()->with('success', 'A phone number has been Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone = PhoneNumber::find($id);
        $phone->delete();
        return redirect()->back()->with('success', 'A phone number has been deleted.');
    }
}
