<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ademir Mazer Junior (Nuno)">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Blog Class</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

<div id="app">
    <header>
        <div class="blog-masthead">
            <div class="container">
                <nav class="nav">
                    <a class="nav-link active" href="{{ url('/') }}">Blog</a>
                    <a class="nav-link" href="{{ url('/admin') }}">Admin</a>
                </nav>
            </div>
        </div>

        <cabecalho
                titulo="Blog Class"
                descricao="Laravel + API + MySQL + VueJs + weex."
        ></cabecalho>
    </header>

    <main role="main" class="container">

        <div class="row">

            <div class="col-sm-12 blog-main">

                @yield('content')

            </div><!-- /.blog-main -->

        </div><!-- /.row -->

    </main><!-- /.container -->

    <footer class="blog-footer">
        <p>Projeto do Professor: Ademir Mazer Junior [ Nuno ] <a href="https://twitter.com/nunomazer">@nunomazer</a>.
        </p>
    </footer>
</div>

<script>
    // configurações para serem utilizadas com a app frontend, vindas de inserções de valores do backend
    function getAppConfig() {
        return {
            url: '{{ asset('/') }}',
        }
    }
</script>

<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('node_modules/jquery/dist/jquery.slim.min.js') }}"></script>
<script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('node_modules/vue/dist/vue.min.js') }}"></script>
<script src="{{ asset('node_modules/http-vue-loader/src/httpVueLoader.js') }}"></script>
<script src="{{ asset('node_modules/axios/dist/axios.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

@stack('scripts')

</body>
</html>

