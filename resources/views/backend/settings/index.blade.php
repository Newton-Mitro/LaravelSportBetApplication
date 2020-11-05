@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Site Settings</h3>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form method="POST" action="{{ route('setting.update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">Site Logo</label>

                            <div class="col-md-6">
                                <div class="custom-file">
                                    <div class="input-group"><span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                   class="btn btn-dark text-white"><i
                                                            class="fa fa-picture-o"></i> Choose</a></span>
                                        <input id="thumbnail" class="form-control" type="text" name="logo">
                                    </div>
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="site_title" class="col-md-4 col-form-label text-md-right">Site Title</label>
                            <div class="col-md-6">
                                <input id="site_title" type="text"
                                       class="form-control @error('site_title') is-invalid @enderror" name="site_title"
                                       value="{{ $setting->site_title }}" autocomplete="site_title" autofocus>

                                @error('site_title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="headline" class="col-md-4 col-form-label text-md-right">Headline Slider</label>
                            <div class="col-md-6">
                                <input id="headline" type="text"
                                       class="form-control @error('headline') is-invalid @enderror" name="headline"
                                       value="{{ $setting->headline }}" autocomplete="headline" autofocus>

                                @error('headline')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                            <div class="col-md-6">
                                <input id="phone" type="text"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       name="phone" value="{{ $setting->phone }}" autocomplete="phone"
                                       data-inputmask='"mask": "99999-999999"' data-mask>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="min_bet" class="col-md-4 col-form-label text-md-right">Mimimum Bet Amount</label>
                            <div class="col-md-6">
                                <input id="min_bet" type="number"
                                       class="form-control @error('min_bet') is-invalid @enderror"
                                       name="min_bet"
                                       value="{{ $setting->min_bet }}" autocomplete="min_bet" step="any"
                                       autofocus>

                                @error('min_bet')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="max_bet" class="col-md-4 col-form-label text-md-right">Maximum Bet Amount</label>
                            <div class="col-md-6">
                                <input id="max_bet" type="number"
                                       class="form-control @error('max_bet') is-invalid @enderror"
                                       name="max_bet"
                                       value="{{ $setting->max_bet }}" autocomplete="max_bet" step="any"
                                       autofocus>

                                @error('max_bet')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="min_withdraw" class="col-md-4 col-form-label text-md-right">Minimum Withdraw</label>
                            <div class="col-md-6">
                                <input id="min_withdraw" type="number"
                                       class="form-control @error('min_withdraw') is-invalid @enderror"
                                       name="min_withdraw"
                                       value="{{ $setting->min_withdraw }}" autocomplete="min_withdraw" step="any"
                                       autofocus>

                                @error('min_withdraw')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="max_withdraw" class="col-md-4 col-form-label text-md-right">Maximum Withdraw</label>
                            <div class="col-md-6">
                                <input id="max_withdraw" type="number"
                                       class="form-control @error('max_withdraw') is-invalid @enderror"
                                       name="max_withdraw"
                                       value="{{ $setting->max_withdraw }}" autocomplete="max_withdraw" step="any"
                                       autofocus>

                                @error('max_withdraw')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="min_deposit" class="col-md-4 col-form-label text-md-right">Minimum Deposit</label>
                            <div class="col-md-6">
                                <input id="min_deposit" type="number"
                                       class="form-control @error('min_deposit') is-invalid @enderror"
                                       name="min_deposit"
                                       value="{{ $setting->min_deposit }}" autocomplete="min_deposit" step="any"
                                       autofocus>

                                @error('min_deposit')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="max_deposit" class="col-md-4 col-form-label text-md-right">Maximum Deposit</label>
                            <div class="col-md-6">
                                <input id="max_deposit" type="number"
                                       class="form-control @error('max_deposit') is-invalid @enderror"
                                       name="max_deposit"
                                       value="{{ $setting->max_deposit }}" autocomplete="max_deposit" step="any"
                                       autofocus>

                                @error('max_deposit')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="customSwitch1">Withdraw Enable</label>
                            <div class="col-md-6">
                                <input type="checkbox" {{($setting->withdraw_enable==true)?'checked':''}} class="" id="" name="withdraw_enable">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="customSwitch1">Deposit Enable</label>
                            <div class="col-md-6">
                                <input type="checkbox" {{($setting->deposit_enable==true)?'checked':''}} class="" id="" name="deposit_enable">
                            </div>
                        </div>

                        @if(Auth::user()->role_id == 1)
                            <div class="form-group row">
                                <label for="bet_sale_commission_rate" class="col-md-4 col-form-label text-md-right">Bet Sale Commission Rate</label>
                                <div class="col-md-6">
                                    <input id="bet_sale_commission_rate" type="number"
                                           class="form-control @error('bet_sale_commission_rate') is-invalid @enderror"
                                           name="bet_sale_commission_rate"
                                           value="{{ $setting->bet_sale_commission_rate }}" autocomplete="bet_sale_commission_rate" step="any"
                                           autofocus>

                                    @error('bet_sale_commission_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="club_commission_rate" class="col-md-4 col-form-label text-md-right">Club Commission Rate</label>
                                <div class="col-md-6">
                                    <input id="club_commission_rate" type="number"
                                           class="form-control @error('club_commission_rate') is-invalid @enderror"
                                           name="club_commission_rate"
                                           value="{{ $setting->club_commission_rate }}" autocomplete="club_commission_rate" step="any"
                                           autofocus>

                                    @error('club_commission_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="reference_amount" class="col-md-4 col-form-label text-md-right">Reference Amount</label>
                                <div class="col-md-6">
                                    <input id="reference_amount" type="number"
                                           class="form-control @error('reference_amount') is-invalid @enderror"
                                           name="reference_amount"
                                           value="{{ $setting->reference_amount }}" autocomplete="reference_amount" step="any"
                                           autofocus>

                                    @error('reference_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="opening_balance" class="col-md-4 col-form-label text-md-right">Opening Bonus</label>
                                <div class="col-md-6">
                                    <input id="opening_balance" type="number"
                                           class="form-control @error('opening_balance') is-invalid @enderror"
                                           name="opening_balance"
                                           value="{{ $setting->opening_balance }}" autocomplete="opening_balance" step="any"
                                           autofocus>

                                    @error('opening_balance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="club_min_transfer_amount" class="col-md-4 col-form-label text-md-right">Club Minimum Transfer</label>
                                <div class="col-md-6">
                                    <input id="club_min_transfer_amount" type="number"
                                           class="form-control @error('club_min_transfer_amount') is-invalid @enderror"
                                           name="club_min_transfer_amount"
                                           value="{{ $setting->club_min_transfer_amount }}" autocomplete="club_min_transfer_amount" step="any"
                                           autofocus>

                                    @error('club_min_transfer_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        @endif


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-sm btn-success">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection