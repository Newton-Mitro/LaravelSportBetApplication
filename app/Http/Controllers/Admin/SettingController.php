<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::find(1);
        return view('backend.settings.index')->with('setting', $setting);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
//        dd($request->all());
        $setting = Setting::find(1);
        $setting->logo = $request->logo;
        $setting->site_title = $request->site_title;
        $setting->headline = $request->headline;
        $setting->phone = $request->phone;
        $setting->min_bet = $request->min_bet;
        $setting->max_bet = $request->max_bet;
        $setting->min_withdraw = $request->min_withdraw;
        $setting->max_withdraw = $request->max_withdraw;
        $setting->min_deposit = $request->min_deposit;
        $setting->max_deposit = $request->max_deposit;
        if ($request->deposit_enable == 'on') {
            $setting->deposit_enable = 1;
        } else {
            $setting->deposit_enable = 0;
        }
        if ($request->withdraw_enable == 'on') {
            $setting->withdraw_enable = 1;
        } else {
            $setting->withdraw_enable = 0;
        }
        if (Auth::user()->role_id == 1) {
            $setting->bet_sale_commission_rate = $request->bet_sale_commission_rate;
            $setting->club_commission_rate = $request->club_commission_rate;
            $setting->club_min_transfer_amount = $request->club_min_transfer_amount;
            $setting->reference_amount = $request->reference_amount;
            $setting->opening_balance = $request->opening_balance;

        }

        $setting->save();
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
