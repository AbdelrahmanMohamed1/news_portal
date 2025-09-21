@extends('layouts.frontend.app')

@section('body')

<!-- Top News Start-->
<div class="top-news">
  <div class="container">
    <div class="row">

      @php
      $latestt_three_posts=$posts->take(3);
      @endphp
      <div class="col-md-6 tn-left">
        <div class="row tn-slider">
          @foreach ($latestt_three_posts as $post)
          <div class="col-md-4">
            <div class="tn-img">
              <img src="{{ $post->images->first()->path }}" />
              <div class="tn-title">
                <a href="{{ route('frontend.show',['slug'=>$post->slug]) }}" target="_blank">{{ $post->title }}</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>





      <div class="col-md-6 tn-right">
        <div class="row">


          @foreach ($category_posts as $key=>$postts )
          @if ($key=="Sports Category")
          @foreach ($postts->posts as $post )
          <div class="col-md-6">
            <div class="tn-img">
              <img src="{{ $post->images->first()->path }}" />
              <div class="cn-title">
                <a href="{{ route('frontend.show',['slug'=>$post->slug]) }}" target="_blank">{{ $post->title }}</a>
              </div>
            </div>
          </div>
          @break
          @endforeach
          @endif

          @if ($key=="Business Category")
          @foreach ($postts->posts as $post )
          <div class="col-md-6">
            <div class="tn-img">
              <img src="{{ $post->images->first()->path }}" />
              <div class="cn-title">
                <a href="{{ route('frontend.show',['slug'=>$post->slug]) }}" target="_blank">{{ $post->title }}</a>
              </div>
            </div>
          </div>
          @break
          @endforeach
          @endif

          @if ($key=="Technology Category")
          @foreach ($postts->posts as $post )
          <div class="col-md-6">
            <div class="tn-img">
              <img src="{{ $post->images->first()->path }}" />
              <div class="cn-title">
                <a href="{{ route('frontend.show',['slug'=>$post->slug]) }}" target="_blank">{{ $post->title }}</a>
              </div>
            </div>
          </div>
          @break
          @endforeach
          @endif

          @if ($key=="Health Category")
          @foreach ($postts->posts as $post )
          <div class="col-md-6">
            <div class="tn-img">
              <img src="{{ $post->images->first()->path }}" />
              <div class="cn-title">
                <a href="{{ route('frontend.show',['slug'=>$post->slug]) }}" target="_blank">{{ $post->title }}</a>
              </div>
            </div>
          </div>
          @break
          @endforeach
          @endif
          @endforeach



        </div>
      </div>




    </div>
  </div>
</div>
<!-- Top News End-->

