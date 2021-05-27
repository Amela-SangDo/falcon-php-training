@extends('layouts.app')

@section('title', 'Update task')

@section('content')
    @if(isset($success))
    <div class="alert alert-success" role="alert">{{ $success }}</div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    {!! Form::open(array('route' => array('update', $tasks->id) , 'class' => 'form-horizontal', 'method' => 'put')) !!}
      <div class="form-group">
         {!! Form::label('title', 'Title', array('class' => 'col-sm-3 control-label')) !!}
         <div class="col-sm-9">
            {!! Form::text('title', $tasks->title, array('class' => 'form-control')) !!}
         </div>
      </div>

      <div class="form-group">
         {!! Form::label('Description', 'Mô tả task', array('class' => 'col-sm-3 control-label')) !!}
         <div class="col-sm-3">
            {!! Form::text('description', $tasks->description, array('class' => 'form-control')) !!}
         </div>
      </div>

      <div class="form-group">
         {!! Form::label('Status', 'Trạng thái task', array('class' => 'col-sm-3 control-label')) !!}
         <div class="col-sm-9">
            {!! Form::textarea('status', $tasks->status, array('class' => 'form-control', 'rows' => 3)) !!}
         </div>
      </div>


      <div class="form-group">
         <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Update task', array('class' => 'btn btn-success')) !!}
         </div>
      </div>
   {!! Form::close() !!}
@endsection