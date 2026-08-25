<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Movie · Movies</title>

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

        /* =========================
           NAVBAR
        ========================= */

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
            font-size: 17px;
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
            align-items: center;
            justify-content: center;
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
            color: #555;
            text-decoration: none;
        }

        .top-links a:hover {
            color: #000;
        }

        .separator {
            color: #bdbdbd;
        }

        /* =========================
           PAGE HEADER
        ========================= */

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

        /* =========================
           CONTENT
        ========================= */

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

        /* =========================
           POSTER PREVIEW
        ========================= */

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

        .poster-preview {
            width: 100%;
            aspect-ratio: 2 / 3;
            overflow: hidden;
            border: 1px solid #d8d8d8;
            background: #f3f3f3;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .06);
        }

        .poster-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
        }

        .poster-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 13px;
            color: #aaa;
            text-align: center;
        }

        .poster-placeholder svg {
            width: 55px;
            height: 55px;
        }

        .poster-placeholder span {
            font-size: 12px;
        }

        .poster-note {
            margin-top: 10px;
            color: #999;
            font-size: 11px;
            line-height: 1.5;
        }

        /* =========================
           FORM CARD
        ========================= */

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
            transition:
                border-color .2s ease,
                box-shadow .2s ease;
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
            cursor: pointer;
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

        /* =========================
           FOOTER / ACTIONS
        ========================= */

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

        /* =========================
           RESPONSIVE
        ========================= */

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

    <!-- =========================
         NAVBAR
    ========================= -->

    <header class="topbar">

        <div class="topbar-inner">

            <div class="logo">
                <a href="{{ route('movies.index') }}">movie<span>Repo</span></a>
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

                <a href="#">
                    Login
                </a>

            </nav>

        </div>

    </header>


    <!-- =========================
         PAGE HEADER
    ========================= -->

    <section class="page-header">

        <div class="page-header-inner">

            <div class="breadcrumb">

                <a href="{{ route('movies.index') }}">
                    Movies
                </a>

                <span> / Add Movie</span>

            </div>

            <h1>
                Add Movie
            </h1>

            <p>
                Add a new title to your movie collection.
            </p>

        </div>

    </section>


    <!-- =========================
         CONTENT
    ========================= -->

    <main class="content">

        <div class="form-layout">

            <!-- POSTER PREVIEW -->

            <div class="poster-column">

                <div class="poster-label">
                    Poster Preview
                </div>

                <div class="poster-preview">

                    <img
                        id="posterPreview"
                        src=""
                        alt="Movie poster preview">

                    <div
                        id="posterPlaceholder"
                        class="poster-placeholder">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.4">
                            <rect
                                x="3"
                                y="4"
                                width="18"
                                height="16"
                                rx="2" />

                            <path d="M7 4v16M17 4v16" />
                            <path d="M3 9h4M3 15h4" />
                            <path d="M17 9h4M17 15h4" />
                        </svg>

                        <span>
                            No poster selected
                        </span>

                    </div>

                </div>

                <p class="poster-note">
                    Choose a poster image from your computer and it
                    will appear here before you submit the form.
                </p>

            </div>


            <!-- FORM -->

            <div class="form-card">

                <div class="form-card-header">

                    <h2>
                        New Movie Details
                    </h2>

                    <p>
                        Fill in the information below to add a movie.
                    </p>

                </div>


                <form
                    action="{{ route('movies.store') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="form-body">

                        <!-- TITLE -->

                        <div class="form-group">

                            <label
                                for="title"
                                class="form-label">
                                Title
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="title"
                                name="title"
                                class="form-input"
                                value="{{ old('title') }}"
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
                                    id="release_year"
                                    name="release_year"
                                    class="form-input"
                                    value="{{ old('release_year') }}"
                                    min="1888"
                                    max="{{ date('Y') + 5 }}"
                                    placeholder="e.g. 2024"
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
                                    id="rating"
                                    name="rating"
                                    class="form-input"
                                    value="{{ old('rating') }}"
                                    step="0.1"
                                    min="0"
                                    max="10"
                                    placeholder="0.0 - 10.0">

                                <div class="form-help">
                                    Enter a value between 0 and 10.
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
                                id="description"
                                name="description"
                                class="form-textarea"
                                placeholder="Enter movie description">{{ old('description') }}</textarea>

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
                                id="image"
                                name="image"
                                class="form-file"
                                accept="image/*">

                            <div class="form-help">
                                Recommended formats: JPG, JPEG, PNG or WEBP.
                            </div>

                            @error('image')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                    </div>


                    <!-- ACTIONS -->

                    <div class="form-footer">

                        <a
                            href="{{ route('movies.index') }}"
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
                                    d="M10 4v12M4 10h12"
                                    stroke-linecap="round" />
                            </svg>

                            Add Movie

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>


    <!-- =========================
         IMAGE PREVIEW
    ========================= -->

    <script>
        const imageInput = document.getElementById('image');
        const posterPreview = document.getElementById('posterPreview');
        const posterPlaceholder = document.getElementById('posterPlaceholder');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];

            if (!file) {
                posterPreview.src = '';
                posterPreview.style.display = 'none';
                posterPlaceholder.style.display = 'flex';
                return;
            }

            const imageUrl = URL.createObjectURL(file);

            posterPreview.src = imageUrl;
            posterPreview.style.display = 'block';
            posterPlaceholder.style.display = 'none';
        });
    </script>

</body>

</html>