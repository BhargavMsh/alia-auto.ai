(() => {
    const form = document.getElementById('contact-form');
    if (!form) return;
    const phoneInput = document.getElementById('contact-phone');

    if (phoneInput) {

        // Block non-numeric keyboard input.
        phoneInput.addEventListener('keydown', (event) => {

            const allowedKeys = [
                'Backspace',
                'Delete',
                'Tab',
                'ArrowLeft',
                'ArrowRight',
                'Home',
                'End'
            ];

            // Allow navigation/editing shortcuts.
            if (
                allowedKeys.includes(event.key) ||
                event.ctrlKey ||
                event.metaKey
            ) {
                return;
            }

            // Only allow digits 0-9.
            if (!/^[0-9]$/.test(event.key)) {
                event.preventDefault();
            }
        });


        // Extra protection for mobile/autofill.
        phoneInput.addEventListener('input', () => {

            phoneInput.value =
                phoneInput.value
                    .replace(/\D/g, '')
                    .slice(0, 15);

            validatePhone();
        });


        // Handle pasted content.
        phoneInput.addEventListener('paste', (event) => {

            event.preventDefault();

            const pastedText =
                (
                    event.clipboardData ||
                    window.clipboardData
                ).getData('text');

            const digitsOnly =
                pastedText
                    .replace(/\D/g, '')
                    .slice(0, 15);

            const start =
                phoneInput.selectionStart ?? 0;

            const end =
                phoneInput.selectionEnd ?? 0;

            const currentValue =
                phoneInput.value;

            phoneInput.value =
                (
                    currentValue.substring(0, start) +
                    digitsOnly +
                    currentValue.substring(end)
                ).slice(0, 15);

            validatePhone();
        });


        function validatePhone() {

            const phone =
                phoneInput.value.trim();

            phoneInput.setCustomValidity('');

            if (!phone) {
                return;
            }

            if (!/^\d+$/.test(phone)) {
                phoneInput.setCustomValidity(
                    'Phone number must contain numbers only.'
                );

                return;
            }

            if (phone.length < 7) {
                phoneInput.setCustomValidity(
                    'Phone number must contain at least 10 digits.'
                );

                return;
            }

            if (phone.length > 15) {
                phoneInput.setCustomValidity(
                    'Phone number cannot exceed 15 digits.'
                );
            }
        }
    }

    const submit = document.getElementById('contact-submit');
    const message = document.getElementById('contact-message');

    const CONTACT_API_URL = '/contact-submit.php';

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        message.hidden = true;
        message.className = 'contact-message';
        if (phoneInput) {
            phoneInput.dispatchEvent(
                new Event('input', {
                    bubbles: true
                })
            );
        }
        if (!form.reportValidity()) return;

        const formData = new FormData(form);

        const payload = {
            name: String(formData.get('name') || '').trim(),
            phone: String(formData.get('phone') || '').trim(),
            email: String(formData.get('email') || '').trim(),
            purpose: String(formData.get('purpose') || '').trim(),
            website: String(formData.get('website') || '').trim()
        };

        const originalHtml = submit.innerHTML;

        submit.disabled = true;
        submit.textContent = 'Sending...';

        try {
            const response = await fetch(CONTACT_API_URL, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(payload)
            });

            const data = await response.json().catch(() => ({}));

            if (!response.ok || !data.ok) {
                throw new Error(
                    data.message || 'Unable to send your request.'
                );
            }

            message.textContent =
                data.message ||
                'Thank you. Your request has been sent.';

            message.classList.add('success');
            message.hidden = false;

            form.reset();

        } catch (error) {
            console.error('Contact form error:', error);

            message.textContent =
                error?.message ||
                'Unable to send your request. Please try again.';

            message.classList.add('error');
            message.hidden = false;

        } finally {
            submit.disabled = false;
            submit.innerHTML = originalHtml;
        }
    });
})();