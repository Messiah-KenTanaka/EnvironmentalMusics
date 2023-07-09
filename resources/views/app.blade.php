<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="title" content="{{ config('meta.general.title') }}">
  <meta name="description" content="{{ config('meta.general.description') }}">
  <meta name="keywords" content="{{ config('meta.general.keywords') }}">
  {{-- Facebook/LINE/TwitterのOGP --}}
  <meta property="og:title" content="{{ config('meta.general.title') }}">
  <meta property="og:description" content="{{ config('meta.general.description') }}">
  <meta property="og:image" content="{{ config('meta.general.image') }}">
  <meta property="og:url" content="{{ config('meta.general.url') }}">
  <meta property="og:type" content="website">
  <meta name="twitter:card" content="summary_large_image">
  {{-- <meta name="twitter:site" content="@ユーザー名"> --}}
  <title>
    @yield('title')
  </title>
  <link rel="icon" type="image/x-icon" href="{{ asset('images/top_image02.jpg') }}" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
  {{--  GoogleAdsense 広告  --}}
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3324255919208405"
    crossorigin="anonymous"></script>
  {{--  JQuery ローディング   --}}
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous">
  </script>
</head>

<body>

  <div id="app">
    @yield('content')
  </div>

  <script src="{{ mix('js/app.js') }}"></script>

  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>
  {{--  GoogleAdsense広告  --}}
  {{--  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3324255919208405"
      crossorigin="anonymous"></script>
  <!-- BCommunity_Display -->
  <ins class="adsbygoogle"
      style="display:block"
      data-ad-client="ca-pub-3324255919208405"
      data-ad-slot="2796753417"
      data-ad-format="auto"
      data-full-width-responsive="true"></ins>
  <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
  </script>  --}}
</body>

</html>
