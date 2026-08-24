<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit {{ $movie->title }} · Movies</title>

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

        /* NAVBAR */
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

        /* PAGE HEADER */
        .page-header {
            background: #f7f7f7;
            border-bottom: 1px solid #e4e4e4;
            padding: 38px 25px;
        }

        .page-header-inner {
            max-width: 1100px;
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

        .page-header p {
            margin: 8px 0 0;
            color: #888;
            font-size: 14px;
        }

        /* CONTENT */
        .content {
            max-width: 1100px;
            margin: auto;
            padding: 55px 25px 80px;
        }

        .form-layout {
            display: grid;
            grid-template-columns: 280px minmax(0, 1fr);
            gap: 55px;
            align-items: start;
        }

        /* POSTER */
        .poster-column {
            position: sticky;
            top: 80px;
        }

        .poster-label {
            margin-bottom: 12px;
            color: #555;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .8px;
        }

        .poster {
            width: 100%;
            aspect-ratio: 2 / 3;
            overflow: hidden;
            border: 1px solid #d8d8d8;
            background: #f0f0f0;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
        }

        .poster img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .no-poster {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #aaa;
            font-size: 13px;
        }

        .current-poster {
            margin-top: 10px;
            color: #999;
            font-size: 11px;
            line-height: 1.5;
        }

        /* FORM */
        .form-card {
            border: 1px solid #dedede;
            background: #fff;
        }

        .form-card-header {
            padding: 22px 25px;
            border-bottom: 1px solid #e2e2e2;
            background: #fafafa;
        }

        .form-card-header h2 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
            color: #333;
        }

        .form-card-header p {
            margin: 6px 0 0;
            color: #999;
            font-size: 12px;
        }

        .form-body {
            padding: 30px 25px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #444;
            font-size: 13px;
            font-weight: 600;
        }

        .required {
            color: #a34a4a;
        }

        .form-input,
        .form-textarea,
        .form-file {
            width: 100%;
            border: 1px solid #d2d2d2;
            background: #fff;
            color: #333;
            font-family: inherit;
            font-size: 14px;
            outline: none;
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        .form-input {
            height: 44px;
            padding: 0 13px;
        }

        .form-textarea {
            min-height: 150px;
            resize: vertical;
            padding: 12px 13px;
            line-height: 1.6;
        }

        .form-file {
            padding: 10px 12px;
        }

        .form-input:focus,
        .form-textarea:focus,
        .form-file:focus {
            border-color: #888;
            box-shadow: 0 0 0 3px rgba(0, 0, 0, .04);
        }

        .form-help {
            margin-top: 7px;
            color: #999;
            font-size: 11px;
            line-height: 1.5;
        }

        .error {
            margin-top: 6px;
            color: #a24747;
            font-size: 12px;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 20px 25px;
            border-top: 1px solid #e2e2e2;
            background: #fafafa;
        }

        .cancel-button,
        .submit-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 18px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: .2s ease;
        }

        .cancel-button {
            border: 1px solid #d3d3d3;
            background: #fff;
            color: #555;
        }

        .cancel-button:hover {
            background: #f4f4f4;
        }

        .submit-button {
            border: 1px solid #333;
            background: #333;
            color: #fff;
        }

        .submit-button:hover {
            background: #111;
            border-color: #111;
        }

        @media (max-width: 850px) {
            .form-layout {
                grid-template-columns: 220px minmax(0, 1fr);
                gap: 30px;
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

            .category,
            .top-links {
                display: none;
            }

            .search-area {
                margin-left: 10px;
            }

            .form-layout {
                grid-template-columns: 1fr;
            }

            .poster-column {
                position: static;
                max-width: 250px;
                margin: 0 auto;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .form-footer {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .cancel-button,
            .submit-button {
                width: 100%;
            }

            .page-header h1 {
                font-size: 29px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <header class="topbar">

        <div class="topbar-inner">

            <div class="logo">
                digital<span>ia</span>
            </div>

            <button
                class="menu-button"
                type="button"
                aria-label="Menu">
                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2">
                    <path
                        d="M4 6h16M4 12h16M4 18h16"
                        stroke-linecap="round" />
                </svg>
            </button>

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

            </nav>

        </div>

    </header>


    <!-- PAGE HEADER -->
    <section class="page-header">

        <div class="page-header-inner">

            <div class="breadcrumb">

                <a href="{{ route('movies.index') }}">
                    Movies
                </a>

                <span> / </span>

                <a href="{{ route('movies.show', $movie) }}">
                    {{ $movie->title }}
                </a>

                <span> / Edit</span>

            </div>

            <h1>
                Edit Movie
            </h1>

            <p>
                Update the information for "{{ $movie->title }}".
            </p>

        </div>

    </section>


    <!-- CONTENT -->
    <main class="content">

        <div class="form-layout">

            <!-- CURRENT POSTER -->
            <div class="poster-column">

                <div class="poster-label">
                    Current Poster
                </div>

                <div class="poster">

                    @if ($movie->image)

                    <img
                        src="{{ asset('storage/' . $movie->image) }}"
                        alt="Poster for {{ $movie->title }}">

                    @else

                    <div class="no-poster">
                        No Poster Available
                    </div>

                    @endif

                </div>

                @if ($movie->image)
                <p class="current-poster">
                    Uploading a new image will replace the current poster.
                </p>
                @endif

            </div>


            <!-- FORM -->
            <div class="form-card">

                <div class="form-card-header">

                    <h2>
                        Movie Information
                    </h2>

                    <p>
                        Modify the fields below and save your changes.
                    </p>

                </div>


                <form
                    action="{{ route('movies.update', $movie) }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    @method('PUT')


                    <div class="form-body">

                        <!-- TITLE -->
                        <div class="form-group">

                            <label
                                for="title"
                                class="form-label">
                                Title <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="title"
                                id="title"
                                class="form-input"
                                value="{{ old('title', $movie->title) }}"
                                placeholder="Enter movie title"
                                required>

                            @error('title')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>


                        <!-- YEAR + RATING -->
                        <div class="form-row">

                            <div class="form-group">

                                <label
                                    for="release_year"
                                    class="form-label">
                                    Release Year
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="number"
                                    name="release_year"
                                    id="release_year"
                                    class="form-input"
                                    value="{{ old('release_year', $movie->release_year) }}"
                                    placeholder="2025"
                                    min="1900"
                                    max="2100"
                                    required>

                                @error('release_year')
                                <div class="error">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>


                            <div class="form-group">

                                <label
                                    for="rating"
                                    class="form-label">
                                    Rating
                                </label>

                                <input
                                    type="number"
                                    name="rating"
                                    id="rating"
                                    class="form-input"
                                    value="{{ old('rating', $movie->rating) }}"
                                    placeholder="8.5"
                                    min="0"
                                    max="10"
                                    step="0.1">

                                <div class="form-help">
                                    Enter a rating between 0 and 10.
                                </div>

                                @error('rating')
                                <div class="error">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>

                        </div>


                        <!-- DESCRIPTION -->
                        <div class="form-group">

                            <label
                                for="description"
                                class="form-label">
                                Description
                            </label>

                            <textarea
                                name="description"
                                id="description"
                                class="form-textarea"
                                placeholder="Write a description of the movie...">{{ old('description', $movie->description) }}</textarea>

                            @error('description')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>


                        <!-- IMAGE -->
                        <div class="form-group">

                            <label
                                for="image"
                                class="form-label">
                                Movie Poster
                            </label>

                            <input
                                type="file"
                                name="image"
                                id="image"
                                class="form-file"
                                accept="image/*">

                            <div class="form-help">
                                Leave this empty to keep the current poster.
                                Recommended formats: JPG, JPEG, PNG, WEBP.
                            </div>

                            @error('image')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                    </div>
                    <!-- FORM FOOTER -->
                    <div class="form-footer">

                        <a
                            href="{{ route('movies.show', $movie) }}"
                            class="cancel-button">
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="submit-button">
                            <svg
                                style="width:15px;height:15px;"
                                viewBox="0 0 20 20"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.6">
                                <path
                                    d="M4 10.5 8 14l8-8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>