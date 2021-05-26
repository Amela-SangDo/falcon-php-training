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
            <td>{{$p->assign_user }}</td>
            <td>{{$p->status }}</td>
            
            <td>
                <a href="{{ '/product/' . $p->id . '/edit'}}"><span class="glyphicon glyphicon-pencil">Edit</span></a>
                <a href="{{ '/product/' . $p->id }}"><span class="glyphicon glyphicon-trash">Delete</span></a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection