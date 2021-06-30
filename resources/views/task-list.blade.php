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
                <a href="{{ '/task-list/' . $p->id . '/edit'}}">Edit</span></a>
                <a href="{{'/delete-task'}}">Delete</span></a>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $tasks->links() }}
@endsection