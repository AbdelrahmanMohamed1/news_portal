@extends('layouts.frontend.app')
@section('body')
<br><br><br>

<!-- Breadcrumb Start -->
  <div class="breadcrumb-wrap">
    <div class="container">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
        <li class="breadcrumb-item">Categories</li>
        <li class="breadcrumb-item active">{{ $category->name }}</li>
      </ul>
    </div>
  </div>
  <br><br><br>
  <!-- Breadcrumb End -->
<!-- Main News Start-->
<div class="main-news">
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <div class="row">
          @foreach ($posts_related_to_category as $post)
          <div class="col-md-4">
            <div class="mn-img">
              <img src="{{ $post->images->first()->path }}" />
              <div class="mn-title">
                <a href="{{ route('frontend.show',['slug'=>$post->slug]) }}" target="_blank">{{ $post->title }} ({{ $post->clicked }})</a>
              </div>
            </div>
          </div>
          @endforeach
          {{ $posts_related_to_category->links() }}
        </div>
      </div>


      <div class="col-lg-3">
        <div class="mn-list">
          <h2>Read More</h2>
          <ul>
            @foreach ($more_posts_from_same_category as $post )
            <li><a href="{{ route('frontend.showById',['id'=>$post->id]) }}" target="_blank">{{ $post->title }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>


  </div>
</div>
</div>
<!-- Main News End-->
@endsection