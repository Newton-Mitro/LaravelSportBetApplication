@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
    <div class="content-header">



        <div class="card text-white">


            <div class="card-body box-profile">
                <div class="profilebg">
                    <div class="rounded">
                    <span class="event-summary__date t-center ml-auto bs float-right" href="#">
    <span class="event-summary__day">{{Auth::user()->balance}}</span><span class="event-summary__month">tk</span>
  </span>
                    </div>
                </div>

                <div class="rounded text-center">
                    @if(Auth::user()->avatar != null)

                    <img class="bs img_circle float-left"
                         src="{{Auth::user()->avatar}}"
                         alt="User profile picture">
                        @else
                        <i class="fas fa-user-alt fa-4x  bs img_circle"></i>
                    @endif
                </div>
                <div class="clearfix"></div>
                <h3 class="profile-username float-left">{{Auth::user()->name}}</h3>
                <h3 class="profile-username pr-2 float-right">User Balance</h3>
                <div class="clearfix"></div>
                <hr>

                <strong><i class="fas fa-phone-square-alt"></i> Mobile</strong>
                <p class="text-white">
                    {{Auth::user()->phone}}
                </p>
                <hr>

                <strong><i class="fas fa-envelope-open-text"></i> Email</strong>
                <p class="text-white">{{Auth::user()->email}}</p>
                <hr>

                <strong><i class="fas fa-cubes"></i> Joined Club</strong>
                <p class="text-white">{{\App\Models\Club::find(Auth::user()->club_id)->club_name}}</p>

                @if(Auth::user()->club != null)
                <strong><i class="fas fa-cubes"></i> Owned Club</strong>
                <p class="text-white">{{Auth::user()->club->club_name}}</p>
                @endif
                @if(Auth::user()->ref_code != null)
                    <strong><i class="fas fa-cubes"></i> User Reference Code</strong>
                    <p class="text-white">{{Auth::user()->ref_code}}</p>
                @endif
                @if(Auth::user()->sponsor_ref_code != null)
                    <strong><i class="fas fa-cubes"></i> Sponsor Name</strong>
                    <p class="text-white">{{\App\User::where('ref_code',Auth::user()->sponsor_ref_code)->get()->first()->name}}</p>
                @endif

                <a href="{{route('profile.edit',['id'=>Auth::user()->id])}}" class="btn bg-success btn-sm"><b>
                        &nbsp;&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;</b></a>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

@endsection