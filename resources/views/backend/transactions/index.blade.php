@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transactions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Transactions</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="{{route('transaction.index')}}" class="btn btn-sm btn-dark">All Transactions</a>
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
                        <th>Transaction ID</th>
                        <th>User Name</th>
                        <th>Transaction Type</th>
                        <th>Dr. Amount</th>
                        <th>Cr. Amount</th>
                        <th>Balance</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <td>{{$transaction->created_at->format('d/m/Y')}}</td>
                            <td>{{$transaction->id}}</td>
                            <td>{{$transaction->user->name}}</td>
                            <td>{{$transaction->transactionType->name}}</td>
                            <td>{{$transaction->dr_amount}}</td>
                            <td>{{$transaction->cr_amount}}</td>
                            <td>{{$transaction->balance}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>Transaction ID</th>
                        <th>User Name</th>
                        <th>Transaction Type</th>
                        <th>Dr. Amount</th>
                        <th>Cr. Amount</th>
                        <th>Balance</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
@endsection