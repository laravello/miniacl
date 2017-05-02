<!-- Language Navbar -->

    <li><a href="/">{{ Config::get('app.fallback_locale') }} </a></li>

    @foreach(Config::get('app.alt_langs') as $lang)
        <li><a href="/{{ $lang  }}">{{ $lang  }}</a></li>
    @endforeach

<!-- End Language Navbar -->

                            