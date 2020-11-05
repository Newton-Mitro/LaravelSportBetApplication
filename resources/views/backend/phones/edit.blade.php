@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Method</h3>
            </div>
            <div class="card-body">
                <form action="{{route('update.phone',['id'=>$phone->id])}}" method="post">
                    <div class="row">
                        @csrf

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="name">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                       placeholder="Phone Number" value="{{$phone->phone_number}}" >
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="add_method" class="btn btn-success">Update Number</button>
                </form>
            </div>
        </div>
    </section>

@endsection