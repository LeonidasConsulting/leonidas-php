<?php
require_once __DIR__ . '/includes/config.php';
$b = SITE_BASE;

$page_title       = 'Contact Leonidas | Florida Panhandle IT Services';
$page_description = 'Contact Leonidas for managed IT, cybersecurity, and unified communications in the Florida Panhandle. Call 850-614-9343 or request a free assessment.';
$page_url         = SITE_URL . '/contact';

require_once __DIR__ . '/includes/header.php';
?>

<style>
  .form-label { display:block; font-size:0.8rem; font-weight:600; color:#9CA3AF; letter-spacing:0.05em; text-transform:uppercase; margin-bottom:0.4rem; }
  .form-input { width:100%; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:0.5rem; padding:0.75rem 1rem; color:#E5E7EB; font-size:0.9rem; outline:none; transition:border-color 0.2s; resize:vertical; min-height:44px; }
  .form-input:focus { border-color:rgba(212,168,67,0.4); }
  .form-select { width:100%; background:#0A0A1A; border:1px solid rgba(255,255,255,0.08); border-radius:0.5rem; padding:0.75rem 1rem; color:#E5E7EB; font-size:0.9rem; outline:none; }
  textarea.form-input { min-height:140px; }
  .form-group { margin-bottom:1.25rem; }
  .contact-card { background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); border-radius:0.75rem; padding:1.25rem; margin-bottom:1rem; }
</style>

  <!-- HERO -->
  <section style="padding-top:8rem; padding-bottom:4rem; position:relative; overflow:hidden;">
    <div class="orb" style="width:600px; height:600px; background:radial-gradient(circle, rgba(212,168,67,0.07) 0%, transparent 70%); top:-150px; right:-100px;"></div>
    <div class="max-w-7xl mx-auto px-6">
      <div class="max-w-3xl">
        <div class="section-label fade-in">Get in Touch</div>
        <h1 class="fade-in fade-in-delay-1" style="font-size:clamp(2.8rem,6vw,5rem); font-weight:900; letter-spacing:-0.03em; line-height:1.05; color:#FFFFFF;">Let's build something <span style="color:#D4A843;">reliable.</span></h1>
        <p class="fade-in fade-in-delay-2 mt-6 text-lg leading-relaxed max-w-xl" style="color:#9CA3AF;">Start with a free conversation. No sales pressure. We diagnose your environment, identify gaps, and tell you exactly what we see — whether or not you become a client.</p>
      </div>
    </div>
  </section>

  <!-- CONTACT SECTION -->
  <section class="pb-28 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

        <!-- FORM -->
        <div class="lg:col-span-7 fade-in">
          <div class="rounded-2xl p-8 md:p-10" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <h2 style="font-size:1.4rem; font-weight:800; color:#FFFFFF; margin-bottom:0.5rem; letter-spacing:-0.02em;">Send us a message</h2>
            <p style="color:#6B7280; font-size:0.9rem; margin-bottom:2rem;">We respond within one business day. Typically much faster.</p>

            <form id="contact-form" action="<?= $b ?>/contact-proxy.php" method="POST" novalidate>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-0 md:gap-4">
                <div class="form-group">
                  <label class="form-label" for="name">Full Name *</label>
                  <input class="form-input" type="text" id="name" name="name" placeholder="Jane Smith" required autocomplete="name"/>
                </div>
                <div class="form-group">
                  <label class="form-label" for="email">Email Address *</label>
                  <input class="form-input" type="email" id="email" name="email" placeholder="jane@company.com" required autocomplete="email"/>
                </div>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-0 md:gap-4">
                <div class="form-group">
                  <label class="form-label" for="phone">Phone Number</label>
                  <input class="form-input" type="tel" id="phone" name="phone" placeholder="850-555-0123" autocomplete="tel"/>
                </div>
                <div class="form-group">
                  <label class="form-label" for="company">Company Name</label>
                  <input class="form-input" type="text" id="company" name="company" placeholder="Acme Corp" autocomplete="organization"/>
                </div>
              </div>

              <div class="form-group">
                <label class="form-label" for="service">Service Interest</label>
                <select class="form-select" id="service" name="service">
                  <option value="" disabled selected>Select a service area...</option>
                  <option value="Managed IT Services">Managed IT Services</option>
                  <option value="Cybersecurity">Cybersecurity</option>
                  <option value="Network Engineering">Network Engineering</option>
                  <option value="Unified Communications / VoIP">Unified Communications / VoIP</option>
                  <option value="Telecom &amp; WAN">Telecom &amp; WAN</option>
                  <option value="Desktop Support">Desktop Support</option>
                  <option value="General Inquiry">General Inquiry</option>
                  <option value="Free Assessment">Free Assessment</option>
                </select>
              </div>

              <div class="form-group">
                <label class="form-label" for="message">Message *</label>
                <textarea class="form-input" id="message" name="message" placeholder="Tell us about your business, current IT setup, and what challenges you're facing..." required></textarea>
              </div>

              <!-- Honeypot — invisible to humans, bots fill it and get silently rejected -->
              <div aria-hidden="true" style="position:absolute;left:-9999px;top:-9999px;width:1px;height:1px;overflow:hidden;" tabindex="-1">
                <label for="website_url">Website URL (leave blank)</label>
                <input type="text" id="website_url" name="website_url" tabindex="-1" autocomplete="off"/>
              </div>

              <!-- Cloudflare Turnstile CAPTCHA -->
              <div class="form-group">
                <div class="cf-turnstile" data-sitekey="<?= TURNSTILE_SITE_KEY ?>"></div>
                <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
              </div>

              <!-- Success/error messages -->
              <div id="form-success" style="display:none; background:rgba(74,222,128,0.08); border:1px solid rgba(74,222,128,0.25); border-radius:0.5rem; padding:1rem; color:#4ADE80; font-size:0.9rem; margin-bottom:1rem;">
                <strong>Message sent!</strong> We'll be in touch within one business day.
              </div>
              <div id="form-error" style="display:none; background:rgba(248,113,113,0.08); border:1px solid rgba(248,113,113,0.25); border-radius:0.5rem; padding:1rem; color:#F87171; font-size:0.9rem; margin-bottom:1rem;">
                Something went wrong. Please try again or email us directly at <a href="mailto:<?= COMPANY_EMAIL ?>" style="color:#F87171; text-decoration:underline;"><?= COMPANY_EMAIL ?></a>
              </div>

              <button type="submit" class="btn-primary w-full justify-center" id="submit-btn">
                Send Message
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </button>
              <p class="mt-4 text-xs text-center" style="color:#6B7280;">By submitting this form, you agree to be contacted by Leonidas regarding your inquiry. We do not sell your information.</p>
            </form>
          </div>
        </div>

        <!-- CONTACT INFO -->
        <div class="lg:col-span-5 fade-in fade-in-delay-1">
          <div class="mb-6">
            <div class="section-label">Reach Us Directly</div>
          </div>

          <div class="contact-card">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5" style="background:rgba(212,168,67,0.1); border:1px solid rgba(212,168,67,0.2);">
                <svg width="18" height="18" fill="none" viewBox="0 0 18 18"><path d="M3 2h4l2 4-2.5 2A10.5 10.5 0 0011 11l2-2.5 4 2v4c0 .5-.5 1-1.5 1C8 15.5 2.5 10 2.5 3 2.5 2 3 1.5 3 2z" stroke="#D4A843" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
              <div>
                <div class="text-xs font-bold tracking-wider mb-1" style="color:#D4A843; letter-spacing:0.12em;">PHONE</div>
                <a href="tel:<?= COMPANY_PHONE_TEL ?>" style="font-size:1.2rem; font-weight:700; color:#FFFFFF; text-decoration:none;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#FFFFFF'"><?= COMPANY_PHONE ?></a>
                <div style="color:#6B7280; font-size:0.8rem; margin-top:0.25rem;">Monday – Friday, 8am – 6pm CT</div>
              </div>
            </div>
          </div>

          <div class="contact-card">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5" style="background:rgba(212,168,67,0.1); border:1px solid rgba(212,168,67,0.2);">
                <svg width="18" height="18" fill="none" viewBox="0 0 18 18"><rect x="1.5" y="3.5" width="15" height="11" rx="1.5" stroke="#D4A843" stroke-width="1.3"/><path d="M1.5 6.5l7.5 5 7.5-5" stroke="#D4A843" stroke-width="1.3" stroke-linecap="round"/></svg>
              </div>
              <div>
                <div class="text-xs font-bold tracking-wider mb-1" style="color:#D4A843; letter-spacing:0.12em;">EMAIL</div>
                <a href="mailto:<?= COMPANY_EMAIL ?>" style="font-size:1rem; font-weight:600; color:#FFFFFF; text-decoration:none; word-break:break-all;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#FFFFFF'"><?= COMPANY_EMAIL ?></a>
                <div style="color:#6B7280; font-size:0.8rem; margin-top:0.25rem;">We respond within one business day</div>
              </div>
            </div>
          </div>

          <div class="contact-card">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5" style="background:rgba(212,168,67,0.1); border:1px solid rgba(212,168,67,0.2);">
                <svg width="18" height="18" fill="none" viewBox="0 0 18 18"><path d="M9 1.5C6 1.5 3.5 4 3.5 7c0 4 5.5 9.5 5.5 9.5S15 11 15 7c0-3-2.5-5.5-6-5.5z" stroke="#D4A843" stroke-width="1.3"/><circle cx="9" cy="7" r="2" stroke="#D4A843" stroke-width="1.3"/></svg>
              </div>
              <div>
                <div class="text-xs font-bold tracking-wider mb-1" style="color:#D4A843; letter-spacing:0.12em;">ADDRESS</div>
                <address style="font-style:normal; color:#FFFFFF; font-size:0.95rem; font-weight:600; line-height:1.5;">8219 Front Beach Rd<br>Ste B #2080<br>Panama City Beach, FL 32407</address>
              </div>
            </div>
          </div>

          <!-- Map placeholder -->
          <div class="rounded-xl overflow-hidden mt-2" style="border:1px solid rgba(212,168,67,0.1); height:220px; background:rgba(255,255,255,0.02); display:flex; align-items:center; justify-content:center;">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3459.2!2d-85.9!3d30.175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sPanama+City+Beach%2C+FL!5e0!3m2!1sen!2sus!4v1"
              width="100%" height="220"
              style="border:0; filter:invert(90%) hue-rotate(180deg) saturate(0.5);"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              title="Leonidas office location — Panama City Beach, FL"
              aria-label="Map showing Leonidas office in Panama City Beach, Florida">
            </iframe>
          </div>

          <!-- Social links -->
          <div class="mt-6 flex items-center gap-4">
            <span class="text-xs font-bold tracking-wider" style="color:#D4A843; letter-spacing:0.12em;">FOLLOW</span>
            <a href="https://x.com/LeonidasTEK" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-sm" style="color:#6B7280; text-decoration:none;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.737-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
              @LeonidasTEK
            </a>
            <a href="https://facebook.com/leonidastek" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-sm" style="color:#6B7280; text-decoration:none;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
              leonidastek
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

<script>
(function() {
  var form = document.getElementById('contact-form');
  var submitBtn = document.getElementById('submit-btn');
  var successMsg = document.getElementById('form-success');
  var errorMsg = document.getElementById('form-error');
  var formStart = Date.now();

  form.addEventListener('submit', async function(e) {
    e.preventDefault();

    // Time gate — reject if submitted in under 3.5 seconds (bot behavior)
    if (Date.now() - formStart < 3500) {
      return; // silently ignore
    }

    submitBtn.disabled = true;
    submitBtn.textContent = 'Sending...';
    successMsg.style.display = 'none';
    errorMsg.style.display = 'none';

    var payload = {
      name:    document.getElementById('name').value,
      email:   document.getElementById('email').value,
      phone:   document.getElementById('phone').value || '',
      company: document.getElementById('company').value || '',
      service: document.getElementById('service').value || '',
      message: document.getElementById('message').value,
      website_url: document.getElementById('website_url').value || '',
      'cf-turnstile-response': document.querySelector('[name="cf-turnstile-response"]')?.value || '',
    };

    try {
      var response = await fetch('<?= $b ?>/contact-proxy.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload),
      });
      var data = await response.json();
      if (data.ok) {
        successMsg.style.display = 'block';
        form.reset();
        if (window.gtag) { gtag('event', 'form_submit', { event_category: 'contact' }); }
      } else {
        errorMsg.style.display = 'block';
        errorMsg.textContent = data.error || 'Something went wrong. Please call us at <?= COMPANY_PHONE ?>.';
      }
    } catch (err) {
      errorMsg.style.display = 'block';
      errorMsg.textContent = 'Could not reach the server. Please call <?= COMPANY_PHONE ?> or email <?= COMPANY_EMAIL ?>.';
    } finally {
      submitBtn.disabled = false;
      submitBtn.innerHTML = 'Send Message <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    }
  });
})();
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
