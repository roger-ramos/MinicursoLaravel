<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Blog</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/laravel-blog-logo.png')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Bulma Version 0.7.2-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/blog.css')}}">
</head>

<body>
    @include('layouts.navbar')
    <div class="container" style="margin-top: 20rem;">
        <!-- START ARTICLE FEED -->
        <section class="articles">
            @foreach($artigos as $artigo)
            <div class="column is-8 is-offset-2">
                <!-- START ARTICLE -->
                <div class="card article">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-center">
                                <img src="http://www.radfaces.com/images/avatars/daria-morgendorffer.jpg" class="author-image" alt="Placeholder image">
                            </div>
                            <div class="media-content has-text-centered">
                                @if ($artigo->image_location)
                                    <img src="{{ Storage::disk('public')->url($artigo->image_location) }}" width="300" height="300"/>
                                @endif
                                <p class="title article-title"><a href="/artigo/{{$artigo->slug}}" style="color: #363636;">{{ $artigo->title }}</a></p>
                                <p class="subtitle is-6 article-subtitle">
                                    <a>{{ $artigo->author->name }}</a> em {{ $artigo->created_at->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>
                        <div class="content article-body">
                            <p>
                                {{ str_limit($artigo->text, 100) }}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END ARTICLE -->
            </div>  
            @endforeach
        </section>
        <!-- END ARTICLE FEED -->
    </div>
</body>

</html>