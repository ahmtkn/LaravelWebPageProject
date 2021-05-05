@extends('admin.layouts.master')
@section('content')
    <div class="row">

        <div class="col-lg-12">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{$post->title}}</h6>{{$post->user->name}}<br> {{$post->created_at}}
                </div>
                <div class="card-body">
                    {{$post->body}}
                </div>
                <div class="card-body">
                    <p><strong>Category:</strong>{{$post->category->name}}</p>
                    <p><strong>Tags:</strong>{{$post->tags->implode('name',', ')}}</p>
                </div>
            </div>

        </div>

    </div>

    </div>
@endsection
