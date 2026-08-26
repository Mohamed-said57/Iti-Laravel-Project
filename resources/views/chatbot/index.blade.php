<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AI Chatbot</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

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

        /* TOP NAVIGATION */

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

        /* --- Dropdown Menu Styles --- */
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

        .nav-title {
            margin-left: 20px;
            font-size: 14px;
            font-weight: 600;
            color: #555;
        }

        .top-links {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 22px;
            margin-right: 25px;
            font-size: 14px;
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

        .clear-chat {
            margin-left: 10px;
            padding: 5px 9px;
            border: 1px solid #d5d5d5;
            background: #fff;
            color: #777;
            font-family: inherit;
            font-size: 11px;
            cursor: pointer;
        }

        .clear-chat:hover {
            color: #222;
            border-color: #999;
        }

        /* PAGE */

        .page {
            min-height: calc(100vh - 52px);
            background: #f7f7f7;
            padding: 50px 25px;
        }

        .chat-container {
            width: 100%;
            max-width: 1000px;
            height: calc(100vh - 150px);
            min-height: 600px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid #dddddd;
            display: flex;
            flex-direction: column;
        }

        /* CHAT HEADER */

        .chat-header {
            height: 82px;
            padding: 0 30px;
            border-bottom: 1px solid #e1e1e1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
        }

        .chat-header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .bot-icon {
            width: 42px;
            height: 42px;
            border: 1px solid #d5d5d5;
            background: #f3f3f3;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bot-icon svg {
            width: 22px;
            height: 22px;
            color: #444;
        }

        .chat-heading h1 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
            color: #222;
        }

        .chat-heading p {
            margin: 4px 0 0;
            font-size: 12px;
            color: #999;
        }

        .status {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 12px;
            color: #888;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #777;
        }

        /* MESSAGES */

        #messages {
            flex: 1;
            overflow-y: auto;
            overscroll-behavior: contain;
            padding: 35px;
            background: #fafafa;
        }

        .welcome {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #888;
        }

        .welcome-content {
            max-width: 450px;
        }

        .welcome-icon {
            width: 58px;
            height: 58px;
            margin: 0 auto 20px;
            border: 1px solid #d9d9d9;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .welcome-icon svg {
            width: 28px;
            height: 28px;
            color: #888;
        }

        .welcome h2 {
            margin: 0;
            font-size: 22px;
            color: #333;
        }

        .welcome p {
            margin: 10px 0 0;
            font-size: 13px;
            line-height: 1.7;
            color: #999;
        }

        .message-row {
            display: flex;
            margin-bottom: 22px;
        }

        .message-row.user {
            justify-content: flex-end;
        }

        .message-row.ai {
            justify-content: flex-start;
        }

        .message {
            max-width: 72%;
            padding: 13px 16px;
            font-size: 14px;
            line-height: 1.6;
        }

        .message.user-message {
            background: #333333;
            color: #ffffff;
        }

        .message.ai-message {
            background: #ffffff;
            border: 1px solid #dddddd;
            color: #444444;
            overflow-wrap: anywhere;
        }

        .message.ai-message pre {
            padding: 12px;
            overflow-x: auto;
            background: #f3f3f3;
            border: 1px solid #e1e1e1;
        }

        .message.ai-message pre code {
            padding: 0;
            background: transparent;
        }

        .message.ai-message p {
            margin: 0 0 10px;
        }

        .message.ai-message p:last-child {
            margin-bottom: 0;
        }

        .message.ai-message ul,
        .message.ai-message ol {
            margin: 8px 0;
            padding-left: 22px;
        }

        .message.ai-message li {
            margin-bottom: 5px;
        }

        .message.ai-message h1,
        .message.ai-message h2,
        .message.ai-message h3 {
            margin: 12px 0 7px;
            font-size: 15px;
        }

        .message.ai-message strong {
            font-weight: 700;
        }

        .message.ai-message code {
            padding: 2px 5px;
            background: #eeeeee;
            font-family: monospace;
            font-size: 12px;
        }

        .message-label {
            margin-bottom: 6px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: .65;
        }

        /* INPUT */

        .chat-input-area {
            padding: 18px 22px;
            border-top: 1px solid #e1e1e1;
            background: #ffffff;
            flex-shrink: 0;
        }

        .chat-form {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .message-input {
            flex: 1;
            height: 46px;
            padding: 0 15px;
            border: 1px solid #d4d4d4;
            background: #ffffff;
            color: #333;
            font-family: inherit;
            font-size: 14px;
            outline: none;
        }

        .message-input:focus {
            border-color: #999999;
        }

        .send-button {
            height: 46px;
            padding: 0 22px;
            border: 0;
            background: #333333;
            color: #ffffff;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .send-button:hover {
            background: #111111;
        }

        .send-button:disabled {
            background: #999999;
            cursor: not-allowed;
        }

        .input-hint {
            margin: 8px 2px 0;
            font-size: 10px;
            color: #aaa;
        }

        /* SCROLLBAR */

        #messages::-webkit-scrollbar {
            width: 7px;
        }

        #messages::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        #messages::-webkit-scrollbar-thumb {
            background: #cccccc;
        }

        /* RESPONSIVE */

        @media (max-width: 800px) {
            .logo {
                width: 120px;
                font-size: 21px;
            }

            .menu-button {
                width: 50px;
            }

            .nav-title {
                display: none;
            }

            .top-links {
                display: none;
            }

            .page {
                padding: 20px 12px;
            }

            .chat-container {
                height: calc(100vh - 92px);
                min-height: 500px;
            }

            .chat-header {
                padding: 0 18px;
            }

            #messages {
                padding: 22px 16px;
            }

            .message {
                max-width: 88%;
            }

            .chat-input-area {
                padding: 14px;
            }
        }

        @media (max-width: 500px) {
            .logo {
                width: 100px;
                font-size: 18px;
            }

            .message-input {
                font-size: 13px;
            }

            .send-button {
                padding: 0 15px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
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

    <!-- CHAT PAGE -->
    <main class="page">

        <div class="chat-container">

            <!-- CHAT HEADER -->
            <header class="chat-header">

                <div class="chat-header-left">

                    <div class="bot-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="5" y="7" width="14" height="11" rx="2"></rect>
                            <path d="M9 12h.01M15 12h.01"></path>
                            <path d="M12 3v4"></path>
                            <path d="M8 19h8"></path>
                        </svg>
                    </div>

                    <div class="chat-heading">
                        <h1><a href="{{ route('chatbot.chat') }}">AI Chatbot</a></h1>
                        <p>Ask questions and get intelligent answers</p>
                    </div>

                </div>

                <div class="status">
                    <span class="status-dot"></span>
                    Online

                    <button
                        type="button"
                        id="clear-chat"
                        class="clear-chat">
                        Clear
                    </button>
                </div>

            </header>

            <!-- MESSAGES -->
            <div id="messages">

                <div class="welcome" id="welcome-message">

                    <div class="welcome-content">

                        <div class="welcome-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                                <path d="M12 3a9 9 0 1 0 9 9"></path>
                                <path d="M12 7v5l3 2"></path>
                                <path d="M17 3h4v4"></path>
                            </svg>
                        </div>

                        <h2>How can I help?</h2>

                        <p>
                            Ask me anything about Laravel, programming,
                            movies, or any other topic you'd like to explore.
                        </p>

                    </div>

                </div>

            </div>

            <!-- INPUT -->
            <div class="chat-input-area">

                <form id="chat-form" class="chat-form">

                    @csrf

                    <input
                        type="text"
                        id="message"
                        name="message"
                        class="message-input"
                        placeholder="Type your message..."
                        autocomplete="off"
                        autofocus
                        maxlength="2000">

                    <button
                        type="submit"
                        id="send-button"
                        class="send-button">
                        Send
                    </button>

                </form>

                <div class="input-hint">
                    Press Send to ask the AI assistant.
                </div>

            </div>

        </div>

    </main>

    <script>
        const form = document.getElementById('chat-form');
        const messageInput = document.getElementById('message');
        const messages = document.getElementById('messages');
        const sendButton = document.getElementById('send-button');
        const welcomeMessage = document.getElementById('welcome-message');

        let conversation = [];

        const clearChatButton = document.getElementById('clear-chat');

        clearChatButton.addEventListener('click', function() {

            conversation = [];

            messages.innerHTML = `
                            <div class="welcome" id="welcome-message">

                                <div class="welcome-content">

                                    <div class="welcome-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                                            <path d="M12 3a9 9 0 1 0 9 9"></path>
                                            <path d="M12 7v5l3 2"></path>
                                            <path d="M17 3h4v4"></path>
                                        </svg>
                                    </div>

                                    <h2>How can I help?</h2>

                                    <p>
                                        Ask me anything about Laravel, programming,
                                        movies, or any other topic you'd like to explore.
                                    </p>

                                </div>

                            </div>
                        `;

            messageInput.focus();
        });

        form.addEventListener('submit', async function(event) {
            event.preventDefault();

            const message = messageInput.value.trim();

            if (!message) {
                return;
            }

            conversation.push({
                role: 'user',
                text: message
            });

            if (welcomeMessage) {
                welcomeMessage.remove();
            }

            messages.innerHTML += `
                <div class="message-row user">
                    <div class="message user-message">
                        <div class="message-label">You</div>
                        ${escapeHtml(message)}
                    </div>
                </div>
            `;

            messageInput.value = '';
            sendButton.disabled = true;
            sendButton.textContent = 'Thinking...';

            const loadingMessage = document.createElement('div');

            loadingMessage.className = 'message-row ai';

            loadingMessage.innerHTML = `
                <div class="message ai-message">
                    <div class="message-label">AI</div>
                    Thinking...
                </div>
            `;

            messages.appendChild(loadingMessage);
            messages.scrollTop = messages.scrollHeight;

            messages.scrollTop = messages.scrollHeight;

            try {
                const response = await fetch("{{ route('chatbot.chat') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        message: message,
                        conversation: conversation
                    })
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Something went wrong.');
                }

                loadingMessage.querySelector('.ai-message').innerHTML = `
                    <div class="message-label">AI</div>
                    ${marked.parse(data.reply || 'No response received.')}
                `;

                conversation.push({
                    role: 'assistant',
                    text: data.reply || ''
                });

                if (conversation.length > 20) {
                    conversation = conversation.slice(-20);
                }

            } catch (error) {

                messages.innerHTML += `
                    <div class="message-row ai">
                        <div class="message ai-message">
                            <div class="message-label">Error</div>
                            Sorry, I couldn't process your request. Please try again.
                        </div>
                    </div>
                `;

            } finally {
                sendButton.disabled = false;
                sendButton.textContent = 'Send';

                messages.scrollTop = messages.scrollHeight;
                messageInput.focus();
            }
        });

        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }


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