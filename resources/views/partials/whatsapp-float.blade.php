@php
    $whatsappNumber = '923045925552';
    $defaultMessage = 'Assalam-o-Alaikum Professional Youth Academy, I would like information regarding your programs and admissions.';
    $whatsappDirectUrl = 'https://wa.me/' . $whatsappNumber . '?text=' . urlencode($defaultMessage);
@endphp

<div class="pya-wa-dock" aria-label="WhatsApp Assistance">
    <div class="pya-wa-popover shadow-lg" id="pyaWaPopover" role="dialog" aria-hidden="true">
        <div class="pya-wa-header">
            <div>
                <div class="fw-bold small">Chat on WhatsApp</div>
                <div class="pya-wa-sub">Admissions &amp; Counseling</div>
            </div>
            <button type="button" class="pya-wa-close" id="pyaWaClose" aria-label="Close WhatsApp chat box">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        <div class="pya-wa-body">
            <p class="small text-muted mb-3">
                Need help picking a diploma, checking enrollment details, or booking consultancy? Start a chat directly.
            </p>
            <div class="mb-3">
                <label for="pyaWaMessage" class="form-label small fw-semibold mb-1">Quick Message</label>
                <textarea id="pyaWaMessage" rows="2" class="form-control form-control-sm">{{ $defaultMessage }}</textarea>
            </div>
            <a id="pyaWaSendLink" href="{{ $whatsappDirectUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-emerald btn-sm w-100">
                <i class="bi bi-whatsapp me-1"></i> Open WhatsApp
            </a>
        </div>
    </div>

    <button type="button" class="pya-wa-trigger shadow" id="pyaWaTrigger" aria-expanded="false" aria-controls="pyaWaPopover" title="Chat on WhatsApp">
        <i class="bi bi-whatsapp"></i>
        <span class="pya-wa-label">WhatsApp</span>
    </button>
</div>

<style>
    .pya-wa-dock {
        position: fixed;
        right: 1.15rem;
        bottom: 1.5rem;
        z-index: 1040;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 0.65rem;
    }

    .pya-wa-trigger {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, #063729 0%, #107c5c 100%);
        color: #f8faf9;
        border: 1.5px solid #d49b38;
        border-radius: 999px;
        padding: 0.65rem 1rem;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .pya-wa-trigger:hover {
        transform: translateY(-2px);
        color: #f8faf9;
    }

    .pya-wa-trigger i {
        font-size: 1.25rem;
        color: #d49b38;
    }

    .pya-wa-popover {
        display: none;
        width: 290px;
        max-width: calc(100vw - 2.3rem);
        background: #f8faf9;
        border: 1px solid rgba(6, 55, 41, 0.14);
        border-radius: 1rem;
        overflow: hidden;
    }

    .pya-wa-popover.is-open {
        display: block;
    }

    .pya-wa-header {
        background-color: #063729;
        color: #f8faf9;
        padding: 0.85rem 1rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 2px solid #d49b38;
    }

    .pya-wa-sub {
        font-size: 0.75rem;
        color: rgba(248, 250, 249, 0.8);
    }

    .pya-wa-close {
        background: transparent;
        border: 0;
        color: #f8faf9;
        padding: 0.15rem 0.35rem;
        line-height: 1;
        cursor: pointer;
    }

    .pya-wa-body {
        padding: 1rem;
    }

    @media (max-width: 575.98px) {
        .pya-wa-label {
            display: none;
        }

        .pya-wa-trigger {
            width: 3.25rem;
            height: 3.25rem;
            padding: 0;
            justify-content: center;
            border-radius: 50%;
        }

        .pya-wa-trigger i {
            font-size: 1.4rem;
        }
    }
</style>

<script>
    (function () {
        const trigger = document.getElementById('pyaWaTrigger');
        const popover = document.getElementById('pyaWaPopover');
        const closeBtn = document.getElementById('pyaWaClose');
        const textarea = document.getElementById('pyaWaMessage');
        const sendLink = document.getElementById('pyaWaSendLink');
        const baseNumber = @json($whatsappNumber);

        if (!trigger || !popover) return;

        function syncLink() {
            const text = (textarea && textarea.value.trim()) ? textarea.value.trim() : @json($defaultMessage);
            if (sendLink) {
                sendLink.href = 'https://wa.me/' + baseNumber + '?text=' + encodeURIComponent(text);
            }
        }

        function setOpen(open) {
            popover.classList.toggle('is-open', open);
            popover.setAttribute('aria-hidden', open ? 'false' : 'true');
            trigger.setAttribute('aria-expanded', open ? 'true' : 'false');
            if (open) syncLink();
        }

        trigger.addEventListener('click', function (e) {
            e.stopPropagation();
            setOpen(!popover.classList.contains('is-open'));
        });

        if (closeBtn) {
            closeBtn.addEventListener('click', function () {
                setOpen(false);
            });
        }

        if (textarea) {
            textarea.addEventListener('input', syncLink);
        }

        document.addEventListener('click', function (e) {
            if (!popover.contains(e.target) && !trigger.contains(e.target)) {
                setOpen(false);
            }
        });
    })();
</script>