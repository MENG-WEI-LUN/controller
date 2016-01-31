@extends('layouts.master')

@section('title', '文章列表')

@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{ asset('img/home-bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>文章列表</h1>
                    <hr class="small">
                    <span class="subheading">歡迎瀏覽本平台文章</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        
            <div class="text-right">
                <a href="{{route('posts.create')}}" class="btn btn-primary" role="button">新增</a>
            </div>
            @foreach($errors->all() as $error)
                {{session('message')}}
            @endforeach
            @foreach($posts as $post)
            <div class="post-preview">
                <a href="{{ route('posts.show', $post->id) }}">
                    <h2 class="post-title">
                     {{$post->id}} -    {{ $post->title }}
                    </h2>
                    <h3 class="post-subtitle">
                        {{$post->sub_title}}
                    </h3>
                </a>
                <p class="post-meta">由 <a href="#">Start Bootstrap</a> 發表於 {{$post->created_at->diffForHumans()}}{{$post->created_at->format('--Y/m/d')}}</p>
            </div>
            <hr>
            @endforeach
            
            <!-- Pager -->
            <nav class="text-center">
               {!!$posts->render()!!}
            </nav>
        </div>
    </div>
</div>
@endsection