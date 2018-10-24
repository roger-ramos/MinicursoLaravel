<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Blog | Login</title>
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/laravel-blog-logo.png')}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <!-- Bulma Version 0.7.2-->
        <link rel="stylesheet" href="{{asset('css/bulma.min.css')}}" />
    </head>

    <body>
        <section class="hero is-primary is-fullheight">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="column is-4 is-offset-4">
                        <h3 class="title has-text-grey">Laravel Blog</h3>
                        <p class="subtitle has-text-grey">Por favor faça login para continuar.</p>
                        <div class="box">
                            <figure class="avatar">
                                <img width="128" height="128" src="{{asset('images/laravel-blog-logo.png')}}">
                            </figure>
                            <br>
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <span style="color: red;">{{ $error }}</span>
                                @endforeach    
                            @endif
                            <form method="post">
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-medium" type="email" name="email" placeholder="Seu email" autofocus="true">
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input class="input is-medium" type="password" name="password" placeholder="Sua senha">
                                    </div>
                                </div>
                                <button class="button is-block is-info is-medium is-fullwidth">Entrar</button>
                                <br>
                                <a href="criar-conta">Não possui login? Crie sua conta</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>

</html>