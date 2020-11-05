@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <section class="content text-white">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Change Password</h3>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{route('password.update',\Illuminate\Support\Facades\Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input minlength="8" type="password" class="form-control" id="password"
                                           name="password"
                                           placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input minlength="8" type="password" class="form-control" id="confirm_password"
                                           name="confirm_password"
                                           placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="update_user" class="btn btn-sm btn-success">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection