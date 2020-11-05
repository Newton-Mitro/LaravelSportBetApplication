@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
    <div class="card">
        <div class="card-header text-white text-bold">Request For Club Creation</div>

        <div class="card-body">

            <form method="POST" action="{{ route('club.store') }}" class="pt-3 pb-3">
                @csrf
                <input type="hidden" id="id" name="id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                <div class="form-group row">
                    <label for="club_name" class="col-md-4 col-form-label text-md-right text-white">Club Name</label>

                    <div class="col-md-6">
                        <input id="club_name" type="text" class="form-control @error('club_name') is-invalid @enderror"
                               name="club_name" value="{{ old('club_name') }}"  autofocus placeholder="Club Name" >

                        @error('club_name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-sm btn-danger">
                            Request For Club Creation
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
