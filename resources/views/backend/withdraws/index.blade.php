@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Withdraws</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Withdraws</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="{{route('withdraw.index')}}" class="btn btn-sm btn-dark">Withdraw Requests</a>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>User Name</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Account Type</th>
                        <th>To</th>
                        <th>Balance</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($withdraws as $withdraw)
                        <tr>
                            <td>{{$withdraw->created_at->format('d/m/Y')}}</td>
                            <td>{{$withdraw->user->name}}</td>
                            <td>{{$withdraw->amount}} <span>Tk.</span></td>
                            <td>{{$withdraw->method->name}}</td>
                            <td>{{$withdraw->accountType->name}}</td>
                            <td>{{$withdraw->to}}</td>
                            <td>{{$withdraw->user->balance}}</td>
                            <td class="{{($withdraw->status==0)?'text-danger':'text-success'}}">
                                @if($withdraw->status== 1)
                                    Approved
                                @elseif($withdraw->status== 0)
                                    Pending
                                @else
                                    Canceled
                                @endif
                            </td>
                            <td>
                                @if($withdraw->status==0)
                                    <a href="{{route('withdraw.complete',['id'=>$withdraw->id])}}"
                                       class="btn btn-sm btn-danger"><i class="fas fa-check-circle"></i> Complete</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>User Name</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Account Type</th>
                        <th>To</th>
                        <th>Balance</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
@endsection