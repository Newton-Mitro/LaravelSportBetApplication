@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
    <div class="card text-white">
        <div class="card-header">
            <h3 class="card-title">User Transaction History
                style</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>User Name</th>
                    <th>Account Type</th>
                    <th>Dr. Amount (Out)</th>
                    <th>Cr. Amount (In)</th>
                    <th>Balance</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{$transaction->updated_at}}</td>
                        <td>{{$transaction->user->name}}</td>
                        <td>{{$transaction->transactionType->name}}</td>
                        <td>{{$transaction->dr_amount}}<span> tk.</span></td>
                        <td>{{$transaction->cr_amount}}<span> tk.</span></td>
                        <td>{{$transaction->balance}} <span> tk.</span></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Date</th>
                    <th>User Name</th>
                    <th>Account Type</th>
                    <th>Dr. Amount (Out)</th>
                    <th>Cr. Amount (In)</th>
                    <th>Balance</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection