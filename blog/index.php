<?php
require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/lib/BlogManager.php';

$blog    = new BlogManager(BLOG_JSON);
$page    = max(1, (int)($_GET['page'] ?? 1));
$posts   = $blog->paginate($page);
$total   = $blog->totalPages();

$page_title       = 'IT &amp; Cybersecurity Blog | Leonidas — The New Standard';
$page_description = 'Expert insights on managed IT, cybersecurity, network engineering, and unified communications for Florida Panhandle businesses.';
$page_url         = SITE_URL . '/blog/';

require_once dirname(__DIR__) . '/includes/header.php';
?>

  <!-- HERO -->
  <section style="padding-top:8rem; padding-bottom:4rem; position:relative; overflow:hidden;">
    <div class="orb" style="width:600px; height:600px; background:radial-gradient(circle, rgba(212,168,67,0.06) 0%, transparent 70%); top:-150px; right:-150px;"></div>
    <div class="max-w-7xl mx-auto px-6">
      <div class="max-w-3xl">
        <div class="section-label fade-in">Insights &amp; Resources</div>
        <h1 class="fade-in fade-in-delay-1" style="font-size:clamp(2.5rem,5vw,4rem); font-weight:900; letter-spacing:-0.03em; line-height:1.05; color:#FFFFFF;">IT &amp; Security<br><span style="color:#D4A843;">Intelligence.</span></h1>
        <p class="fade-in fade-in-delay-2 mt-6 text-lg leading-relaxed max-w-xl" style="color:#9CA3AF;">Practical guidance on managed IT, cybersecurity, network engineering, and unified communications for Florida Panhandle businesses.</p>
      </div>
    </div>
  </section>

<!-- Blog AI Assistant -->
<?php
$manifest = implode("\n", array_map(
    fn($p) => ($p['category'] ?? 'General') . '|' . $p['title'] . '|' . $p['slug'],
    $blog->all()
));
?>
<section style="max-width:1280px;margin:0 auto;padding:0 1.5rem 3rem;">
  <div id="blogAssistant" style="background:rgba(255,255,255,0.02);border:1px solid rgba(212,168,67,0.15);border-radius:1rem;overflow:hidden;">
    <div style="padding:1.1rem 1.5rem;border-bottom:1px solid rgba(212,168,67,0.1);display:flex;align-items:center;gap:0.85rem;">
      <div style="width:32px;height:32px;border-radius:50%;background:rgba(212,168,67,0.12);border:1px solid rgba(212,168,67,0.3);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
        <svg width="14" height="14" viewBox="0 0 32 32" fill="none"><path d="M16 3C13 3 10 5 10 8v2H8v3h1l1 3-2 8h16l-2-8 1-3h1v-3h-2V8c0-3-3-5-6-5z" stroke="#D4A843" stroke-width="1.5" fill="none"/></svg>
      </div>
      <div>
        <div style="font-weight:700;font-size:0.85rem;color:#FFFFFF;">Leonidas Blog Assistant</div>
        <div style="font-size:0.72rem;color:#6B7280;">Ask me to find articles on any topic</div>
      </div>
    </div>
    <div id="baMessages" style="display:none;flex-direction:column;gap:0.75rem;padding:1rem 1.25rem;max-height:260px;overflow-y:auto;"></div>
    <div style="padding:0.75rem 1rem;border-top:1px solid rgba(255,255,255,0.05);display:flex;gap:0.5rem;">
      <input id="baInput" type="text" placeholder="e.g. &quot;What do you have on CMMC compliance?&quot;"
             style="flex:1;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.08);border-radius:0.5rem;padding:0.6rem 0.9rem;color:#E5E7EB;font-size:0.82rem;outline:none;"
             aria-label="Ask the blog assistant"/>
      <button id="baBtn" style="padding:0.6rem 1rem;background:#D4A843;border:none;border-radius:0.5rem;color:#0A0A1A;font-weight:700;font-size:0.8rem;cursor:pointer;">Ask</button>
    </div>
  </div>
</section>
<script>
window.BLOG_MANIFEST = <?= json_encode($manifest) ?>;
(function(){
  var history=[],sending=false;
  var msgBox=document.getElementById('baMessages');
  var input=document.getElementById('baInput');
  var btn=document.getElementById('baBtn');
  function escHtml(s){return s.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');}
  function baFormat(text){
    var s=escHtml(text);
    s=s.replace(/\[([^\]]+)\]\(([^)]+)\)/g,'<a href="$2" style="color:#D4A843;">$1</a>');
    s=s.replace(/\*\*([^*\n]+)\*\*/g,'<strong>$1</strong>');
    s=s.replace(/\n\n+/g,'</p><p>').replace(/\n/g,'<br>');
    return '<p>'+s+'</p>';
  }
  function addMsg(role,html){
    var el=document.createElement('div');
    el.style.cssText=role==='user'
      ?'align-self:flex-end;background:linear-gradient(135deg,#D4A843,#B8860B);color:#0A0A1A;padding:0.5rem 0.85rem;border-radius:12px 12px 2px 12px;font-size:0.82rem;max-width:80%;'
      :'align-self:flex-start;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.07);color:#E5E7EB;padding:0.5rem 0.85rem;border-radius:12px 12px 12px 2px;font-size:0.82rem;max-width:85%;line-height:1.55;';
    el.innerHTML=html;
    msgBox.style.display='flex';
    msgBox.appendChild(el);
    msgBox.scrollTop=msgBox.scrollHeight;
    return el;
  }
  function send(){
    var text=(input.value||'').trim();
    if(!text||sending)return;
    sending=true;input.value='';btn.disabled=true;
    addMsg('user',escHtml(text));
    history.push({role:'user',content:text});
    var dots=addMsg('bot','<span style="opacity:0.5">…</span>');
    fetch('/chat/blog-api.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({messages:history,manifest:window.BLOG_MANIFEST||''})})
    .then(function(r){return r.json();})
    .then(function(data){dots.remove();var reply=data.reply||data.error||'Sorry, something went wrong.';history.push({role:'assistant',content:reply});addMsg('bot',baFormat(reply));})
    .catch(function(){dots.remove();addMsg('bot','Connection error. Try browsing the articles below.');})
    .finally(function(){sending=false;btn.disabled=false;input.focus();});
  }
  btn.addEventListener('click',send);
  input.addEventListener('keydown',function(e){if(e.key==='Enter')send();});
})();
</script>

<!-- Post Grid -->
<section style="max-width:1280px;margin:0 auto;padding:0 1.5rem 4rem;">
  <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:1.5rem;">
    <?php foreach ($posts as $post): ?>
    <article style="background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.06);border-radius:1rem;padding:1.5rem;transition:border-color 0.2s;"
             onmouseover="this.style.borderColor='rgba(212,168,67,0.2)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'">
      <?php if (!empty($post['category'])): ?>
      <span style="font-size:0.68rem;font-weight:700;letter-spacing:0.15em;color:#D4A843;text-transform:uppercase;"><?= htmlspecialchars($post['category']) ?></span>
      <?php endif; ?>
      <h2 style="font-size:1rem;font-weight:700;color:#FFFFFF;margin:0.5rem 0 0.75rem;line-height:1.4;">
        <a href="/blog/<?= htmlspecialchars($post['slug']) ?>" style="text-decoration:none;color:inherit;"><?= htmlspecialchars($post['title']) ?></a>
      </h2>
      <?php if (!empty($post['excerpt'])): ?>
      <p style="font-size:0.82rem;color:#9CA3AF;line-height:1.6;margin-bottom:1rem;"><?= htmlspecialchars($post['excerpt']) ?></p>
      <?php endif; ?>
      <div style="display:flex;align-items:center;justify-content:space-between;">
        <span style="font-size:0.72rem;color:#6B7280;"><?= htmlspecialchars($post['date'] ?? '') ?></span>
        <a href="/blog/<?= htmlspecialchars($post['slug']) ?>" style="font-size:0.78rem;font-weight:600;color:#D4A843;text-decoration:none;">Read →</a>
      </div>
    </article>
    <?php endforeach; ?>
  </div>

  <?php if ($total > 1): ?>
  <nav style="margin-top:3rem;display:flex;gap:0.5rem;justify-content:center;" aria-label="Blog pagination">
    <?php for ($i = 1; $i <= $total; $i++): ?>
    <a href="/blog/?page=<?= $i ?>"
       style="width:2rem;height:2rem;display:flex;align-items:center;justify-content:center;border-radius:0.375rem;font-size:0.82rem;text-decoration:none;
              <?= $i === $page ? 'background:#D4A843;color:#0A0A1A;font-weight:700;' : 'border:1px solid rgba(255,255,255,0.1);color:#9CA3AF;' ?>"
       <?= $i === $page ? 'aria-current="page"' : '' ?>><?= $i ?></a>
    <?php endfor; ?>
  </nav>
  <?php endif; ?>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
