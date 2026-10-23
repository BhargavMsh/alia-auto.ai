(() => {
    const form = document.getElementById('contact-form');
    if (!form) return;

    const submit = document.getElementById('contact-submit');
    const message = document.getElementById('contact-message');

    const CONTACT_API_URL = '/contact-submit.php';

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        message.hidden = true;
        message.className = 'contact-message';

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