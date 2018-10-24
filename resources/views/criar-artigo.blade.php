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
        <section class="articles">
            <div class="column is-8 is-offset-2">
                <div class="card">
                    <h2 class="has-text-centered is-size-2">Crie seu artigo</h2>
                    @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <span style="color: red;">{{ $error }}</span>
                                @endforeach    
                    @endif
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-content">
                            <div class="content">
                                <div class="field">
                                    <div class="control">
                                        <label for="titulo">Imagem:</label>
                                        <div class="file has-name">
                                            <label class="file-label">
                                                <input class="file-input" type="file" name="image" onchange="pegarNomeArquivo(this);">
                                                <span class="file-cta">
                                                <span class="file-icon">
                                                    <i class="fa fa-upload"></i>
                                                </span>
                                                <span class="file-label">
                                                    Escolha um arquivo
                                                </span>
                                                </span>
                                                <span class="file-name" id="file" style="max-width: 100%;">
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <label for="titulo">Título:</label>
                                        <input class="input" type="text" name="title" placeholder="Título do artigo">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <label for="texto">Texto:</label>
                                        <textarea class="textarea" id="texto" name="text" placeholder="Escreva aqui o texto do seu artigo"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="width: 100%;text-align: center;">
                            <button class="button is-success is-medium" type="submit" style="margin: 20px;">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script>
        function pegarNomeArquivo(arquivoRecebido){
            var arquivo = arquivoRecebido.files[0];
            var nomeArquivo = arquivo.name;
            document.getElementById('file').innerText = nomeArquivo;
        }
    </script>
</body>

</html>