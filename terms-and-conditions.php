<?php
require_once __DIR__ . '/includes/config.php';
$b = SITE_BASE;
$page_title = 'Terms and Conditions | Leonidas';
$page_description = 'Terms and conditions governing the use of Leonidas managed IT, cybersecurity, and unified communications services.';
$page_url = SITE_URL . '/terms-and-conditions';
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
      <h1 style="font-size:clamp(2rem,5vw,3rem); font-weight:900; color:#FFFFFF; margin-bottom:0.75rem; letter-spacing:-0.02em;">Terms and Conditions</h1>
      <p style="color:#6B7280; font-size:0.9rem; margin-bottom:3rem;">Last updated: March 2026</p>

      <div class="prose-policy">

        <p>Please read these Terms and Conditions ("Terms") carefully before using the website at <a href="https://leonidastek.com">leonidastek.com</a> or engaging Leonidas ("Company," "we," "us," or "our") for any services. By accessing our website or entering into a service agreement with us, you agree to be bound by these Terms. If you do not agree, please do not use our website or services.</p>

        <h2>1. Acceptance of Terms</h2>
        <p>By accessing or using this website, submitting an inquiry, or executing a Service Agreement or Statement of Work with Leonidas, you confirm that you have read, understood, and agree to these Terms. If you are entering into these Terms on behalf of a business or organization, you represent that you have the authority to bind that entity.</p>

        <h2>2. Services</h2>
        <p>Leonidas provides managed IT, cybersecurity (MSSP), network engineering, unified communications, telecom and WAN, and desktop support services. The specific scope, deliverables, pricing, and timelines for any engagement are governed by a separate written Service Agreement and/or Statement of Work (SOW) executed between Leonidas and the client.</p>
        <p>Nothing on this website constitutes an offer or guarantee of specific service outcomes. Service capabilities, pricing, and availability are subject to change without notice.</p>

        <h2>3. Service Agreements</h2>

        <h3>Governing Documents</h3>
        <p>All managed services engagements are governed by a Master Service Agreement (MSA) and applicable Statements of Work. In the event of any conflict between these Terms and a signed MSA, the MSA shall control.</p>

        <h3>Service Levels</h3>
        <p>Response times, uptime commitments, and service level objectives (SLOs) are defined in your individual Service Agreement. Leonidas does not make blanket SLA guarantees through this website.</p>

        <h3>Third-Party Products and Vendors</h3>
        <p>Many services delivered by Leonidas incorporate third-party hardware, software, and carrier services (including but not limited to Microsoft, Cisco, RingCentral, and various ISPs and telecom carriers). Leonidas is not liable for outages, defects, or failures attributable to third-party vendors. Vendor-specific warranties and support terms apply.</p>

        <h2>4. Payment Terms</h2>
        <p>Payment terms are established in your Service Agreement. Unless otherwise agreed in writing:</p>
        <ul>
          <li>Invoices are due net 30 days from the invoice date</li>
          <li>Late payments may be subject to a monthly finance charge of 1.5% or the maximum rate permitted by law, whichever is less</li>
          <li>Leonidas reserves the right to suspend services for accounts more than 30 days past due</li>
          <li>All fees are non-refundable unless otherwise stated in your Service Agreement</li>
        </ul>

        <h2>5. Acceptable Use of This Website</h2>
        <p>You agree not to use this website to:</p>
        <ul>
          <li>Transmit spam, unsolicited messages, or automated submissions</li>
          <li>Attempt to gain unauthorized access to any portion of the website or its underlying systems</li>
          <li>Upload or transmit viruses, malware, or any other malicious code</li>
          <li>Scrape, crawl, or harvest content or data without prior written consent</li>
          <li>Engage in any activity that disrupts or interferes with the website's normal operation</li>
          <li>Violate any applicable local, state, federal, or international law or regulation</li>
        </ul>

        <h2>6. Intellectual Property</h2>
        <p>All content on this website — including text, graphics, logos, icons, images, and software — is the property of Leonidas or its content suppliers and is protected by applicable intellectual property laws. You may not reproduce, distribute, modify, or create derivative works from any content on this website without prior written permission from Leonidas.</p>
        <p>Any tools, scripts, configurations, or documentation created by Leonidas specifically for a client engagement remain the intellectual property of Leonidas unless explicitly transferred in writing as part of a service agreement.</p>

        <h2>7. Confidentiality</h2>
        <p>In the course of providing services, Leonidas may have access to confidential business information, network configurations, credentials, and data belonging to clients. Leonidas treats all client information as confidential and does not disclose it to third parties except as required by law or as necessary to deliver the contracted services. Clients are similarly expected to treat Leonidas's proprietary methods, pricing, and documentation as confidential.</p>

        <h2>8. Data and Security</h2>

        <h3>Client Data</h3>
        <p>Leonidas may access, process, or store client data as necessary to provide managed services. Clients are responsible for ensuring they have the legal right to share any data with Leonidas. Leonidas implements reasonable administrative, technical, and physical safeguards to protect client data.</p>

        <h3>Cybersecurity Services Disclaimer</h3>
        <p>While Leonidas employs industry-standard security practices and tools, no security solution can guarantee complete protection against all threats. Leonidas does not warrant that its cybersecurity services will prevent all breaches, data loss, or cyberattacks. Clients are encouraged to maintain cyber liability insurance and independent backup strategies.</p>

        <h3>Breach Notification</h3>
        <p>In the event Leonidas becomes aware of a security incident affecting client data, we will notify the affected client in accordance with applicable law and the terms of the governing Service Agreement.</p>

        <h2>9. Disclaimer of Warranties</h2>
        <p>THIS WEBSITE AND ITS CONTENT ARE PROVIDED ON AN "AS IS" AND "AS AVAILABLE" BASIS WITHOUT WARRANTIES OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, OR NON-INFRINGEMENT. LEONIDAS DOES NOT WARRANT THAT THE WEBSITE WILL BE UNINTERRUPTED, ERROR-FREE, OR FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS.</p>

        <h2>10. Limitation of Liability</h2>
        <p>TO THE FULLEST EXTENT PERMITTED BY APPLICABLE LAW, LEONIDAS AND ITS OFFICERS, DIRECTORS, EMPLOYEES, AND AGENTS SHALL NOT BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, OR PUNITIVE DAMAGES ARISING OUT OF OR RELATED TO YOUR USE OF THIS WEBSITE OR OUR SERVICES, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.</p>
        <p>IN NO EVENT SHALL LEONIDAS'S TOTAL LIABILITY TO YOU FOR ALL CLAIMS ARISING OUT OF OR RELATED TO A SERVICE ENGAGEMENT EXCEED THE TOTAL FEES PAID BY YOU TO LEONIDAS IN THE THREE (3) MONTHS IMMEDIATELY PRECEDING THE EVENT GIVING RISE TO THE CLAIM.</p>

        <h2>11. Indemnification</h2>
        <p>You agree to indemnify, defend, and hold harmless Leonidas and its officers, directors, employees, and agents from and against any claims, liabilities, damages, losses, and expenses (including reasonable attorneys' fees) arising out of or in any way connected with your use of this website, your violation of these Terms, or your violation of any rights of another party.</p>

        <h2>12. Termination</h2>
        <p>Leonidas reserves the right to terminate or suspend access to this website at any time, without notice, for conduct that we believe violates these Terms or is harmful to other users, Leonidas, third parties, or for any other business reason.</p>
        <p>Termination of services is governed by the terms of your Service Agreement. Unless otherwise specified, either party may terminate a month-to-month engagement with 30 days' written notice. Termination of multi-year or committed-term agreements is subject to the early termination provisions in the applicable Service Agreement.</p>

        <h2>13. Links to Third-Party Websites</h2>
        <p>This website may contain links to third-party websites for informational purposes. These links do not constitute an endorsement of those sites or their content. Leonidas has no control over and assumes no responsibility for the content, privacy policies, or practices of any third-party websites.</p>

        <h2>14. Governing Law and Dispute Resolution</h2>
        <p>These Terms shall be governed by and construed in accordance with the laws of the State of Florida, without regard to its conflict of law provisions. Any dispute arising out of or relating to these Terms or your use of this website shall be subject to the exclusive jurisdiction of the state and federal courts located in Bay County, Florida.</p>
        <p>For disputes arising under a Service Agreement, the dispute resolution process outlined in that agreement shall govern.</p>

        <h2>15. Changes to These Terms</h2>
        <p>We reserve the right to modify these Terms at any time. When we do, we will update the "Last updated" date at the top of this page. Your continued use of this website following any changes constitutes your acceptance of the revised Terms. We encourage you to review these Terms periodically.</p>

        <h2>16. Severability</h2>
        <p>If any provision of these Terms is found to be unenforceable or invalid, that provision will be limited or eliminated to the minimum extent necessary so that the remaining Terms will otherwise remain in full force and effect.</p>

        <h2>17. Entire Agreement</h2>
        <p>These Terms, together with our <a href="privacy-policy">Privacy Policy</a> and any applicable Service Agreement, constitute the entire agreement between you and Leonidas with respect to your use of this website and supersede all prior agreements and understandings.</p>

        <h2>18. Contact Us</h2>
        <p>If you have questions about these Terms and Conditions, please contact us:</p>
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
