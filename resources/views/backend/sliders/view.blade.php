@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Slide</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('slider.index')}}">Sliders</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <a href="{{route('slider.edit',['id'=>$slide->id])}}" class="btn btn-sm btn-success"><i
                    class="fas fa-pen-square"></i> Edit</a>
        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                {{--<li data-target="#demo" data-slide-to="1"></li>--}}
                {{--<li data-target="#demo" data-slide-to="2"></li>--}}
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{$slide->image}}" alt="..." width="100%" height="250px">
                    <div class="carousel-caption d-none d-md-block">
                        @if($slide->title !=null)
                            <h5>{{$slide->title}}</h5>
                        @endif
                        @if($slide->subtitle !=null)
                            <p>{{$slide->subtitle}}</p>
                        @endif
                        @if($slide->description !=null)
                            <p>{{$slide->description}}</p>
                        @endif
                        @if($slide->button_link !=null)
                            <a href="{{url('/')}}/{{$slide->button_link}}"
                               class="btn btn-sm btn-danger">{{$slide->button_title}}</a>
                        @endif
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>

    </section>
@endsection
