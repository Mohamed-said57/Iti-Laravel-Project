{{-- resources/views/movies/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Movies</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', Arial, sans-serif;
            background: #ffffff;
            color: #222222;
        }

        .topbar {
            height: 52px;
            border-bottom: 1px solid #dcdcdc;
            background: #ffffff;
        }

        .topbar-inner {
            height: 100%;
            max-width: 1450px;
            margin: 0 auto;
            display: flex;
            align-items: center;
        }

        .logo {
            width: 150px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-right: 1px solid #e1e1e1;
            font-size: 25px;
            font-weight: 700;
            letter-spacing: -1.5px;
            color: #222;
        }

        .logo span {
            color: #777;
        }

        .menu-button {
            width: 60px;
            height: 52px;
            border: 0;
            background: #eeeeee;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .menu-button svg {
            width: 24px;
            height: 24px;
            color: #555;
        }

        .search-area {
            display: flex;
            align-items: center;
            margin-left: 18px;
            flex: 1;
            max-width: 620px;
        }

        .category {
            width: 80px;
            height: 36px;
            border: 0;
            background: transparent;
            font-size: 14px;
            font-weight: 600;
            color: #222;
            cursor: pointer;
        }

        .search-box {
            height: 36px;
            flex: 1;
            border: 1px solid #d4d4d4;
            background: #fff;
            padding: 0 14px;
            font-size: 18px;
            color: #333;
            outline: none;
        }

        .search-box:focus {
            border-color: #999;
        }

        .search-button {
            width: 36px;
            height: 36px;
            border: 0;
            margin-left: 8px;
            background: #ededed;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .search-button svg {
            width: 18px;
            height: 18px;
            color: #555;
        }

        .top-links {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 22px;
            font-size: 14px;
            color: #555;
        }

        .top-links a {
            text-decoration: none;
            color: #555;
            transition: color .2s ease;
        }

        .top-links a:hover {
            color: #000;
        }

        .separator {
            color: #bdbdbd;
        }

        .hero-title {
            height: 135px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f7f7f7;
            border-bottom: 1px solid #e4e4e4;
        }

        .hero-title h1 {
            margin: 0;
            font-size: 38px;
            font-weight: 700;
            letter-spacing: 4px;
            color: #222;
        }

        .content {
            max-width: 1430px;
            margin: 0 auto;
            padding: 85px 25px 80px;
        }

        .section {
            margin-bottom: 70px;
        }

        .section-heading {
            display: flex;
            align-items: center;
            margin-bottom: 28px;
        }

        .section-heading h2 {
            margin: 0;
            padding-bottom: 7px;
            font-size: 29px;
            font-weight: 700;
            letter-spacing: 2px;
            color: #222;
            text-transform: uppercase;
        }

        .section-line {
            flex: 1;
            height: 1px;
            margin-left: 18px;
            background: #d9d9d9;
        }

        .movies-grid {
            display: grid;
            grid-template-columns: repeat(6, minmax(0, 1fr));
            gap: 38px;
        }

        .movie-card {
            min-width: 0;
        }

        .poster-wrapper {
            position: relative;
            width: 100%;
            aspect-ratio: 2 / 3;
            overflow: hidden;
            background: #eeeeee;
            border: 1px solid #dedede;
        }

        .poster-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform .3s ease;
        }

        .movie-card:hover .poster-wrapper img {
            transform: scale(1.035);
        }

        .movie-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.08);
            opacity: 0;
            transition: opacity .25s ease;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding: 14px;
        }

        .movie-card:hover .movie-overlay {
            opacity: 1;
        }

        .edit-button {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 7px;
            padding: 9px 12px;
            background: rgba(255, 255, 255, .94);
            border: 1px solid #ddd;
            color: #222;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .edit-button:hover {
            background: #fff;
        }

        .movie-title {
            margin-top: 17px;
            min-height: 42px;
            text-align: center;
            color: #707070;
            font-size: 15px;
            line-height: 1.45;
            font-weight: 500;
        }

        .movie-meta {
            margin-top: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            color: #999;
            font-size: 12px;
        }

        .rating {
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .rating svg {
            width: 13px;
            height: 13px;
            color: #888;
        }

        .actions {
            margin-top: 13px;
            display: flex;
            justify-content: center;
            gap: 7px;
            opacity: 0;
            transition: opacity .2s ease;
        }

        .movie-card:hover .actions {
            opacity: 1;
        }

        .action-button {
            padding: 6px 10px;
            border: 1px solid #d7d7d7;
            background: white;
            color: #555;
            font-size: 11px;
            text-decoration: none;
            cursor: pointer;
        }

        .action-button:hover {
            background: #f4f4f4;
        }

        .delete-button {
            color: #b14b4b;
        }

        .empty-state {
            max-width: 600px;
            margin: 0 auto;
            padding: 70px 20px;
            text-align: center;
            color: #777;
        }

        .empty-state svg {
            width: 58px;
            height: 58px;
            margin-bottom: 20px;
            color: #aaa;
        }

        .empty-state h2 {
            margin: 0;
            font-size: 28px;
            color: #333;
        }

        .empty-state p {
            margin: 12px 0 25px;
            font-size: 14px;
            line-height: 1.7;
        }

        .add-movie {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 18px;
            background: #333;
            color: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .add-movie:hover {
            background: #111;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .movies-grid {
                grid-template-columns: repeat(5, minmax(0, 1fr));
            }

            .top-links {
                display: none;
            }
        }

        @media (max-width: 950px) {
            .movies-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .search-area {
                max-width: none;
            }
        }

        @media (max-width: 700px) {
            .logo {
                width: 120px;
                font-size: 21px;
            }

            .menu-button {
                width: 50px;
            }

            .category {
                display: none;
            }

            .search-area {
                margin-left: 10px;
            }

            .hero-title {
                height: 105px;
            }

            .hero-title h1 {
                font-size: 30px;
            }

            .content {
                padding-top: 55px;
            }

            .movies-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 28px 18px;
            }

            .section-heading h2 {
                font-size: 23px;
            }
        }

        @media (max-width: 430px) {
            .logo {
                width: 100px;
                font-size: 18px;
            }

            .menu-button {
                width: 45px;
            }

            .search-button {
                display: none;
            }

            .search-box {
                font-size: 15px;
            }

            .movies-grid {
                gap: 25px 14px;
            }
        }
    </style>
