@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Clubs</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Clubs</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="{{route('deposit.index')}}" class="btn btn-sm btn-dark">Deposit Requests</a>
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
                        {{--<th>Method</th>--}}
                        <th>To</th>
                        <th>Form</th>
                        <th>Transaction Code</th>
                        <th>Balance</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($deposits as $deposit)
                        <tr>
                            <td>{{$deposit->created_at->format('d/m/Y')}}</td>
                            <td>{{$deposit->user->name}}</td>
                            <td>{{$deposit->amount}} <span>Tk.</span></td>
                            {{--<td>{{$deposit->method->name}}</td>--}}
                            <td>{{$deposit->to}}</td>
                            <td>{{$deposit->form}}</td>
                            <td>{{$deposit->transaction_code}}</td>
                            <td>{{$deposit->user->balance}}</td>
                            <td class="{{($deposit->status==0)?'text-danger':'text-success'}}">{{($deposit->status==0)?'Processing':'Complete'}}</td>
                            <td>
                                @if($deposit->status==0)
                                    <a href="{{route('deposit.complete',['id'=>$deposit->id])}}"
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
                        {{--<th>Method</th>--}}
                        <th>To</th>
                        <th>Form</th>
                        <th>Transaction Code</th>
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