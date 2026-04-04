<?php
// SITE_BASE is always defined by the time footer.php is included
// (header.php required config.php first). This is a safety fallback.
defined('SITE_BASE') || define('SITE_BASE', '');
$b = SITE_BASE;
?>
<!-- FOOTER -->
<footer style="background:#050510; border-top:1px solid rgba(212,168,67,0.08); position:relative; z-index:1;">
  <div class="max-w-7xl mx-auto px-6 pt-16 pb-10">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-10 mb-14">
      <div class="md:col-span-5">
        <a href="<?= $b ?>/" class="inline-flex items-center gap-3 mb-5">
          <img src="<?= $b ?>/content/images/Leonidas Consulting - LOGO.png"
               alt="Leonidas — Managed IT, Cybersecurity &amp; Unified Communications"
               width="32" height="32"
               style="height:32px;width:auto;display:block;object-fit:contain;"
               loading="lazy">
          <span style="font-weight:800; letter-spacing:0.18em; color:#FFFFFF; font-size:1.05rem;">LEONIDAS</span>
        </a>
        <p class="text-sm leading-relaxed mb-6 max-w-xs" style="color:#6B7280;">The new standard in managed IT, cybersecurity, and unified communications. Headquartered in Panama City Beach, FL — serving the Florida Panhandle.</p>
        <p class="text-xs font-semibold tracking-widest mb-3" style="color:#D4A843; letter-spacing:0.15em;">FOLLOW US</p>
        <div class="flex gap-3">
          <a href="https://x.com/LeonidasTEK" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-lg flex items-center justify-center transition-all" style="background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); color:#6B7280;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.color='#D4A843'" onmouseout="this.style.borderColor='rgba(255,255,255,0.08)';this.style.color='#6B7280'" aria-label="X (Twitter)">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.737-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
          </a>
          <a href="https://facebook.com/leonidastek" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-lg flex items-center justify-center transition-all" style="background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); color:#6B7280;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.color='#D4A843'" onmouseout="this.style.borderColor='rgba(255,255,255,0.08)';this.style.color='#6B7280'" aria-label="Facebook">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          </a>
        </div>
      </div>
      <div class="md:col-span-3 md:col-start-7">
        <p class="text-xs font-bold tracking-widest mb-5" style="color:#D4A843; letter-spacing:0.15em;">SERVICES</p>
        <nav class="flex flex-col gap-3" aria-label="Footer services">
          <a href="<?= $b ?>/services/managed-it"             class="text-sm" style="color:#6B7280;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">Managed IT</a>
          <a href="<?= $b ?>/services/cybersecurity"          class="text-sm" style="color:#6B7280;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">Cybersecurity</a>
          <a href="<?= $b ?>/services/network-engineering"    class="text-sm" style="color:#6B7280;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">Network Engineering</a>
          <a href="<?= $b ?>/services/unified-communications" class="text-sm" style="color:#6B7280;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">Unified Communications</a>
          <a href="<?= $b ?>/services/telecom-wan"            class="text-sm" style="color:#6B7280;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">Telecom &amp; WAN</a>
          <a href="<?= $b ?>/services/desktop-support"        class="text-sm" style="color:#6B7280;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">Desktop Support</a>
        </nav>
      </div>
      <div class="md:col-span-3 md:col-start-10">
        <p class="text-xs font-bold tracking-widest mb-5" style="color:#D4A843; letter-spacing:0.15em;">CONTACT</p>
        <div class="flex flex-col gap-3">
          <a href="tel:8506149343"                 class="text-sm" style="color:#6B7280;" onmouseover="this.style.color='#FFFFFF'" onmouseout="this.style.color='#6B7280'">850-614-9343</a>
          <a href="mailto:sales@leonidastek.com"   class="text-sm" style="color:#6B7280;" onmouseover="this.style.color='#FFFFFF'" onmouseout="this.style.color='#6B7280'">sales@leonidastek.com</a>
          <p class="text-sm leading-relaxed" style="color:#6B7280;">8219 Front Beach Rd<br>Ste B #2080<br>Panama City Beach, FL 32407</p>
          <a href="<?= $b ?>/about"  class="text-sm" style="color:#6B7280;" onmouseover="this.style.color='#FFFFFF'" onmouseout="this.style.color='#6B7280'">About</a>
          <a href="<?= $b ?>/blog/"      class="text-sm" style="color:#6B7280;" onmouseover="this.style.color='#FFFFFF'" onmouseout="this.style.color='#6B7280'">Blog</a>
        </div>
      </div>
    </div>
    <div style="border-top:1px solid rgba(255,255,255,0.05); padding-top:1.5rem;" class="flex flex-col md:flex-row justify-between items-center gap-3">
      <p class="text-xs" style="color:#374151;">© <?= date('Y') ?> Leonidas. All rights reserved. Panama City Beach, FL. · <a href="<?= $b ?>/privacy-policy" style="color:#6B7280; text-decoration:none;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">Privacy Policy</a> · <a href="<?= $b ?>/terms-and-conditions" style="color:#6B7280; text-decoration:none;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">Terms &amp; Conditions</a></p>
      <p class="text-xs" style="color:#374151;">Managed IT · Cybersecurity · Unified Communications</p>
    </div>
  </div>
</footer>
<script>
(function(){
  var els = document.querySelectorAll('.fade-in');
  if (!els.length || !window.IntersectionObserver) {
    els.forEach(function(el){ el.classList.add('visible'); });
    return;
  }
  var obs = new IntersectionObserver(function(entries){
    entries.forEach(function(e){
      if (e.isIntersecting){ e.target.classList.add('visible'); obs.unobserve(e.target); }
    });
  }, { threshold: 0.1 });
  els.forEach(function(el){ obs.observe(el); });
})();
</script>
<script src="<?= $b ?>/assets/chat-widget.js?v=2" defer></script>