</head>

<body>

    <!-- TOP NAVIGATION -->
    <header class="topbar">
        <div class="topbar-inner">

            <div class="logo">
                digital<span>ia</span>
            </div>

            <button class="menu-button" type="button" aria-label="Menu">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" />
                </svg>
            </button>

            <div class="search-area">

                <input
                    type="text"
                    class="search-box"
                    placeholder="Search">

                <button class="search-button" type="button" aria-label="Search">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="7" />
                        <path d="m20 20-4-4" stroke-linecap="round" />
                    </svg>
                </button>

                <a
                    href="{{ route('movies.create') }}"
                    class="add-movie"
                    style="padding: 9px 15px; margin: 0 8px;">
                    Add Movie
                </a>

            </div>

            <nav class="top-links">
                <span class="separator">|</span>

                <a href="#">Login</a>
            </nav>

        </div>
    </header>


    <!-- PAGE TITLE -->
    <section class="hero-title">
        <h1>Movies Library</h1>
    </section>


    <!-- CONTENT -->
    <main class="content">

        @if ($movies->isEmpty())

        <div class="empty-state">

            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.4">
                <rect x="3" y="4" width="18" height="16" rx="2" />
                <path d="M7 4v16M17 4v16M3 9h4M3 15h4M17 9h4M17 15h4" />
            </svg>

            <h2>No Movies Yet</h2>

            <p>
                Your movie collection is empty.
                Add your first movie to start building the library.
            </p>

            <a
                href="{{ route('movies.create') }}"
                class="add-movie">
                Add Movie
            </a>

        </div>

        @else

        <section class="section">

            <div class="section-heading">

                <h2>Movies</h2>

                <div class="section-line"></div>

            </div>


            <div class="movies-grid">

                @foreach ($movies as $movie)

                <article class="movie-card">

                    <div class="poster-wrapper">

                        @if ($movie->image)

                        <img
                            src="{{ asset('storage/' . $movie->image) }}"
                            alt="{{ $movie->title }}"
                            loading="lazy">

                        @else

                        <div
                            style="
                                            width:100%;
                                            height:100%;
                                            display:flex;
                                            align-items:center;
                                            justify-content:center;
                                            color:#aaa;
                                            font-size:12px;
                                        ">
                            No Poster
                        </div>

                        @endif

                        <div class="movie-overlay">

                            <a
                                href="{{ route('movies.show', $movie) }}"
                                class="edit-button">
                                Show Movie
                            </a>

                        </div>

                    </div>


                    <div class="movie-title">
                        {{ $movie->title }}
                    </div>


                    <div class="movie-meta">

                        <span>
                            {{ $movie->release_year }}
                        </span>

                        <span>•</span>

                        <span class="rating">

                            <svg
                                viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.958a1 1 0 00.95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.368 2.447a1 1 0 00-.363 1.118l1.287 3.957c.3.922-.755 1.688-1.538 1.118l-3.367-2.446a1 1 0 00-1.176 0l-3.367 2.446c-.783.57-1.838-.196-1.538-1.118l1.287-3.957a1 1 0 00-.363-1.118L2.062 9.385c-.783-.57-.38-1.81.588-1.81h4.162a1 1 0 00.95-.69l1.287-3.958z" />
                            </svg>

                            {{ $movie->rating !== null ? number_format((float) $movie->rating, 1) : '—' }}

                        </span>

                    </div>


                    <div class="actions">

                        <a
                            href="{{ route('movies.edit', $movie) }}"
                            class="action-button">
                            Edit
                        </a>

                        <form
                            action="{{ route('movies.destroy', $movie) }}"
                            method="POST"
                            onsubmit="return confirm('Delete this movie? This action cannot be undone.');">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="action-button delete-button">
                                Delete
                            </button>

                        </form>

                    </div>

                </article>

                @endforeach

            </div>

        </section>

        @endif

    </main>

</body>

</html>