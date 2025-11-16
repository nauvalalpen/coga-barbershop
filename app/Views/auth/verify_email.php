<?= $this->extend('layouts/pelanggan_layout') ?>

<?= $this->section('title') ?>
Email Verification
<?= $this->endSection() ?>

<?= $this->section('page_header') ?>
VERIFY EMAIL
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    :root {
        --gold-color: #d4af37;
        --dark-bg: #0a0a0a;
        --light-dark-bg: #1a1a1a;
        --card-bg: #141414;
        --border-color: #2a2a2a;
    }

    /* Verification Section */
    .verification-section {
        padding: 100px 0;
        background: linear-gradient(180deg, var(--dark-bg) 0%, #050505 100%);
        min-height: 80vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .verification-section::before {
        content: '✉️';
        position: absolute;
        font-size: 20rem;
        opacity: 0.02;
        top: 50%;
        right: -5%;
        transform: translateY(-50%) rotate(15deg);
        pointer-events: none;
    }

    /* Verification Container */
    .verification-container {
        max-width: 500px;
        margin: auto;
        background: linear-gradient(145deg, var(--card-bg), var(--light-dark-bg));
        padding: 50px 40px;
        border: 2px solid var(--border-color);
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        position: relative;
        overflow: hidden;
    }

    .verification-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--gold-color), #f4d983);
    }

    /* Header */
    .verification-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .verification-icon {
        width: 100px;
        height: 100px;
        margin: 0 auto 25px;
        background: linear-gradient(135deg, var(--gold-color), #f4d983);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3.5rem;
        color: #000;
        box-shadow: 0 0 40px rgba(212, 175, 55, 0.5);
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    .verification-container h2 {
        font-family: 'Playfair Display', serif;
        color: #fff;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .verification-description {
        color: #b0b0b0;
        font-size: 1rem;
        line-height: 1.7;
        margin-bottom: 10px;
    }

    .email-highlight {
        color: var(--gold-color);
        font-weight: 600;
        word-break: break-all;
    }

    /* Alerts */
    .alert {
        border-radius: 8px;
        padding: 1rem 1.25rem;
        margin-bottom: 1.5rem;
        border: none;
        animation: slideInDown 0.4s ease-out;
    }

    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert-success {
        background: rgba(40, 167, 69, 0.15);
        border-left: 4px solid #28a745;
        color: #28a745;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .alert-danger {
        background: rgba(220, 53, 69, 0.15);
        border-left: 4px solid #dc3545;
        color: #dc3545;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Code Input */
    .code-input-wrapper {
        margin: 30px 0;
    }

    .code-input-label {
        color: #b0b0b0;
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 15px;
        display: block;
        text-align: center;
    }

    .code-input {
        width: 100%;
        padding: 20px;
        font-size: 2rem;
        text-align: center;
        letter-spacing: 15px;
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid #333;
        border-radius: 8px;
        color: var(--gold-color);
        font-weight: 700;
        transition: all 0.3s ease;
        font-family: 'Courier New', monospace;
    }

    .code-input:focus {
        background: rgba(255, 255, 255, 0.08);
        border-color: var(--gold-color);
        box-shadow: 0 0 30px rgba(212, 175, 55, 0.3);
        outline: none;
    }

    .code-input::placeholder {
        color: #444;
        letter-spacing: 10px;
    }

    /* Helper Text */
    .input-helper {
        text-align: center;
        color: #666;
        font-size: 0.85rem;
        margin-top: 10px;
    }

    /* Submit Button */
    .btn-verify {
        background: linear-gradient(135deg, var(--gold-color), #f4d983);
        color: #000;
        border: none;
        border-radius: 8px;
        padding: 16px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        width: 100%;
        font-size: 1.05rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        margin-top: 10px;
    }

    .btn-verify::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: all 0.5s ease;
    }

    .btn-verify:hover::before {
        left: 100%;
    }

    .btn-verify:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);
    }

    .btn-verify:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    /* Resend Section */
    .resend-section {
        text-align: center;
        margin-top: 30px;
        padding-top: 30px;
        border-top: 1px solid var(--border-color);
    }

    .resend-text {
        color: #888;
        font-size: 0.9rem;
        margin-bottom: 15px;
    }

    .btn-resend {
        background: transparent;
        border: 2px solid var(--gold-color);
        color: var(--gold-color);
        padding: 10px 24px;
        border-radius: 8px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.85rem;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-resend:hover {
        background: var(--gold-color);
        color: #000;
        transform: translateY(-2px);
    }

    .btn-resend:disabled {
        opacity: 0.4;
        cursor: not-allowed;
    }

    /* Timer */
    .resend-timer {
        color: var(--gold-color);
        font-weight: 600;
        font-size: 0.9rem;
        margin-top: 10px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .verification-section {
            padding: 60px 20px;
        }

        .verification-container {
            padding: 40px 25px;
        }

        .verification-container h2 {
            font-size: 1.6rem;
        }

        .code-input {
            font-size: 1.6rem;
            letter-spacing: 10px;
            padding: 16px;
        }
    }
</style>

<div class="verification-section">
    <div class="container">
        <div class="verification-container">
            <div class="verification-header">
                <div class="verification-icon">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <h2>Verify Your Email</h2>
                <p class="verification-description">
                    We've sent a 6-digit verification code to <br>
                    <span class="email-highlight"><?= esc(session()->get('email_for_verification')) ?></span>
                </p>
            </div>

            <!-- Display feedback messages -->
            <?php if (session()->get('success')): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <span><?= session()->get('success') ?></span>
                </div>
            <?php endif; ?>

            <?php if (session()->get('error')): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <span><?= session()->get('error') ?></span>
                </div>
            <?php endif; ?>

            <form action="/verify-email" method="post" id="verifyForm">
                <?= csrf_field() ?>

                <div class="code-input-wrapper">
                    <label for="verification_code" class="code-input-label">
                        Enter Verification Code
                    </label>
                    <input type="text"
                        name="verification_code"
                        id="verification_code"
                        class="code-input"
                        maxlength="6"
                        placeholder="000000"
                        pattern="[0-9]{6}"
                        autocomplete="off"
                        required>
                    <div class="input-helper">
                        <i class="fas fa-info-circle me-1"></i>
                        Enter the 6-digit code from your email
                    </div>
                </div>

                <button type="submit" class="btn-verify" id="verifyBtn">
                    <i class="fas fa-check-double me-2"></i>
                    Verify Email
                </button>
            </form>

            <div class="resend-section">
                <p class="resend-text">Didn't receive the code?</p>
                <button type="button" class="btn-resend" id="resendBtn" onclick="resendCode()">
                    <i class="fas fa-redo-alt me-2"></i>
                    Resend Code
                </button>
                <div class="resend-timer" id="timer" style="display: none;">
                    Resend available in <span id="countdown">60</span>s
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Auto-format input to numbers only
    const codeInput = document.getElementById('verification_code');
    codeInput.addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9]/g, '');

        // Auto-submit when 6 digits are entered
        if (this.value.length === 6) {
            document.getElementById('verifyForm').submit();
        }
    });

    // Form submission handling
    document.getElementById('verifyForm').addEventListener('submit', function() {
        const verifyBtn = document.getElementById('verifyBtn');
        verifyBtn.disabled = true;
        verifyBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Verifying...';
    });

    // Resend code function
    let resendTimeout;

    function resendCode() {
        const resendBtn = document.getElementById('resendBtn');
        const timer = document.getElementById('timer');
        const countdown = document.getElementById('countdown');

        // Disable button and show timer
        resendBtn.disabled = true;
        timer.style.display = 'block';

        let timeLeft = 60;
        countdown.textContent = timeLeft;

        resendTimeout = setInterval(() => {
            timeLeft--;
            countdown.textContent = timeLeft;

            if (timeLeft <= 0) {
                clearInterval(resendTimeout);
                resendBtn.disabled = false;
                timer.style.display = 'none';
            }
        }, 1000);

        // TODO: Make AJAX call to resend code
        // fetch('/resend-verification-code', { method: 'POST' })

        // Show success message
        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-success';
        alertDiv.innerHTML = '<i class="fas fa-check-circle"></i><span>Verification code resent successfully!</span>';
        document.querySelector('.verification-header').after(alertDiv);

        setTimeout(() => {
            alertDiv.remove();
        }, 5000);
    }

    // Auto-focus on input
    document.addEventListener('DOMContentLoaded', function() {
        codeInput.focus();
    });

    // Paste support
    codeInput.addEventListener('paste', function(e) {
        e.preventDefault();
        const pastedText = (e.clipboardData || window.clipboardData).getData('text');
        const cleanedText = pastedText.replace(/[^0-9]/g, '').slice(0, 6);
        this.value = cleanedText;

        if (cleanedText.length === 6) {
            document.getElementById('verifyForm').submit();
        }
    });
</script>

<?= $this->endSection() ?>