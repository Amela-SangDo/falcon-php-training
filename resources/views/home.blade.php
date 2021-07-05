@extends('layouts.app')
@extends('layouts.lang')
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div> 
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('message.login') }}
                    <div>
                    <a href="{{ route('task') }}" class="btn btn-primary">{{ __('message.create') }}</a></div>
                    <div>
      <a href="{{ route('task-list') }}" class="btn btn-primary">
         {{ __('message.list') }}
      </a>
   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
