@extends('layouts.app')


@section('title')
    My Questions | Mini Slack
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('My Questions') }}</div>

                    <div class="card-body">
                        <table class="table table-hover table-stripped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Collective</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $key => $question)
                                    <tr>
                                        <td>{{$key+=1}}</td>
                                        <td>{{$question->title}}</td>
                                        <td>
                                            <span class="badge bg-success">
                                                {{$question->collective->title}}
                                            </span>
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="{{route('questions.show',$question)}}"
                                                 class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{route('questions.edit',$question)}}"
                                                 class="btn btn-sm btn-warning mx-2">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form id="{{$question->id}}" action="{{route('questions.destroy',$question)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="#"
                                                onclick="if(confirm('are you sure ?')) document.getElementById('{{$question->id}}').submit()"
                                                class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{$questions->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
