@extends('layout')

@section('title', 'Главная')

@section('content')

    <!-- Banner -->
    <section id="banner" class="major">
        <div class="inner">
            <header class="major">
                <h1>{{$home->h1}}</h1>
            </header>
            <div class="content">
                <p>{{$home->description}}</p>
                <ul class="actions">
                    <li><a href="#contact" class="button next scrolly">Get Started</a></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Main -->
    <div id="main">

        <!-- One -->
        <section id="one" class="tiles">
            @foreach($services as $service)

                <article>
									<span class="image">
										<img src="{{ asset('storage/' . $service->image) }}" alt="">
									</span>
                    <header class="major">
                        <h3><a href="landing" class="link">{{$service->name}}</a></h3>
                        <p>{{ $service->description }}</p>
                    </header>
                </article>
            @endforeach
        </section>

        <!-- Two -->
        <section id="two">
            <div class="inner">
                <header class="major">
                    <h2>Massa libero</h2>
                </header>
                <p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis libero. Mauris aliquet magna magna
                    sed nunc rhoncus pharetra. Pellentesque condimentum sem. In efficitur ligula tate urna. Maecenas
                    laoreet massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat
                    tincidunt. Vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus amet pharetra et
                    feugiat tempus.</p>
                <ul class="actions">
                    <li><a href="landing" class="button next">Get Started</a></li>
                </ul>
            </div>
        </section>

    </div>

@endsection
