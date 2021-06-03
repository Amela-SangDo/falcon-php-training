@extends('layouts.app')

@section('title', 'Amela training')

@section('content')
   {!! Form::open(array('url' => '/task', 'class' => 'form-horizontal', 'method' => 'post')) !!}
      <div class="form-group">
         {!! Form::label('title', 'Title', array('class' => 'col-sm-2 control-label')) !!}
         <div class="col-sm-10">
            {!! Form::text('title', isset($title)?$title:'', array('class' => 'form-control', 'placeholder' => 'Nhập tên task')) !!}
         </div>
      </div>

      <div class="form-group">
         {!! Form::label('description', 'Description', array('class' => 'col-sm-2 control-label')) !!}
         <div class="col-sm-10">
            {!! Form::text('description', isset($description)?$description:'', array('class' => 'form-control', 'placeholder' => 'Mô tả task')) !!}
         </div>
      </div>
      @if (auth()->user()->isAdmin())
      
      <div class="form-group">
         {!! Form::label('assign_user', 'Assign user', array('class' => 'col-sm-2 control-label')) !!}
         <div class="col-sm-10">
            {!! Form::text('assign_user', '', array('class' => 'form-control', 'placeholder' => 'Phân nhiệm vụ cho user')) !!}
         </div>
      </div>  
      

      @endif

      <div class="form-group">
         {!! Form::label('status', 'Trạng thái', array('class' => 'col-sm-2 control-label')) !!}
         <div class="col-sm-10">
            {!! Form::textarea('status', '', array('class' => 'form-control', 'placeholder' => 'Trạng thái task', 'rows' => '3')) !!}
         </div>
      </div>

      <div class="form-group">
      <button type="submit" class="btn btn-primary">
         {{ __('Create task') }}
      </button>
      </div>
      
   {!! Form::close() !!}
   <div>
      <a href="{{ route('task-list') }}" class="btn btn-primary">
         {{ __('Task list') }}
      </a>
   </div>
@endsection