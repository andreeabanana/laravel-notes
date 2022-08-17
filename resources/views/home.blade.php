@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-white">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @guest
                    {{ __('Please log in or register an account.') }}
                    @else
                          <script>window.location = "/notes/index";</script>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
