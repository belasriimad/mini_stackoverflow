@extends('layouts.app')


@section('title')
    Home | Mini Slack
@endsection

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Latest Questions') }}</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($questions as $question)
                                <li class="list-group-item d-flex justify-content-between">
                                    <a href="{{route('questions.show',$question)}}" class="text-decoration-none">
                                        {{$question->title}}
                                    </a>
                                    <a href="{{route('collectives.show',$question->collective)}}" class="text-decoration-none">
                                        <span class="badge bg-secondary p-2">
                                            {{$question->collective->title}}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="d-flex justify-content-center my-2">
                            {{$questions->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Categories') }}</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($categories as $category)
                                <li class="list-group-item d-flex justify-content-between">
                                    <a href="{{route('home',$category)}}" class="text-decoration-none">
                                        {{$category->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
