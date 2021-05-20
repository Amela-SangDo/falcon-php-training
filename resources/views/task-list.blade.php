@extends('layouts.app')

@section('title', 'Danh sách task')

@section('content')
    <table class="table table-bordered">
        <tr class="success">
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Assigned user</th>
            <th>Status</th>
        
        </tr>
        @foreach($tasks as $p)
        <tr>
            <td>{{$p->id }}</td>
            <td>{{$p->title }}</td>
            <td>{{$p->description }}</td>
            <td>{{$p->status }}</td>
            
            <td>
                <a href="{{ '/task/' . $p->id . '/edit'}}"><span class="glyphicon glyphicon-pencil">Edit</span></a>
                <a href="{{ '/task/' . $p->id }}"><span class="glyphicon glyphicon-trash">Delete</span></a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection