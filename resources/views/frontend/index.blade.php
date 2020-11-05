@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
    @php
        $setting = \App\Setting::find(1);
    @endphp
    <section>
        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                @foreach($sliders as $key=>$slider)
                    <li data-target="#demo" data-slide-to="{{$slider->id}}" class="{{($key==0)?'active':''}}"></li>
                @endforeach
            </ul>
            <div class="carousel-inner">
                @foreach($sliders as $key=>$slider)
                    <div class="carousel-item {{($key==0)?'active':''}}">
                        <img src="{{$slider->image}}" alt="..." width="100%" height="250px">
                        <div class="carousel-caption d-none d-md-block btb">
                            @if($slider->title !=null)
                                <h5>{{$slider->title}}</h5>
                            @endif
                            @if($slider->subtitle !=null)
                                <p>{{$slider->subtitle}}</p>
                            @endif
                            @if($slider->description !=null)
                                <p>{{$slider->description}}</p>
                            @endif
                            @if($slider->button_link !=null)
                                <a href="{{url('/')}}/{{$slider->button_link}}"
                                   class="btn btn-sm btn-danger">{{$slider->button_title}}</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        <div class="scroll-left bs bg-heading">
            <p class="">{{ $setting->headline }}</p>
        </div>

        <div class="card mt-3">
            <div class=" row customer-logos slider p-3" style="height: 100px">
                <div class="slide text-center">
                    <a href="{{route('index')}}"
                       class="text-white">
                        <img src="{{ asset('dist/img/all.png')}}"
                             class="rounded m-auto" alt="">
                        <div class="">
                            <span class="d-none d-sm-block">ALL</span>
                        </div>
                    </a>
                </div>
                @foreach($sports as $sport)
                    <div class="slide text-center">
                        <a href="{{route('sport.id',['id'=>$sport->id])}}"
                           class="text-white">
                            <img src="{{$sport->icon}}"
                                 class="rounded m-auto" alt="">
                            <div class="">
                                <span class="d-none d-sm-block">{{$sport->name}}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
    <div class="mt-3">
        <?php
        foreach ($selectedSports as $selectedSport) {
        $matches = \App\Models\Match::where('sport_id', $selectedSport->id)
            ->where('status_id', 2)
            ->where('is_open', 1)->get();
        foreach ($matches as $match) { ?>
        <div class="card">
            <div class="card-header">
                <img src="{{$selectedSport->icon}}"
                     class="rounded float-left pr-2" alt="" height="30px">
                <span class="float-left text-bold text-white">{{$selectedSport->name}}</span>
                <div class="">
                    <div class="{{($match->status_id==1)?'bg-danger bs ':''}}">
                        <img src="{{ asset('dist/img/live.gif')}}" alt="" height="30px">

                    </div>
                </div>
            </div>

            <div class="card-body m-2">
                <nav>
                    <div class="row border-secondary mb-2">
                        <div class="col-sm-12 col-md-4 btn btn-sm bg-secondary bs"><span
                                    class="pr-2">{{\App\Models\TeamOrPlayer::find($match->contestant_one)->name}}</span><img src="{{ asset('dist/img/vs.png')}}" height="20px" alt=""><span
                                    class="pl-2">{{\App\Models\TeamOrPlayer::find($match->contestant_two)->name}}</span>
                        </div>
                        <div class="col-sm-12 col-md-3 btn btn-sm bg-warning bs">
                            <span class="pr-2">{{$match->title}}</span>
                        </div>
                        <div class="col-sm-12 col-md-2 btn btn-sm bg-white bs">
                            <span>{{date('d M', strtotime($match->start_date))}}</span> |
                            <span>{{date("g:i a", strtotime($match->start_time))}}</span></div>
                    </div>
                </nav>
                <?php
                $questions = \App\Models\BettingQuestion::where('match_id', $match->id)->get();
                foreach ($questions as $question) { ?>
                <div>
                    <div class="row border-bottom  border-secondary">
                        <div class="col-sm-12 col-md-3 align-middle">
                            <div class="row align-middle h-100 pt-1 pb-1">
                                <div class="col-sm-12 col-md-2 m-auto text-center">
                                    <img src="{{$selectedSport->icon}}"
                                         class="rounded" alt="" height="30px">
                                </div>
                                <div class="col-sm-12 col-md-10 text-bold m-auto text-white">
                                    {{$question->question}} <img src="{{ asset('dist/img/live2.gif')}}" alt=""  height="12px">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-9 border-left border-secondary m-0 p-0">
                            <div class="row m-0 p-0">
                                <?php
                                $choices = \App\Models\BettingChoice::where('betting_question_id', $question->id)->get();
                                foreach ($choices as $choice) { ?>
                                <a href="{{route('create.bet',['id'=>$choice->id])}}"
                                   class="col-4 m-0 p-0">
                                    <div class="bg-secondary bs rounded p-1">
                                        <span>{{$choice->choice_name}}</span><span
                                                class="text-bold text-warning pl-2">   {{$choice->wining_rate}}</span></div>
                                </a>
                                <?php
                                }?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
        <?php }
        }
        ?>
        {{--Show Upcomming Match--}}
        <?php
        foreach ($selectedSports as $selectedSport) {
        $matches = \App\Models\Match::where('sport_id', $selectedSport->id)
            ->where('status_id', 1)
            ->where('is_open', 1)->get();
        foreach ($matches as $match) { ?>
        <div class="card ">
            <div class="card-header text-center">
                <img src="{{$selectedSport->icon}}"
                     class="rounded float-left pr-2" alt="" height="30px">
                <span class="float-left text-bold text-white">{{$selectedSport->name}}</span>
                <div class="ml-auto float-right">
                    <div class="{{($match->status_id==1)?'bg-danger bs ':''}} btn btn-sm">
                        &nbsp;&nbsp; <i class="fas fa-spinner fa-spin"></i> &nbsp; {{$match->status->name}}
                    </div>
                </div>
            </div>

            <div class="card-body m-2">
                <nav>
                    <div class="border-secondary mb-2">
                        <div class="col-sm-12 col-md-4 btn btn-sm bg-secondary bs"><span
                                    class="pr-2">{{\App\Models\TeamOrPlayer::find($match->contestant_one)->name}}</span><img src="{{ asset('dist/img/vs.png')}}" height="20px" alt=""><span
                                    class=" pl-2">{{\App\Models\TeamOrPlayer::find($match->contestant_two)->name}}</span>
                        </div>
                        <div class="col-sm-12 col-md-3 btn btn-sm bg-warning bs">
                            <span class="pr-2">{{$match->title}}</span>
                        </div>
                        <div class="col-sm-12 col-md-2 btn btn-sm bg-white bs">
                            <span>{{date('d M', strtotime($match->start_date))}}</span> |
                            <span>{{date("g:i a", strtotime($match->start_time))}}</span></div>
                    </div>
                </nav>
                <?php
                $questions = \App\Models\BettingQuestion::where('match_id', $match->id)->get();
                foreach ($questions as $question) { ?>
                <div>
                    <div class="row border-bottom border-secondary">
                        <div class="col-sm-12 col-md-3 align-middle">
                            <div class="row align-middle h-100 pt-1 pb-1">
                                <div class="col-sm-12 col-md-2 m-auto text-center">
                                    <img src="{{$selectedSport->icon}}"
                                         class="rounded" alt="" height="30px">
                                </div>
                                <div class="col-sm-12 col-md-10 text-bold m-auto text-white">
                                    {{$question->question}}<span class="m-auto"> <i class="fas fa-spinner fa-spin"></i><span class="text-warning" style="font-size: 10px"> Upcoming</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-9 border-left border-secondary">
                            <div class="row">
                                <?php
                                $choices = \App\Models\BettingChoice::where('betting_question_id', $question->id)->get();
                                foreach ($choices as $choice) { ?>
                                <a href="{{route('create.bet',['id'=>$choice->id])}}"
                                   class="col-4 p-0 m-0">
                                    <div class="bg-secondary bs rounded p-1">
                                        <span>{{$choice->choice_name}}</span><span
                                                class="text-bold text-warning pl-2"> {{$choice->wining_rate}}</span></div>
                                </a>
                                <?php
                                }?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
        <?php }
        }
        ?>
    </div>


@endsection