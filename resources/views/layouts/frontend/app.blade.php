<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>News</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta
      content="Bootstrap News Template - Free HTML Templates"
      name="keywords"
    />
    <meta
      content="Bootstrap News Template - Free HTML Templates"
      name="description"
    />

    <!-- Performance: DNS Prefetch & Preconnect -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com" />
    <link rel="dns-prefetch" href="//fonts.gstatic.com" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="dns-prefetch" href="//code.jquery.com" />
    <link rel="dns-prefetch" href="//stackpath.bootstrapcdn.com" />
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com" />

    <!-- Favicon -->
    <link href="{{ asset("assets/img/") }}/favicon.ico" rel="icon" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap"
      rel="stylesheet"
    />

    <!-- CSS Libraries -->
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link href="{{ asset("assets") }}/lib/slick/slick.css" rel="stylesheet" />
    <link href="{{ asset("assets") }}/lib/slick/slick-theme.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="{{ asset("assets/css/style.css") }}" rel="stylesheet" />

    <!-- Default lazy loading for images -->
    <script>
      (function () {
        function setImgDefaults(img) {
          if (!img.hasAttribute('loading')) img.setAttribute('loading', 'lazy');
          if (!img.hasAttribute('decoding')) img.setAttribute('decoding', 'async');
        }
        var imgs = document.getElementsByTagName('img');
        for (var i = 0; i < imgs.length; i++) setImgDefaults(imgs[i]);
        var obs = new MutationObserver(function (mutations) {
          for (var m = 0; m < mutations.length; m++) {
            var added = mutations[m].addedNodes;
            for (var a = 0; a < added.length; a++) {
              var node = added[a];
              if (node && node.tagName === 'IMG') setImgDefaults(node);
              if (node && node.querySelectorAll) {
                var nested = node.querySelectorAll('img');
                for (var n = 0; n < nested.length; n++) setImgDefaults(nested[n]);
              }
            }
          }
        });
        obs.observe(document.documentElement, { childList: true, subtree: true });
      })();
    </script>
  </head>

  <body>
    
   @include('layouts.frontend.header')

    @yield('body')

    @include('layouts.frontend.footer')

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" defer></script>
    <script src="{{ asset("assets") }}/lib/easing/easing.min.js" defer></script>
    <script src="{{ asset("assets") }}/lib/slick/slick.min.js" defer></script>

    <!-- Template Javascript -->
    <script src="{{ asset("assets/js/main.js") }}" defer></script>
  </body>
</html>
