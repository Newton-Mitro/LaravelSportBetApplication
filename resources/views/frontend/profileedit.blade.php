@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-white text-bold">Edit User Information</h3>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{route('profile.update',\Illuminate\Support\Facades\Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="avatar" class="text-white">Avatar</label>
                                    <div class="custom-file">
                                        <div class="input-group"><span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                   class="btn btn-primary"><i
                                                            class="fa fa-picture-o"></i> Choose</a></span>
                                            <input id="thumbnail" class="form-control" type="text" name="avatar">
                                        </div>
                                        <img id="holder" style="margin-top:15px;max-height:100px;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="text-white">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter Name" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="text-white">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="Email" value="{{$user->email}}" >
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="text-white">Phone</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" name="phone" class="form-control" value="{{$user->phone}}"
                                               data-inputmask='"mask": "99999-999999"' data-mask>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-white">Joined Club</label>
                                    <select class="form-control select2bs4" name="club_id" style="width: 100%;">
                                        <?php
                                        $clubs = \App\Models\Club::all();
                                        foreach($clubs as $club){
                                        if ($user->club_id == $club->id){
                                        ?>
                                        <option name="club_id" selected value="{{$club->id}}">{{$club->club_name}}</option>
                                        <?php
                                        }else{ ?>
                                        <option name="club_id" value="{{$club->id}}">{{$club->club_name}}</option>
                                        <?php   }
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <button type="submit" name="update_user" class="btn btn-sm btn-success">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection