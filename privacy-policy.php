<?php
require_once __DIR__ . '/includes/config.php';
$b = SITE_BASE;
$page_title = 'Privacy Policy | Leonidas';
$page_description = 'Privacy policy for Leonidas managed IT, cybersecurity, and unified communications services.';
$page_url = SITE_URL . '/privacy-policy';
$page_css = '
  .prose-policy { color: #D0D0D0; font-size: 1rem; line-height: 1.8; }
  .prose-policy h2 {
    font-size: 1.3rem; font-weight: 800; color: #FFFFFF;
    margin: 2.5rem 0 0.9rem; letter-spacing: -0.02em;
    padding-bottom: 0.5rem; border-bottom: 1px solid rgba(212,168,67,0.15);
  }
  .prose-policy h3 {
    font-size: 1.05rem; font-weight: 700; color: #E5E5E5;
    margin: 1.75rem 0 0.6rem;
  }
  .prose-policy p { margin-bottom: 1.2rem; }
  .prose-policy ul, .prose-policy ol {
    margin: 0.5rem 0 1.2rem 1.5rem; display: flex; flex-direction: column; gap: 0.4rem;
  }
  .prose-policy li { color: #C8C8C8; }
  .prose-policy ul li::marker { color: #D4A843; }
  .prose-policy ol li::marker { color: #D4A843; font-weight: 700; }
  .prose-policy strong { color: #FFFFFF; font-weight: 600; }
  .prose-policy a { color: #D4A843; text-decoration: underline; text-underline-offset: 3px; }
  .prose-policy a:hover { color: #F0C060; }
';
require_once __DIR__ . '/includes/header.php';
?>
  <section style="padding: 8rem 1.5rem 5rem;">
    <div class="max-w-3xl mx-auto relative z-10">
      <p style="font-size:0.7rem; font-weight:700; letter-spacing:0.2em; color:#D4A843; text-transform:uppercase; margin-bottom:1rem; display:flex; align-items:center; gap:0.75rem;">
        <span style="width:2rem;height:1px;background:#D4A843;display:inline-block;"></span>
        Legal
      </p>
      <h1 style="font-size:clamp(2rem,5vw,3rem); font-weight:900; color:#FFFFFF; margin-bottom:0.75rem; letter-spacing:-0.02em;">Privacy Policy</h1>
      <p style="color:#6B7280; font-size:0.9rem; margin-bottom:3rem;">Last updated: March 2026</p>

      <div class="prose-policy">

        <p>Leonidas ("we," "us," or "our") is committed to protecting the privacy of visitors to our website at <a href="https://leonidastek.com">leonidastek.com</a>. This Privacy Policy explains what information we collect, how we use it, and your choices regarding that information.</p>

        <h2>1. Information We Collect</h2>

        <h3>Contact Form Data</h3>
        <p>When you submit a form on our website (such as the contact or free assessment form), we collect the information you provide, which may include:</p>
        <ul>
          <li>Your name</li>
          <li>Company name</li>
          <li>Email address</li>
          <li>Phone number</li>
          <li>Message or inquiry details</li>
        </ul>
        <p>This information is transmitted via Microsoft Power Automate, a workflow automation service by Microsoft, which routes your form submission to our team via email. Microsoft may process this data in accordance with their privacy practices. Please review <a href="https://privacy.microsoft.com/en-us/privacystatement" target="_blank" rel="noopener noreferrer">Microsoft's Privacy Statement</a> for details.</p>

        <h3>Analytics Data</h3>
        <p>We use Google Analytics 4 (GA4) to understand how visitors use our website. Google Analytics automatically collects certain information, including:</p>
        <ul>
          <li>Pages visited and time spent on each page</li>
          <li>Referring website or search terms</li>
          <li>Browser type, device type, and operating system</li>
          <li>General geographic location (country and city level)</li>
        </ul>
        <p>This data is aggregated and anonymous. We do not use Google Analytics to identify individual visitors. You can opt out of Google Analytics tracking by installing the <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener noreferrer">Google Analytics Opt-out Browser Add-on</a>.</p>

        <h3>AI Chat Widget</h3>
        <p>Our website includes an AI-powered chat assistant. If you interact with this chat widget, your conversation messages may be processed by Anthropic (the provider of the underlying AI model). Conversations are used to generate responses in real time. Please be mindful of the information you share in chat. We recommend reviewing <a href="https://www.anthropic.com/privacy" target="_blank" rel="noopener noreferrer">Anthropic's Privacy Policy</a> for details on how conversation data is handled.</p>

        <h2>2. How We Use Your Information</h2>
        <p>We use the information we collect for the following purposes:</p>
        <ul>
          <li>To respond to your inquiries and provide the services you request</li>
          <li>To understand how our website is being used so we can improve it</li>
          <li>To contact you about our managed IT, cybersecurity, or unified communications services (only if you have reached out to us first)</li>
          <li>To comply with legal obligations</li>
        </ul>
        <p>We do not sell, rent, or trade your personal information to third parties for marketing purposes.</p>

        <h2>3. Cookies</h2>
        <p>Our website uses cookies primarily through Google Analytics to track website usage. Cookies are small text files stored on your device. You can control cookie settings through your browser preferences. Disabling cookies may affect the functionality of certain features on our site.</p>

        <h2>4. Third-Party Services</h2>
        <p>We use the following third-party services that may process data on our behalf:</p>
        <ul>
          <li><strong>Google Analytics</strong> — website traffic analytics</li>
          <li><strong>Microsoft Power Automate</strong> — contact form submission routing and email delivery</li>
          <li><strong>Anthropic</strong> — AI chat widget infrastructure</li>
          <li><strong>Cloudflare Turnstile</strong> — CAPTCHA verification on the contact form</li>
        </ul>
        <p>Each of these services has its own privacy policy and data handling practices. We encourage you to review them independently.</p>

        <h2>5. Data Retention</h2>
        <p>Contact form submissions are retained as long as necessary to respond to your inquiry and for a reasonable period thereafter. Analytics data is retained per Google Analytics' default retention settings. We do not store chat widget conversations on our own servers.</p>

        <h2>6. Your Rights</h2>
        <p>Depending on your location, you may have rights regarding your personal information, including the right to access, correct, or delete data we hold about you. To exercise these rights or ask any privacy-related questions, please contact us at:</p>
        <ul>
          <li>Email: <a href="mailto:sales@leonidastek.com">sales@leonidastek.com</a></li>
          <li>Phone: <a href="tel:8506149343">850-614-9343</a></li>
          <li>Address: 8219 Front Beach Rd, Ste B #2080, Panama City Beach, FL 32407</li>
        </ul>

        <h2>7. Security</h2>
        <p>We take reasonable measures to protect the information you submit through our website. However, no method of transmission over the internet or electronic storage is 100% secure. We cannot guarantee absolute security.</p>

        <h2>8. Children's Privacy</h2>
        <p>Our website is not directed at children under the age of 13, and we do not knowingly collect personal information from children under 13.</p>

        <h2>9. Changes to This Policy</h2>
        <p>We may update this Privacy Policy from time to time. When we do, we will update the "Last updated" date at the top of this page. We encourage you to review this policy periodically.</p>

        <h2>10. Contact Us</h2>
        <p>If you have questions about this Privacy Policy, please contact us:</p>
        <ul>
          <li><strong>Company:</strong> Leonidas</li>
          <li><strong>Address:</strong> 8219 Front Beach Rd, Ste B #2080, Panama City Beach, FL 32407</li>
          <li><strong>Email:</strong> <a href="mailto:sales@leonidastek.com">sales@leonidastek.com</a></li>
          <li><strong>Phone:</strong> <a href="tel:8506149343">850-614-9343</a></li>
        </ul>

      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
