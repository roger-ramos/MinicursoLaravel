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

    <div style="margin-top: 20rem;">
        <!-- START ARTICLE FEED -->
        <section class="articles">
            <div class="column is-8 is-offset-2">
                <!-- START ARTICLE -->
                <div class="card article">
                    @if (Auth::check() && (Auth::id() == $artigo->author->id ))
                    <div class="card-header" style="box-shadow:unset;padding: 10px;">
                        <a href="/artigo/editar/{{ $artigo->slug }}" class="button" style="margin-right:10px;"><i class="fa fa-edit"></i></a>
                        <a href="/artigo/remover/{{ $artigo->slug }}" class="button"><i class="fa fa-remove"></i></a>
                    </div>
                    @endif
                    <div class="card-content">
                        <div class="media">
                            <div class="media-center">
                                <img src="http://www.radfaces.com/images/avatars/angela-chase.jpg" class="author-image" alt="Placeholder image">
                            </div>
                            <div class="media-content has-text-centered">
                                @if ($artigo->image_location)
                                    <img src="{{ Storage::disk('public')->url($artigo->image_location) }}" width="300" height="300"/>
                                @endif
                                <p class="title article-title"> {{ $artigo->title }}</p>
                                <p class="subtitle is-6 article-subtitle">
                                    <a href="#">{{$artigo->author->name}}</a> em {{ $artigo->created_at->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>
                        <div class="content article-body">
                                {{$artigo->text}}    
                        </div>
                        <div class="card-footer">
                            <div class="comments-container">
                                <h1>Comentários</h1>
                                <ul id="comments-list" class="comments-list">
                                    <li>
                                        <div class="comment-main-level">
                                            <!-- Avatar -->
                                            <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                                            <!-- Conteúdo do comentário -->
                                            <div class="comment-box">
                                                <div class="comment-head">
                                                    <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Angela</a></h6>
                                                </div>
                                                <div class="comment-content">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="comment-main-level">
                                            <!-- Avatar -->
                                            <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
                                            <!-- Conteúdo do comentário -->
                                            <div class="comment-box">
                                                <div class="comment-head">
                                                    <h6 class="comment-name"><a href="http://creaticode.com/blog">Carlos Vinicius</a></h6>
                                                </div>
                                                <div class="comment-content">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <br>
                                <h1 style="font-size: 25px;">Adicione seu comentário</h1>
                                <form action="" method="post">
                                    <textarea class="textarea" name="text" placeholder="Escreva aqui o seu comentário"></textarea>
                                    <button class="button is-success is-medium" type="submit" style="float: right;;margin-top: 10px;">Comentar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END ARTICLE -->
        </section>
        <!-- END ARTICLE FEED -->
    </div>
</body>

</html>