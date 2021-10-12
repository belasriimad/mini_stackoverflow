@extends('layouts.app')


@section('title')
    {{ $question->title }} | Mini Slack
@endsection

@section('content')
    <div class="container"  id="app">
        <div class="row my-5">
            <vote-component id="{{$question->id}}" votes="{{$question->votes}}"></vote-component>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $question->title }}</h4>
                    </div>

                    <div class="card-body">
                        <div class="card-text">
                            {{$question->body}}
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <span class="fw-bold">
                            {{$question->user->name}}
                        </span>
                        <span class="fw-bold">
                            {{$question->created_at->diffForhumans()}}
                        </span>
                    </div>
                </div>
                <comment-component
                    question_id="{{$question->id}}"
                    user_id="{{auth()->check() ? auth()->user()->id : null}}"
                    verified_user="{{auth()->check() && auth()->user()->email_verified_at !== null ? true : false}}"
                        ></comment-component>
            </div>
        </div>
    </div>
@endsection
