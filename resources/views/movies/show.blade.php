{{-- resources/views/movies/show.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $movie->title }} · Movie Details</title>

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

        .menu-container {
            position: relative;
            display: flex;
            height: 100%;
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
            transition: background 0.2s;
        }

        .menu-button:hover {
            background: #e4e4e4;
        }

        .menu-button svg {
            width: 24px;
            height: 24px;
            color: #555;
            pointer-events: none;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 52px;
            left: 0;
            background-color: #ffffff;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.1);
            border: 1px solid #e1e1e1;
            border-top: none;
            z-index: 1000;
            flex-direction: column;
        }

        .dropdown-menu.show {
            display: flex;
        }

        .dropdown-menu a {
            color: #333;
            padding: 14px 18px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            border-bottom: 1px solid #f1f1f1;
            transition: background 0.2s ease;
        }

        .dropdown-menu a:last-child {
            border-bottom: none;
        }

        .dropdown-menu a:hover {
            background-color: #f9f9f9;
            color: #000;
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
        }

        .search-box {
            height: 36px;
            flex: 1;
            border: 1px solid #d4d4d4;
            background: #fff;
            padding: 0 14px;
            font-size: 17px;
            outline: none;
        }

        .search-button {
            width: 36px;
            height: 36px;
            border: 0;
            margin-left: 8px;
            background: #ededed;
            display: flex;
            align-items: center;
            justify-content: center;
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
            color: #555;
            text-decoration: none;
        }

        .top-links a:hover {
            color: #000;
        }

        .separator {
            color: #bdbdbd;
        }

        .page-header {
            background: #f7f7f7;
            border-bottom: 1px solid #e4e4e4;
            padding: 38px 25px;
        }

        .page-header-inner {
            max-width: 1200px;
            margin: auto;
        }

        .breadcrumb {
            margin-bottom: 10px;
            color: #999;
            font-size: 12px;
        }

        .breadcrumb a {
            color: #777;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            color: #222;
        }

        .page-header h1 {
            margin: 0;
            color: #222;
            font-size: 36px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .content {
            max-width: 1200px;
            margin: auto;
            padding: 60px 25px 80px;
        }

        .movie-details {
            display: grid;
            grid-template-columns: 310px minmax(0, 1fr);
            gap: 55px;
            align-items: start;
        }

        .poster {
            width: 100%;
            aspect-ratio: 2 / 3;
            overflow: hidden;
            background: #eeeeee;
            border: 1px solid #d9d9d9;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .poster img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
        }

        .no-poster {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #aaa;
            font-size: 14px;
        }

        .movie-info {
            padding-top: 5px;
        }

        .movie-title {
            margin: 0;
            color: #222;
            font-size: 42px;
            line-height: 1.15;
            font-weight: 700;
        }

        .movie-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 11px;
            margin-top: 17px;
            color: #777;
            font-size: 14px;
        }

        .meta-divider {
            color: #c5c5c5;
        }

        .rating {
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .rating svg {
            width: 16px;
            height: 16px;
            color: #777;
        }

        .description-title {
            margin-top: 40px;
            margin-bottom: 12px;
            color: #222;
            font-size: 17px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .description {
            max-width: 750px;
            margin: 0;
            color: #666;
            font-size: 15px;
            line-height: 1.85;
        }

        .info-table {
            margin-top: 35px;
            width: 100%;
            max-width: 680px;
            border-top: 1px solid #dedede;
        }

        .info-row {
            display: grid;
            grid-template-columns: 150px 1fr;
            min-height: 50px;
            align-items: center;
            border-bottom: 1px solid #e5e5e5;
        }

        .info-label {
            color: #888;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .info-value {
            color: #444;
            font-size: 14px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 35px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-width: 120px;
            padding: 11px 17px;
            border: 1px solid #d3d3d3;
            background: #fff;
            color: #333;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s ease;
        }

        .button:hover {
            background: #f5f5f5;
        }

        .button-primary {
            background: #333;
            border-color: #333;
            color: white;
        }

        .button-primary:hover {
            background: #111;
            border-color: #111;
        }

        .button-danger {
            color: #ae4e4e;
            border-color: #decaca;
        }

        .button-danger:hover {
            background: #fff5f5;
            border-color: #c99999;
        }

        .back-section {
            margin-top: 70px;
            padding-top: 25px;
            border-top: 1px solid #dedede;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #666;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .back-link:hover {
            color: #111;
        }

        @media (max-width: 850px) {
            .movie-details {
                grid-template-columns: 240px minmax(0, 1fr);
                gap: 35px;
            }

            .movie-title {
                font-size: 34px;
            }
        }

        @media (max-width: 650px) {
            .logo {
                width: 110px;
                font-size: 20px;
            }

            .menu-button {
                width: 48px;
            }

            .category {
                display: none;
            }

            .top-links {
                display: none;
            }

            .search-area {
                margin-left: 10px;
            }

            .movie-details {
                grid-template-columns: 1fr;
            }

            .poster {
                width: min(310px, 100%);
                margin: 0 auto;
            }

            .movie-info {
                padding-top: 20px;
            }

            .movie-title {
                font-size: 32px;
            }

            .page-header h1 {
                font-size: 29px;
            }
        }
    </style>
</head>

<body>

    <header class="topbar">

        <div class="topbar-inner">

            <div class="logo">
                <a href="{{ route('movies.index') }}">movie<span>Repo</span></a>
            </div>

            <!-- Dropdown Container -->
            <div class="menu-container">
                <button class="menu-button" type="button" aria-label="Menu" onclick="toggleMenu()">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" />
                    </svg>
                </button>

                <!-- Dropdown Links -->
                <div class="dropdown-menu" id="myDropdown">
                    <a href="{{ route('movies.index') }}">Movies</a>
                    <a href="#">Your Watchlist</a>
                </div>
            </div>

            <div class="search-area">

                <input
                    type="text"
                    class="search-box"
                    placeholder="Search">

                <button
                    type="button"
                    class="search-button"
                    aria-label="Search">
                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">
                        <circle cx="11" cy="11" r="7" />
                        <path
                            d="m20 20-4-4"
                            stroke-linecap="round" />
                    </svg>
                </button>

            </div>

            <nav class="top-links">
                <span class="separator">|</span>
                <a href="#">Login</a>

                <span class="separator">|</span>
                <a href="{{ route('chatbot.chat') }}">AI Chatbot</a>
            </nav>

        </div>

    </header>


    <!-- PAGE HEADER -->
    <section class="page-header">

        <div class="page-header-inner">

            <div class="breadcrumb">
                <a href="{{ route('movies.index') }}">Movies</a>
                <span> / </span>
                {{ $movie->title }}
            </div>

            <h1>{{ $movie->title }}</h1>

        </div>

    </section>


    <!-- MOVIE CONTENT -->
    <main class="content">

        <div class="movie-details">

            <!-- POSTER -->
            <div class="poster">

                @if ($movie->image)

                <img
                    src="{{ asset('images/' . $movie->image) }}"
                    alt="{{ $movie->title }}"
                    loading="lazy">

                @else

                <div class="no-poster">
                    No Poster Available
                </div>

                @endif

            </div>


            <!-- INFORMATION -->
            <div class="movie-info">

                <h2 class="movie-title">
                    {{ $movie->title }}
                </h2>


                <div class="movie-meta">

                    <span>
                        {{ $movie->release_year }}
                    </span>

                    <span class="meta-divider">•</span>

                    <span class="rating">

                        <svg
                            viewBox="0 0 20 20"
                            fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.958a1 1 0 00.95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.368 2.447a1 1 0 00-.363 1.118l1.287 3.957c.3.922-.755 1.688-1.538 1.118l-3.367-2.446a1 1 0 00-1.176 0l-3.367 2.446c-.783.57-1.838-.196-1.538-1.118l1.287-3.957a1 1 0 00-.363-1.118L2.062 9.385c-.783-.57-.38-1.81.588-1.81h4.162a1 1 0 00.95-.69l1.287-3.958z" />
                        </svg>

                        {{ $movie->rating !== null
                            ? number_format((float) $movie->rating, 1)
                            : 'No rating'
                        }}

                    </span>

                </div>


                <div class="description-title">
                    Description
                </div>

                <p class="description">
                    {{ $movie->description ?: 'No description available for this movie.' }}
                </p>


                <!-- INFORMATION -->
                <div class="info-table">

                    <div class="info-row">

                        <div class="info-label">
                            Title
                        </div>

                        <div class="info-value">
                            {{ $movie->title }}
                        </div>

                    </div>


                    <div class="info-row">

                        <div class="info-label">
                            Release Year
                        </div>

                        <div class="info-value">
                            {{ $movie->release_year }}
                        </div>

                    </div>


                    <div class="info-row">

                        <div class="info-label">
                            Rating
                        </div>

                        <div class="info-value">
                            {{ $movie->rating !== null
                                ? number_format((float) $movie->rating, 1) . ' / 10'
                                : 'Not rated'
                            }}
                        </div>

                    </div>

                </div>


                <!-- ACTIONS -->
                <div class="actions">

                    <a
                        href="{{ route('movies.edit', $movie) }}"
                        class="button button-primary">
                        <svg
                            style="width:15px;height:15px;"
                            viewBox="0 0 20 20"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.5">
                            <path
                                d="M11 4H4a1 1 0 00-1 1v11a1 1 0 001 1h11a1 1 0 001-1v-7"
                                stroke-linecap="round" />

                            <path
                                d="M14.5 2.5a1.5 1.5 0 012.12 2.12l-6.7 6.7-3 .88.88-3 6.7-6.7Z"
                                stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        Edit Movie
                    </a>


                    <form
                        action="{{ route('movies.destroy', $movie) }}"
                        method="POST"
                        onsubmit="return confirm('Delete this movie? This action cannot be undone.');">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="button button-danger">
                            Delete Movie
                        </button>

                    </form>

                </div>

            </div>

        </div>


        <!-- BACK -->
        <div class="back-section">

            <a
                href="{{ route('movies.index') }}"
                class="back-link">
                <svg
                    style="width:16px;height:16px;"
                    viewBox="0 0 20 20"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.6">
                    <path
                        d="M15 10H5M9 6l-4 4 4 4"
                        stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>

                Back to Movies
            </a>

        </div>

    </main>

    <!-- Script to handle dropdown toggle -->
    <script>
        function toggleMenu() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.closest('.menu-container')) {
                var dropdowns = document.getElementsByClassName("dropdown-menu");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</body>

</html>