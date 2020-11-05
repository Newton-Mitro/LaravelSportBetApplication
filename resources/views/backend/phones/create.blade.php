@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Method</h3>
            </div>
            <div class="card-body">
                <form action="{{route('store.method')}}" method="post">
                    <div class="row">
                        @csrf

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="name">Method Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Enter Method Name" required >
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="add_method" class="btn btn-success">Add Method</button>
                </form>
            </div>
        </div>
    </section>


    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Phone Number</h3>
            </div>
            <div class="card-body">
                <form action="{{route('store.phone')}}" method="post">
                    <div class="row">
                        @csrf
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label>Method Name</label>
                                <select class="form-control select2bs4" name="method_id" style="width: 100%;">
                                    @foreach($methods as $method)
                                        <option name="method_id" selected
                                                value="{{$method->id}}">{{$method->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                       placeholder="Enter Number">
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="add_phone" class="btn btn-success">Add Phone</button>
                </form>
            </div>
        </div>
    </section>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Method</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($phones as $phone)
                    <tr>
                        <td>{{$phone->id}}</td>
                        <td>{{$phone->method->name}}</td>
                        <td>{{$phone->phone_number}}</td>
                        <td><a href="{{route('edit.phone',['id'=>$phone->id])}}" class="btn btn-sm btn-dark"><i class="fas fa-trash-alt"></i> Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Method</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection