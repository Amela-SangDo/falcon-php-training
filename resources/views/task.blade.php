@extends('layouts.app')
@extends('layouts.lang')

@section('title', 'Amela training')

@section('content')
   {!! Form::open(array('url' => '/task', 'class' => 'form-horizontal', 'method' => 'post')) !!}
      <div class="form-group">
         {!! Form::label('title', Lang::get('message.title'), array('class' => 'col-sm-2 control-label')) !!}
         <div class="col-sm-10">
            {!! Form::text('title', isset($title)?$title:'', array('class' => 'form-control', 'placeholder' => 'Nhập tên task')) !!}
         </div>
      </div>

      <div class="form-group">
         {!! Form::label('description', Lang::get('message.description'), array('class' => 'col-sm-2 control-label')) !!}
         <div class="col-sm-10">
            {!! Form::text('description', isset($description)?$description:'', array('class' => 'form-control', 'placeholder' => 'Mô tả task')) !!}
         </div>
      </div>
      @if (auth()->user()->isAdmin())
      
      <div class="form-group">
         {!! Form::label('assign_user', Lang::get('message.assign'), array('class' => 'col-sm-2 control-label')) !!}
         <div class="col-sm-10">
            {!! Form::text('assign_user', '', array('class' => 'form-control', 'placeholder' => 'Phân nhiệm vụ cho user')) !!}
         </div>
      </div>  
      @endif

      <div class="form-group">
         {!! Form::label('status', Lang::get('message.status'), array('class' => 'col-sm-2 control-label')) !!}
         <div class="col-sm-10">
            {!! Form::textarea('status', '', array('class' => 'form-control', 'placeholder' => 'Trạng thái task', 'rows' => '3')) !!}
         </div>
      </div>

      <div class="form-group">
      <button type="submit" class="btn btn-primary">
         {{ __('message.create') }}
      </button>
      </div>
      
   {!! Form::close() !!}
   <div>
      <a href="{{ route('task-list') }}" class="btn btn-primary">
         {{ __('message.list') }}
      </a>
   </div>
@endsection