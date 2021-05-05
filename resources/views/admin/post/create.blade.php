@extends('admin.layouts.master')
@section('content')
    <form method="post" action="{{route('admin.posts.store')}}" class="user">
        @csrf
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" name="title" placeholder="Enter Title">
                @error('title')
                <span role="alert">
                        <small style="color:#f80505">{{$message}}</small>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12 mb-3 mb-sm-0">
            <textarea type="email" class="form-control form-control-user" name="email" placeholder="Post Body">

            </textarea>
                @error('email')
                <span role="alert">
                        <small style="color:#f80505">{{$message}}</small>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="categories">Category</label>
                {{--                <select name="categories"  class="form-control">--}}
                {{--                    @foreach($categories as $category)--}}
                {{--                    <option value="{{$category->id}}">{{$category->name}}</option>--}}
                {{--                    @endforeach--}}
                {{--                </select>--}}
                <select name="categories" class="form-control multiple-select" multiple="multiple">
                    @foreach($categories as $category)--}}
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="tags">Tags</label>
                {{--                <select name="tags[]"  class="form-control">--}}
                {{--                    @foreach($tags as $tag)--}}
                {{--                        <option value="{{$tag->id}}">{{$tag->name}}</option>--}}
                {{--                    @endforeach--}}
                {{--                </select>--}}

                <select name="tags[]" class="form-control multiple-select" multiple="multiple">
                    @foreach($tags as $tag)--}}
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button class="btn btn-primary btn-user btn-block" type="submit">
            Save Post
        </button>
    </form>
@endsection
@section('custom-scripts')
    <script>
        $(document).ready(function () {
            $('.multiple-select').select2();
        });
    </script>
@endsection