<!-- Category News Start-->
<div class="cat-news">
  <div class="container">
    <div class="row">


      <div class="col-md-6">
        <h2>Sports</h2>
        <div class="row cn-slider">
          @foreach ($category_posts as $key=>$postts )
          @if ($key=="Sports Category")
          @foreach ($postts->posts as $post )
          <div class="col-md-6">
            <div class="cn-img">
              <img src="{{ $post->images->first()->path }}" />
              <div class="cn-title">
                <a href="{{ route('frontend.show',['slug'=>$post->slug]) }}" target="_blank">{{ $post->title }}</a>
              </div>
            </div>
          </div>
          @endforeach
          @endif
          @endforeach
        </div>
      </div>

      <div class="col-md-6">
        <h2>Technology</h2>
        <div class="row cn-slider">
          @foreach ($category_posts as $key=>$postts )
          @if ($key=="Technology Category")
          @foreach ($postts->posts as $post )
          <div class="col-md-6">
            <div class="cn-img">
              <img src="{{ $post->images->first()->path }}" />
              <div class="cn-title">
                <a href="{{ route('frontend.show',['slug'=>$post->slug]) }}" target="_blank">{{ $post->title }}</a>
              </div>
            </div>
          </div>
          @endforeach
          @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- Category News End-->

  <!-- Category News Start-->
  <div class="cat-news">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2>Business</h2>
          <div class="row cn-slider">
            @foreach ($category_posts as $key=>$postts )
            @if ($key=="Business Category")
            @foreach ($postts->posts as $post )
            <div class="col-md-6">
              <div class="cn-img">
                <img src="{{ $post->images->first()->path }}" />
                <div class="cn-title">
                  <a href="{{ route('frontend.show',['slug'=>$post->slug]) }}" target="_blank">{{ $post->title }}</a>
                </div>
              </div>
            </div>
            @endforeach
            @endif
            @endforeach
          </div>
        </div>
        <div class="col-md-6">
          <h2>Health </h2>
          <div class="row cn-slider">
            @foreach ($category_posts as $key=>$postts )
            @if ($key=="Health Category")
            @foreach ($postts->posts as $post )
            <div class="col-md-6">
              <div class="cn-img">
                <img src="{{ $post->images->first()->path }}" />
                <div class="cn-title">
                  <a href="{{ route('frontend.show',['slug'=>$post->slug]) }}" target="_blank">{{ $post->title }}</a>
                </div>
              </div>
            </div>
            @endforeach
            @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Category News End-->


  <!-- Tab News Start-->
  <div class="tab-news">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="pill" href="#featured">Oldest News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" href="#popular">Popular News</a>
            </li>
          </ul>

          <div class="tab-content">
            <div id="featured" class="container tab-pane active">

              @foreach ($oldest_three_news as $post)
              <div class="tn-news">
                <div class="tn-img">
                  <img src="{{ $post->images->first()->path }}" />
                </div>
                <div class="tn-title">
                  <a href="{{ route('frontend.show',['slug'=>$post->slug]) }}" target="_blank">{{ $post->title }}</a>
                </div>
              </div>
              @endforeach


            </div>


            <div id="popular" class="container tab-pane fade">
              @foreach ($popular_three_news as $post)
              <div class="tn-news">
                <div class="tn-img">
                  <img src="{{ $post->images->first()->path }}" />
                </div>
                <div class="tn-title">
                  <a href="{{ route('frontend.show',['slug'=>$post->slug]) }}" target="_blank">{{ $post->title }}({{ $post->comments->count() }})</a>
                </div>
              </div>
              @endforeach
            </div>

          </div>
        </div>

        <div class="col-md-6">
          <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="pill" href="#m-viewed">Latest News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" href="#m-read">Most Read</a>
            </li>
          </ul>

          @php
          $latest_three_posts=$posts->take(3);
          @endphp

          @php
          $top_three_posts=$posts->sortByDesc('clicked')->take(3);
          @endphp

          <div class="tab-content">

            <!-- latest news -->
            <div id="m-viewed" class="container tab-pane active">
              @foreach ($latest_three_posts as $post)
              <div class="tn-news">
                <div class="tn-img">
                  <img src="{{ $post->images->first()->path }}" />
                </div>
                <div class="tn-title">
                  <a href="{{ route('frontend.show',['slug'=>$post->slug]) }}" target="_blank">{{ $post->title }}</a>
                </div>
              </div>
              @endforeach

            </div>


            <div id="m-read" class="container tab-pane fade">
              @foreach ($top_three_posts as $post)
              <div class="tn-news">
                <div class="tn-img">
                  <img src="{{ $post->images->first()->path }}" />
                </div>
                <div class="tn-title">
                  <a href="{{ route('frontend.show',['slug'=>$post->slug]) }}" target="_blank">{{ $post->title }}({{ $post->clicked }})</a>
                </div>
              </div>
              @endforeach
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Tab News Start-->
  <!-- Main News Start-->
  <div class="main-news">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="row">

            @foreach ($posts as $post)
            <div class="col-md-4">
              <div class="mn-img">
                <img src="{{ $post->images->first()->path }}" />
                <div class="mn-title">
                  <a href="{{ route('frontend.show',['slug'=>$post->slug]) }}" target="_blank">{{ $post->title }} ({{ $post->clicked }})</a>
                </div>
              </div>
            </div>
            @endforeach

            {{ $posts->links() }}

          </div>
        </div>

        <div class="col-lg-3">
          <div class="mn-list">
            <h2>Read More</h2>
            <ul>
              @foreach ($read_more_posts as $post )
              <li><a href="{{ route('frontend.showById',['id'=>$post->id]) }}" target="_blank">{{ $post->title }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main News End-->

  @endsection