<head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111378412-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111378412-1');
</script>



<title>{{ $post->title }}</title>

<meta name="description" content="{{ $post->excerpt }}" />



<!-- Schema.org markup for Google+ -->

<meta itemprop="name" content="{{ $post->title }}">

<meta itemprop="description" content="{{ $post->excerpt }}">

<meta itemprop="image" content="{!! Voyager::image( $post->image ) !!}">



<!-- Twitter Card data -->

<meta name="twitter:card" content="summary" />

<meta name="twitter:card" content="{!! Voyager::image( $post->image ) !!}">

<meta name="twitter:site" content="@quanti.com.hr">

<meta name="twitter:title" content="{{ $post->title }}">

<meta name="twitter:description" content="{{ $post->excerpt }}">

<meta name="twitter:creator" content="@quanti.com.hr">

<!-- Twitter summary card with large image must be at least 280x150px -->

<meta name="twitter:image:src" content="{!! Voyager::image( $post->image ) !!}">



<!-- Open Graph data -->

<meta property="og:title" content="{{ $post->title }}" />

<meta property="og:type" content="article" />

<meta property="og:url" content="{{ url("/post/$post->slug") }}" />

<meta property="og:image" content="{!! Voyager::image( $post->image ) !!}" />

<meta property="og:description" content="{{ $post->excerpt }}" />

<meta property="og:site_name" content="{{ setting('site.title') }}" />

<meta property="article:published_time" content="{{ $post->created_at->format("Y-m-d\TH:i:sO") }}" />



</head>



@extends('layouts.app')



@section('content')



<div>

  <div class="container">

    <div class="row">

      <div class="col s12 m12 l12 z-depth-0 postpage-bg-card">

        <div class="card">

          <div class="col s12 m12 l8">

            <div class="col s12 m12 l12 card-image postpage-main-img-bg">

                  <img class="postpage-main-image" src="{!! Voyager::image( $post->image ) !!}">

                  <div class="col s10 m10 l10"><span class="card-title postpage-title">{{ $post->title }}</span></div>

            </div>

            <div class="col s12 m12 l12">

              <br>

              <div class="share-container">

                <div>

                  <a class="share-button share-button-facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ url("/post/$post->slug") }}" target="_blank">

                    <i class="fa fa-facebook" aria-hidden="true"></i>

                    <span>Share on Facebook</span>

                  </a>

                </div>

                <div>

                  <a class="share-button share-button-twitter" href="http://www.twitter.com/intent/tweet?url={{ url("/post/$post->slug") }}" target="_blank">

                    <i class="fa fa-twitter" aria-hidden="true"></i>

                    <span>Share on Twitter</span>

                  </a>

                </div>

                <div>

                  <a class="share-button share-button-googleplus" href="https://plus.google.com/share?url={{ url("/post/$post->slug") }}" target="_blank">

                    <i class="fa fa-google-plus" aria-hidden="true"></i>

                    <span>Share on Google+</span>

                  </a>

                </div>

              </div>

            </div>

          </div>



          <div class="col s12 m12 l4">

            <br />

            <div class="col s12 m12 l12">

              <div class="post-page-infobox center">

                <p>

                  <i class="fa fa-calendar" aria-hidden="true"></i> {{ $post->created_at->format('d.m.Y.') }} <br />

                  <i class="fa fa-user" aria-hidden="true"></i> {{ $post->author->name }} <br />

                  @if ( ($post->photographer) !== NULL)

                    Foto: {{ $post->photographer }}

                  @endif

                </p>

              </div>

            </div>

            <div class="col s12 m12 l12 left">

              <div class="card-content postpage-card-content">

                <p><i>{{ $post->excerpt }}</i></p>

              </div>

            </div>

          </div>

          <div class="col s12 m12 l12 divider"></div>





          <div id="containingDiv" class="col s12 m12 l8">

            <br><br>

            {!! $post->body !!}

          </div>


          <div class="col offset-s1 offset-m1 offset-l1 s10 m5 l3">

            <br>
            <h5 style="text-decoration: underline;">Ostale Novosti</h5>
	    <br>
            @if(!$other_posts->isEmpty())
              @foreach($other_posts as $other_post)
              <a href="/post/{{ $other_post->slug }}"><div class="card z-depth-0">
                <div class="card-image">
                  <img src="{!! Voyager::image(App\Post::thumbnail($other_post->image, 'cropped')) !!}">
                </div>
                <div class="card-content">
                  <p style="text-decoration: none; color: black;">{{ $other_post->title }}</p>
                </div>
              </div></a>
              <div class="col s12 m12 l12 divider"></div>
              @endforeach
            @else
              <p>Nema ostalih novosti</p>
            @endif

          </div>


          <div class="col s12 m8 l8 divider"></div>

          @if((json_decode($post->gallery, true)) != NULL)

              @include('partials.post-page.gallery')

          @endif



      </div>

    </div>



  </div>

</div>



@endsection


