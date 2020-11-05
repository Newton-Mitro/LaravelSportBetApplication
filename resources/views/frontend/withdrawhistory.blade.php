@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
    <div class="card text-white">
        <div class="card-header">
            <h3 class="card-title">User Withdraw History</h3>
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
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($withdrawHistorys as $history)
                    <tr>
                        @if($history->status== 1)
                            <td>{{$history->updated_at}}</td>
                        @else
                            <td>{{$history->created_at}}</td>
                        @endif
                        <td>{{$history->user->name}}</td>
                        <td>{{$history->amount}} <span> tk.</span></td>
                        <td>{{$history->method->name}}</td>
                        <td>{{$history->accounttype->name}}</td>
                        <td>{{$history->to}}</td>
                        @if($history->status== 1)
                            <td>Approved</td>
                        @elseif($history->status== 0)
                            <td>Pending</td>
                        @else
                            <td>Canceled</td>
                        @endif
                        <td>
                            @if($history->status ==0)
                                <a href="{{route('withdraw.cancel',['id'=>$history->id])}}" class="btn btn-sm btn-danger">Cancel</a>
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
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection