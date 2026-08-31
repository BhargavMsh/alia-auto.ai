<?php
$pageKey = 'contact';
$pageTitle = 'Contact ALIA | Automotive Market Intelligence';
$pageDescription = 'Contact ALIA to discuss automotive offer intelligence, competitive benchmarking and Middle East market intelligence.';
require __DIR__ . '/header.php';
?>
<main class="alia-auth-page alia-contact-page">
    <div class="alia-auth-bg-grid" aria-hidden="true"></div>
    <div class="alia-auth-glow alia-auth-glow-blue" aria-hidden="true"></div>
    <div class="alia-auth-glow alia-auth-glow-orange" aria-hidden="true"></div>
    <section class="alia-contact-shell" aria-labelledby="contact-title">
        <div class="alia-contact-left">
            <h1 id="contact-title">Let's talk about your <span>market intelligence</span> needs.</h1>
            <p>Tell us about your requirement and our team will reach out.</p>
            <div class="alia-contact-info">
                <div><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg><span>support@alia.ai</span></div>
                <div><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 1 2.81.7A2 2 0 0 1 22 16.92z"></path></svg><span>Request a callback</span></div>
                <div><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg><span>UAE · KSA · Qatar · Kuwait</span></div>
            </div>
        </div>
        <form class="alia-auth-card alia-contact-card" id="contact-form" method="post" action="#" novalidate>
            <h2>Contact Us</h2>
            <p class="alia-contact-subtitle">Tell us about your requirement and our team will reach out.</p>
            <div id="contact-message" class="contact-message" role="status" aria-live="polite" hidden></div>
            <label>Name<input type="text" name="name" maxlength="120" placeholder="Name" autocomplete="name" required></label>
            <label>Phone<input type="tel" name="phone" maxlength="25" placeholder="Phone" autocomplete="tel" required></label>
            <label>Email<input type="email" name="email" maxlength="190" placeholder="Email" autocomplete="email" required></label>
            <label>Purpose of Visit<textarea name="purpose" maxlength="3000" placeholder="Purpose of Visit" required></textarea></label>
            <input type="text" name="website" class="contact-honeypot" tabindex="-1" autocomplete="off" aria-hidden="true">
            <button class="alia-primary-submit" id="contact-submit" type="submit"><span>Submit</span><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path><path d="m21.854 2.147-10.94 10.939"></path></svg></button>
        </form>
    </section>
</main>
<script src="/assets/js/contact.js"></script>
<?php require __DIR__ . '/footer.php'; ?>
