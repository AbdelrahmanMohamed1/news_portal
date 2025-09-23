@extends('layouts.frontend.app')

@section('body')

<br><br><br>
<!-- Main News Start-->
      <div class="main-news">
        <div class="container">
          <div class="row">
            <div class="col-lg12">
              <div class="row">

              @if (count($posts) > 0)
              @foreach ($posts as $post)
                  <div class="col-md-4">
                    <div class="mn-img">
                      <img src="{{ $post->images->first()->path }}" />
                      <div class="mn-title">
                        <a href="{{ route('frontend.show', ['slug' => $post->slug]) }}" target="_blank">{{ $post->title }}
                          ({{ $post->clicked }})</a>
                      </div>
                    </div>
                  </div>
                @endforeach
                @else
                <p>No posts found.</p>
                @endif

                

                

              </div>
            </div>
            {{ $posts->links() }}
          </div>
        </div>
      </div>
      <!-- Main News End-->
@endsection