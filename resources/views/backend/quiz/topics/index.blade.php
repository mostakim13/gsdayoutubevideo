@extends('admin.admin_master')
@section('admin_dashboard_content')

<div class="d-flex" id="wrapper">
    <div class="container">
        <div class="row">
            <h3 class="page-title">Topics</h3>
            <div class="d-flex">
                @foreach($topics as $topic)
                    <div class="card d-flex m-1" style="background-color: #163B4A; border-radius: 10px;">
                        <div class="card-body mb-2">
                            <h5 class="card-title" style="color: #fff">{{$topic->title}}</h5>
                            <h5 class="card-title" style="color: #fff">Time: {{$topic->timer}} minutes</h5>

                            <a href="/topic/questions/view/{{ $topic->id }}" class="inline_block btn btn-primary">Go
                                To Quiz</a>
                            @if(Auth::user())
                                @if(Auth::user()->is_admin == '1')
                                    <a href="{{route('topics-edit', $topic->id)}}"
                                       class="inline_block btn btn-sm btn-warning">Edit</a>
                                       <a href="{{ url('admin/topic-delete/'.$topic->id) }}" class="btn btn-sm btn-danger" type="submit">Delete</a>

                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
