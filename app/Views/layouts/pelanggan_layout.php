<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - Coga Barbershop</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        :root {
            --gold-color: #c59d5f;
            --dark-bg: #000000;
            --light-dark-bg: #111111;
            --transition-smooth: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            background-color: var(--dark-bg);
            color: #ffffff;
            font-family: 'Roboto', sans-serif;
        }

        /* --- Animations --- */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* --- Navigation Bar --- */
        .navbar {
            background-color: transparent;
            padding: 1.5rem 0;
            transition: background-color 0.4s ease-in-out, padding 0.4s ease-in-out;
            font-family: 'Roboto', sans-serif;
        }

        .navbar.scrolled {
            background-color: var(--dark-bg);
            padding: 1rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1030;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--gold-color) !important;
        }

        .navbar .nav-link {
            color: #ffffff;
            text-transform: uppercase;
            font-weight: 400;
            letter-spacing: 1px;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: var(--gold-color);
        }

        .btn-book {
            border: 2px solid var(--gold-color);
            color: var(--gold-color);
            background-color: transparent;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0.5rem 1.5rem;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 0;
        }

        .btn-book:hover {
            background-color: var(--gold-color);
            color: var(--dark-bg);
        }

        /* --- NEW, UPGRADED HERO SECTION --- */
        .hero-section {
            padding: 120px 0 80px 0;
            /* Adjusted padding */
            min-height: 50vh;
            background-color: var(--dark-bg);
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.95)),
                url('https://images.unsplash.com/photo-1599305445671-ac291c95aaa9?q=80&w=2069&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        /* Golden shape separator at the bottom */
        .hero-section::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold-color), transparent);
            opacity: 0.5;
        }

        .hero-content {
            animation: fadeInUp 1s ease-out forwards;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            /* Responsive font size */
            color: #ffffff;
            text-transform: uppercase;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
            margin: 20px 0;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .hero-subtitle {
            color: #a0a0a0;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.8;
            font-weight: 300;
        }

        /* Breadcrumbs styling */
        .breadcrumb {
            justify-content: center;
            margin-bottom: 1rem;
            --bs-breadcrumb-divider-color: var(--gold-color);
            --bs-breadcrumb-item-active-color: #fff;
        }

        .breadcrumb-item {
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }

        .breadcrumb-item a {
            color: #a0a0a0;
            text-decoration: none;
            transition: var(--transition-smooth);
        }

        .breadcrumb-item a:hover {
            color: var(--gold-color);
        }


        /* --- Footer --- */
        .footer {
            background-color: #ffffff;
            padding: 80px 0;
            color: #555;
        }

        .footer h4 {
            color: #000;
            font-family: 'Playfair Display', serif;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .footer .footer-intro p {
            margin-bottom: 30px;
        }

        .footer .footer-contact-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .footer .footer-contact-item .icon {
            font-size: 1.2rem;
            color: var(--gold-color);
            margin-right: 15px;
            margin-top: 5px;
        }

        .footer .footer-contact-item h5 {
            color: #000;
            font-size: 1rem;
            font-weight: bold;
        }

        .footer .footer-contact-item p {
            margin: 0;
        }

        .footer .copyright {
            text-align: center;
            padding-top: 40px;
            margin-top: 40px;
            border-top: 1px solid #eee;
            font-size: 0.9rem;
            color: #888;
        }

        .chatbot {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 128px;
            height: 60px;
            background-color: var(--gold-color);
            border-radius: 16%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark-bg);
            font-size: 24px;
            cursor: pointer;
            transition: var(--transition-smooth);
            z-index: 1000;
        }

        .chatbot-toggler {
            position: fixed;
            bottom: 30px;
            right: 35px;
            width: 60px;
            height: 60px;
            background: var(--gold-color);
            color: #000;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            cursor: pointer;
            z-index: 999;
            transition: transform 0.3s ease;
        }

        .chatbot-toggler:hover {
            transform: scale(1.1);
        }

        .chatbot-window {
            position: fixed;
            bottom: 100px;
            right: 35px;
            width: 500px;
            height: 600px;
            background: var(--light-dark-bg);
            border: 1px solid var(--border-color);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            z-index: 1000;
            transform: scale(0.5);
            opacity: 0;
            pointer-events: none;
            transform-origin: bottom right;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
        }

        .chatbot-window.show {
            transform: scale(1);
            opacity: 1;
            pointer-events: auto;
        }

        .chatbot-header {
            background: linear-gradient(135deg, var(--gold-color), #f4d983);
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #000;
        }

        .chatbot-header h5 {
            margin: 0;
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            flex-grow: 1;
            text-align: center;
        }

        .chatbot-close-btn {
            background: none;
            border: none;
            color: #000;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s ease;
        }

        .chatbot-close-btn:hover {
            transform: scale(1.2);
        }

        .chat-area {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .chat-message {
            display: flex;
            gap: 10px;
            align-items: flex-start;
        }

        .chat-message.outgoing {
            justify-content: flex-end;
        }

        .chat-message .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--gold-color);
            color: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            flex-shrink: 0;
        }

        .chat-message.incoming .avatar {
            background: #333;
            color: var(--gold-color);
        }

        .chat-message p {
            background: #333;
            color: #fff;
            padding: 12px 16px;
            border-radius: 18px;
            margin: 0;
            max-width: 90%;
            word-break: break-word;
            overflow-wrap: break-word;
            line-height: 1.5;
        }

        .chat-message.outgoing p {
            background: var(--gold-color);
            color: #000;
            border-top-right-radius: 4px;
        }

        .chat-message.incoming p {
            border-top-left-radius: 4px;
        }

        .chat-input {
            display: flex;
            gap: 5px;
            padding: 10px 20px;
            border-top: 1px solid var(--border-color);
        }

        .chat-input textarea {
            flex-grow: 1;
            background: #333;
            border: 1px solid #555;
            border-radius: 6px;
            color: #fff;
            resize: none;
            height: 55px;
            padding: 15px;
        }

        .chat-input textarea:focus {
            outline: none;
            border-color: var(--gold-color);
        }

        .chat-input button {
            background: var(--gold-color);
            color: #000;
            border: none;
            width: 55px;
            border-radius: 6px;
            font-size: 1.5rem;
        }

        /* Markdown styling in chat messages */
        .chat-message h1,
        .chat-message h2,
        .chat-message h3,
        .chat-message h4,
        .chat-message h5,
        .chat-message h6 {
            margin: 8px 0;
            font-weight: bold;
            color: #fff;
        }

        .chat-message h1 {
            font-size: 1.3em;
        }

        .chat-message h2 {
            font-size: 1.2em;
        }

        .chat-message h3 {
            font-size: 1.1em;
        }

        .chat-message h4 {
            font-size: 1em;
        }

        .chat-message ul,
        .chat-message ol {
            margin: 8px 0;
            padding-left: 20px;
            color: #fff;
        }

        .chat-message li {
            margin: 4px 0;
        }

        .chat-message strong,
        .chat-message b {
            font-weight: bold;
            color: #fff;
        }

        .chat-message em,
        .chat-message i {
            font-style: italic;
        }

        .chat-message code {
            background: #222;
            color: #ffa500;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
        }

        .chat-message pre {
            background: #222;
            color: #fff;
            padding: 10px;
            border-radius: 6px;
            overflow-x: auto;
            font-family: 'Courier New', monospace;
            font-size: 0.85em;
            margin: 8px 0;
        }

        .chat-message a {
            color: #ffa500;
            text-decoration: none;
        }

        .chat-message a:hover {
            text-decoration: underline;
        }

        .chat-message blockquote {
            border-left: 3px solid var(--gold-color);
            padding-left: 10px;
            margin: 8px 0;
            color: #ccc;
        }

        .chat-message hr {
            border: none;
            border-top: 1px solid #555;
            margin: 8px 0;
        }
    </style>
</head>

<body data-bs-theme="dark">
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/">COGA BARBERSHOP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link <?= (uri_string() == '/') ? 'active' : '' ?>" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (strpos(uri_string(), 'layanan') !== false) ? 'active' : '' ?>" href="/layanan">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (strpos(uri_string(), 'kapsters') !== false) ? 'active' : '' ?>" href="/kapsters">Our Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (strpos(uri_string(), 'galeri') !== false) ? 'active' : '' ?>" href="/galeri">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (strpos(uri_string(), 'contact') !== false) ? 'active' : '' ?>" href="/contact">Contact Us</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <?php if (session()->get('isLoggedIn')): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user"></i> <?= esc(session()->get('nama')) ?>
                                </a>
                                <?php if (session()->get('role') == 'pelanggan'): ?>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/my-bookings">My Bookings</a></li>
                                        <li><a class="dropdown-item" href="#">Profil Saya</a></li>
                                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                    </ul>
                                <?php else: ?>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a href="/booking/new" class="btn btn-book">Book Appointment</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- This is the flexible hero slot. Child pages will fill this in. -->
    <?= $this->renderSection('hero') ?>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 footer-intro">
                    <h4>CONTACT US</h4>
                    <p>Duis pretium gravida enim, vel maximus ligula fermentum a. Sed rhoncus eget ex id egestas. Nam nec nisl placerat, tempus erat a, condimentum metusurabitur nulla nisl.</p>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer-contact-item">
                                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                <div>
                                    <h5>Address</h5>
                                    <p>304 North Cardinal St, Dorchester<br>Center, MA 02124</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-contact-item">
                                <div class="icon"><i class="fas fa-envelope"></i></div>
                                <div>
                                    <h5>Email</h5>
                                    <p>info@company.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-contact-item">
                                <div class="icon"><i class="fas fa-phone"></i></div>
                                <div>
                                    <h5>Phone</h5>
                                    <p>(+63) 555 1212</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-contact-item">
                                <div class="icon"><i class="fas fa-clock"></i></div>
                                <div>
                                    <h5>Working Hours</h5>
                                    <p>Mon - Fri: 10am - 6pm<br>Sat - Sun: 10am - 6pm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                &copy; Copyright Coga Barbershop <?= date('Y') ?>
            </div>
        </div>
    </footer>

    <button class="chatbot-toggler">
        <i class="fas fa-comment-dots"></i>
    </button>

    <!-- Jendela Chatbot -->
    <div class="chatbot-window">
        <div class="chatbot-header">
            <h5>Coga Assistant</h5>
            <button class="chatbot-close-btn" id="chatbotCloseBtn">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="chat-area" id="chatArea">
            <!-- Pesan awal -->
            <div class="chat-message incoming">
                <div class="avatar">C</div>
                <p>Halo! Selamat datang di Coga Barbershop. Ada yang bisa saya bantu?</p>
            </div>
            <div class="chat-message incoming">
                <div class="avatar">C</div>
                <p>Anda bisa menanyakan tentang layanan, harga, atau cara booking.</p>
            </div>
        </div>
        <div class="chat-input">
            <textarea id="chatInput" placeholder="Ketik pesan Anda..." required></textarea>
            <button id="sendBtn"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dompurify/dist/purify.min.js"></script>
    <script>
        // JavaScript for sticky navbar
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const chatbotToggler = document.querySelector('.chatbot-toggler');
            const chatbotWindow = document.querySelector('.chatbot-window');
            const chatbotCloseBtn = document.getElementById('chatbotCloseBtn');
            const sendBtn = document.getElementById('sendBtn');
            const chatInput = document.getElementById('chatInput');
            const chatArea = document.getElementById('chatArea');

            // Toggle chatbot window
            chatbotToggler.addEventListener('click', function() {
                chatbotWindow.classList.toggle('show');
            });

            // Close chatbot window
            chatbotCloseBtn.addEventListener('click', function() {
                chatbotWindow.classList.remove('show');
            });

            // Send message on button click
            sendBtn.addEventListener('click', sendMessage);

            // Send message on Enter key
            chatInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter' && !e.shiftKey) {
                    e.preventDefault();
                    sendMessage();
                }
            });

            // Send message function
            function sendMessage() {
                const message = chatInput.value.trim();

                if (message === '') return;

                // Display user message
                const userMessageDiv = document.createElement('div');
                userMessageDiv.className = 'chat-message outgoing';
                userMessageDiv.innerHTML = `<p>${escapeHtml(message)}</p>`;
                chatArea.appendChild(userMessageDiv);

                // Clear input
                chatInput.value = '';
                chatInput.style.height = '55px';

                // Scroll to bottom
                chatArea.scrollTop = chatArea.scrollHeight;

                // Show loading indicator
                const loadingDiv = document.createElement('div');
                loadingDiv.className = 'chat-message incoming';
                loadingDiv.innerHTML = `
                    <div class="avatar">C</div>
                    <p style="background: #555; color: #aaa;">Sedang memproses...</p>
                `;
                chatArea.appendChild(loadingDiv);
                chatArea.scrollTop = chatArea.scrollHeight;

                // Send message to backend
                fetch('/api/chatbot/message', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify({
                            message: message
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        loadingDiv.remove();

                        if (data.success && data.message) {
                            const botMessageDiv = document.createElement('div');
                            botMessageDiv.className = 'chat-message incoming';

                            // Parse markdown and sanitize HTML
                            let renderedContent = marked.parse(data.message);
                            renderedContent = DOMPurify.sanitize(renderedContent);

                            botMessageDiv.innerHTML = `
                                <div class="avatar">C</div>
                                <div style="background: #333; color: #fff; padding: 12px 16px; border-radius: 18px; border-top-left-radius: 4px; max-width: 90%; word-break: break-word; overflow-wrap: break-word; line-height: 1.5;">${renderedContent}</div>
                            `;
                            chatArea.appendChild(botMessageDiv);
                        } else {
                            const errorDiv = document.createElement('div');
                            errorDiv.className = 'chat-message incoming';
                            errorDiv.innerHTML = `
                                <div class="avatar">C</div>
                                <p>Maaf, terjadi kesalahan. Silakan coba lagi.</p>
                            `;
                            chatArea.appendChild(errorDiv);
                        }

                        chatArea.scrollTop = chatArea.scrollHeight;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        loadingDiv.remove();

                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'chat-message incoming';
                        errorDiv.innerHTML = `
                            <div class="avatar">C</div>
                            <p>Maaf, terjadi kesalahan jaringan. Silakan coba lagi.</p>
                        `;
                        chatArea.appendChild(errorDiv);
                        chatArea.scrollTop = chatArea.scrollHeight;
                    });
            }

            // Helper function to escape HTML
            function escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }

            // Auto-adjust textarea height
            chatInput.addEventListener('input', function() {
                this.style.height = '55px';
                this.style.height = Math.min(this.scrollHeight, 120) + 'px';
            });
        });
    </script>


</body>

</html>