@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
    <div class="card">
        <div class="card-header"><span class="text-bold text-white">Make Deposit Request</span>
            <a href="{{route('deposit.history')}}" class="btn btn-sm btn-warning float-right">Show Diposit History</a>
        </div>


        <div class="card-body">
            <form method="POST" action="{{ route('store.deposit') }}">
                @csrf

                <div class="form-group row">
                    <label for="amount"
                           class="col-md-4 col-form-label text-md-right text-white">Deposit Amount</label>

                    <div class="col-md-6">
                        <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror"
                               name="amount" value="{{ old('amount') }}" required autocomplete="amount">

                        @error('amount')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                {{--<div class="form-group row">--}}
                    {{--<label for="method_id" class="col-md-4 col-form-label text-md-right">Method</label>--}}

                    {{--<div class="col-md-6">--}}
                        {{--<select id="method_id" class="form-control select2bs4" name="method_id" style="width: 100%;">--}}
                            {{--<?php--}}
                            {{--$methods = \App\Models\Method::all();--}}
                            {{--foreach($methods as $method){--}}
                            {{--?>--}}
                            {{--<option name="method_id" value="{{$method->id}}">{{$method->name}}</option>--}}
                            {{--<?php--}}
                            {{--}--}}
                            {{--?>--}}
                        {{--</select>--}}

                        {{--@error('method_id')--}}
                        {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                        {{--@enderror--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="form-group row">
                    <label for="method_id" class="col-md-4 col-form-label text-md-right text-white">Send To</label>

                    <div class="col-md-6">
                        <select id="to" class="form-control select2bs4" name="to" style="width: 100%;">

                            @foreach($numbers as $number){
                            <option name="to" value="{{$number->id}}">{{$number->method->name}} - {{$number->phone_number}}</option>
                           @endforeach
                        </select>

                        @error('to')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="form"
                           class="col-md-4 col-form-label text-md-right text-white">Send From</label>

                    <div class="col-md-6">
                        <input id="form" type="text" class="form-control @error('form') is-invalid @enderror"
                               name="form" value="{{ Auth::user()->phone }}" required autocomplete="form" maxlength="12">

                        @error('form')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="transaction_code" class="col-md-4 col-form-label text-md-right text-white">Transuction Number</label>

                    <div class="col-md-6">
                        <input id="transaction_code" type="text" class="form-control @error('transaction_code') is-invalid @enderror"
                               name="transaction_code" value="{{ old('transaction_code') }}" required autocomplete="transaction_code" autofocus>

                        @error('transaction_code')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            Make Deposit Request
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(function () {
            $(#method_id).change(function () {
                
            })
        })
    </script>
@endsection
