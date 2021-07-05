@extends('layouts.app')
@extends('layouts.lang')

@section('title', 'Danh sách task')

@section('content')
    <table class="table table-bordered">
        <tr class="success">
            <th>ID</th>
            <th>{{ __('message.title') }}</th>
            <th>{{ __('message.description') }}</th>
            <th>{{ __('message.assign') }}</th>
            <th>{{ __('message.status') }}</th>
        
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