@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
    <div class="card">
        <div class="card-header"><span class="text-white text-bold">Make Withdraw Request</span>
            <a href="{{route('withdraw.history')}}" class="btn btn-sm btn-warning float-right">Show Withdraw History</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('store.withdraw') }}">
                @csrf

                <div class="form-group row">
                    <label for="amount"
                           class="col-md-4 col-form-label text-md-right text-white">Withdraw Amount</label>

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

                <div class="form-group row">
                    <label for="method_id" class="col-md-4 col-form-label text-md-right text-white">Method</label>

                    <div class="col-md-6">
                        <select class="form-control select2bs4" name="method_id" style="width: 100%;">
                            <?php
                            $methods = \App\Models\Method::all();
                            foreach($methods as $method){
                            ?>
                            <option name="method_id" value="{{$method->id}}">{{$method->name}}</option>
                            <?php
                            }
                            ?>
                        </select>

                        @error('method_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="to" class="col-md-4 col-form-label text-md-right text-white">Send To</label>

                    <div class="col-md-6">
                        <input id="to" type="text" class="form-control @error('to') is-invalid @enderror"
                               name="to" value="{{ Auth::user()->phone }}" required autocomplete="to" autofocus maxlength="12">

                        @error('to')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="account_type_id" class="col-md-4 col-form-label text-md-right text-white">Account Type</label>

                    <div class="col-md-6">
                        <select class="form-control select2bs4" name="account_type_id" style="width: 100%;">
                            <?php
                            $accuntTypes = \App\Models\AccountType::all();
                            foreach($accuntTypes as $accuntType){
                            ?>
                            <option name="account_type_id" value="{{$accuntType->id}}">{{$accuntType->name}}</option>
                            <?php
                            }
                            ?>
                        </select>

                        @error('account_type_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            Make Withdraw Request
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
