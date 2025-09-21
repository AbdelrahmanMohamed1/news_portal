@extends('layouts.frontend.app')

@section('body')
  <!-- Breadcrumb Start -->
  <div class="breadcrumb-wrap">
    <div class="container">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('frontend.show', ['slug' => $post->slug]) }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('frontend.show', ['slug' => $post->slug]) }}">News</a></li>
        <li class="breadcrumb-item active">News details</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb End -->

  <!-- Single News Start-->
  <div class="single-news">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <!-- Carousel -->
          <div id="newsCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#newsCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#newsCarousel" data-slide-to="1"></li>
              <li data-target="#newsCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">






              @php
                $toggle = 0;
              @endphp
              @foreach ($post_with_images->images as $key => $image)
                <div class="carousel-item {{ $key == $toggle ? 'active' : '' }}">
                  @php
                    $toggle = $key % 2;
                  @endphp
                  <img src="{{ $image->path }}" class="d-block w-100" alt="First Slide" />
                  <div class="carousel-caption d-none d-md-block">
                    <h5 style="color: white;">{{ $post_with_images->title }}</h5>

                  </div>
                </div>
              @endforeach



              <!-- Add more carousel-item blocks for additional slides -->
            </div>
            <a class="carousel-control-prev" href="#newsCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#newsCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <div class="sn-content">
            {{ $post_with_images->content }}
          </div>

          <!-- Comment Section -->
          <div class="comment-section">
            <!-- Comment Input -->
            <form id="addCommentForm">
            @csrf
              <div class="comment-input">
                <input  name="comment" title="comment" type="text" placeholder="Add a comment..." id="commentBox" />
                <input type="hidden" name="user_id" value="1">
                <input type="hidden" name="post_id" value="{{ $mainPost->id }}">
                <button id="addCommentBtn" type="submit">Comment</button>
              </div>
            </form>



            <div style="display: none;" id="errorMsg" class="alert alert-danger">

            </div>
            <!-- Display Comments -->
            <div class="comments">
              @foreach ($comments_for_post as $comment)
                <div class="comment">

                  <div class="comment-content">
                    <span class="username">{{ $comment->user->name ?? 'Anonymous' }}</span>
                    <p class="comment-text">{{ $comment->content }}</p>
                  </div>
                </div>
              @endforeach

              <!-- Add more comments here for demonstration -->
            </div>

            <!-- Show More Button -->
            <button id="showMoreBtn" class="show-more-btn">Show more</button>
          </div>

          <!-- Related News -->
          <div class="sn-related">
            <h2>Related News</h2>
            <div class="row sn-slider">
              @foreach ($posts as $post)
                <div class="col-md-4">
                  <div class="sn-img">
                    <img src="{{ $post->images->first()->path }}" class="img-fluid" alt="Related News 1" />
                    <div class="sn-title">
                      <a href="{{ route('frontend.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="sidebar">
            <div class="sidebar-widget">
              <h2 class="sw-title">In This Category</h2>
              <div class="news-list">
                @foreach ($catogory_posts as $post)
                  <div class="nl-item">
                    <div class="nl-img">
                      <img src="{{ $post->images->first()->path ?? 'img/news-350x223-1.jpg' }}" />
                    </div>
                    <div class="nl-title">
                      <a href="{{ route('frontend.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                    </div>
                  </div>
                @endforeach

              </div>
            </div>



            <div class="sidebar-widget">
              <div class="tab-news">
                <ul class="nav nav-pills nav-justified">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#popular">Popular</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#latest">Latest</a>
                  </li>
                </ul>

                <div class="tab-content">
                  <!-- popular -->
                  <div id="popular" class="container tab-pane fade show active">
                    @foreach ($popular_three_posts as $post)
                      <div class="tn-news">
                        <div class="tn-img">
                          <img src="{{ $post->images->first()->path ?? 'default.jpg' }}" />
                        </div>
                        <div class="tn-title">
                          <a href="{{ route('frontend.show', ['slug' => $post->slug]) }}">{{ $post->title }}
                            ({{ $post->comments->count() }})</a>
                        </div>
                      </div>
                    @endforeach
                  </div>

                  <!-- latest -->
                  <div id="latest" class="container tab-pane fade">
                    @foreach ($latest_three_posts as $post)
                      <div class="tn-news">
                        <div class="tn-img">
                          <img src="{{ $post->images->first()->path ?? 'default.jpg' }}" />
                        </div>
                        <div class="tn-title">
                          <a href="{{ route('frontend.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>



            <div class="sidebar-widget">
              <h2 class="sw-title">News Category</h2>
              <div class="category">
                <ul>
                  @foreach ($categories_with_posts_count as $category)
                    <li><a
                        href="{{ route('frontend.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a><span>{{ $category->posts_count }}</span>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>


            <div class="sidebar-widget">
              <h2 class="sw-title">Tags Cloud</h2>
              <div class="tags">
                @foreach ($categories_with_posts_count as $category)
                  <a href="{{ route('frontend.category', ['slug' => $category->slug]) }}">{{ $category->name }}
                    {{ $category->posts_count }}</a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Single News End-->
@endsection

@push('scripts')
  <script>
    $(document).on('click', '#showMoreBtn', function (e) {
      e.preventDefault();
      $.ajax({
        url: "{{ route('frontend.show-more-comments', ['slug' => $mainPost->slug]) }}",
        type: 'GET',
        success: function (data) {
          $('.comments').empty();
          $.each(data, function (index, comment) {
            $('.comments').append('<div class="comment"><div class="comment-content"><span class="username">' + comment.user.name + '</span><p class="comment-text">' + comment.content + '</p></div></div>');
            $('#showMoreBtn').hide();
          });
        },
        error: function (data) {
          console.log(data);
        }
      });
    });

    $(document).on('submit', '#addCommentForm', function (e) {
      e.preventDefault();
      
      let formdata = new FormData($(this)[0]);
      $('#commentBox').val('');
      $.ajax({
        url: "{{ route('frontend.add-comment') }}",
        type: 'POST',
        data: formdata,
        processData: false,
        contentType: false,
        success: function (data) {
          //console.log(data);
          $('#errorMsg').hide();
          $('.comments').prepend('<div class="comment"><div class="comment-content"><span class="username">' + data.data.user.name + '</span><p class="comment-text">' + data.data.content + '</p></div></div>');
        },
        error: function (data) {
          var response=$.parseJSON(data.responseText);
          $('#errorMsg').text(response.errors.comment).show();
        }
      });
    });

  </script>
@endpush