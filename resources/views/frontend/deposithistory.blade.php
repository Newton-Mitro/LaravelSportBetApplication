@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
    <div class="card text-white">
        <div class="card-header">
            <h3 class="card-title">User Deposit History
                style</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Method</th>
                    <th>To</th>
                    <th>Form</th>
                    <th>Amount</th>
                    <th>Transaction Code</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($depositHistorys as $depositHistory)
                    <tr>
                        @if($depositHistory->status == 1)
                            <td>{{$depositHistory->updated_at}}</td>
                        @else
                            <td>{{$depositHistory->created_at}}</td>
                        @endif
                        <td>{{$depositHistory->method->name}}</td>
                        <td>{{$depositHistory->to}}</td>
                        <td>{{$depositHistory->form}}</td>
                        <td>{{$depositHistory->amount}}</td>
                        <td>{{$depositHistory->transaction_code}}</td>
                        <td>{{($depositHistory->status == 1)?'Approved':'Pending'}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Date</th>
                    <th>Method</th>
                    <th>To</th>
                    <th>Form</th>
                    <th>Amount</th>
                    <th>Transaction Code</th>
                    <th>Status</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection