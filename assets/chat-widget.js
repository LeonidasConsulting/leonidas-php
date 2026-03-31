/**
 * Leonidas AI Chat Widget
 * Drop-in widget — no dependencies, dark/gold theme, mobile-friendly.
 * Communicates with /chat/api.php (PHP proxy for Anthropic API).
 */
(function () {
  'use strict';

  // Production domain — hardcoded so links always resolve correctly
  // regardless of subdirectory depth or file:// local testing
  const SITE_ROOT = 'https://leonidastek.com';
  const API_URL   = SITE_ROOT + '/chat/api.php';
  const ROOT_URL  = SITE_ROOT;

  const GREETING = "Hi! I'm the Leonidas AI assistant. I can answer questions about our managed IT, cybersecurity, networking, and communications services. What can I help you with today?";

  // ── Inject styles ────────────────────────────────────────────────────────────
  const css = `
    html, body { overflow-x: hidden; max-width: 100%; }
    #leo-chat-btn {
      position: fixed; bottom: 28px; right: 16px; z-index: 9998;
      width: 56px; height: 56px; border-radius: 50%;
      background: linear-gradient(135deg, #D4A843, #B8860B);
      border: none; cursor: pointer;
      box-shadow: 0 4px 20px rgba(212,168,67,0.45);
      display: flex; align-items: center; justify-content: center;
      transition: transform 0.2s, box-shadow 0.2s;
    }
    #leo-chat-btn:hover { transform: scale(1.08); box-shadow: 0 6px 28px rgba(212,168,67,0.6); }
    #leo-chat-btn svg { transition: transform 0.25s; }
    #leo-chat-btn.open svg.icon-chat { display: none; }
    #leo-chat-btn.open svg.icon-close { display: block !important; }

    #leo-chat-panel {
      position: fixed; bottom: 88px; right: 16px; z-index: 9999;
      width: 360px; max-width: calc(100vw - 24px);
      height: 520px; max-height: calc(100vh - 120px);
      background: #0D0D20; border: 1px solid rgba(212,168,67,0.18);
      border-radius: 16px; display: flex; flex-direction: column;
      box-shadow: 0 24px 80px rgba(0,0,0,0.7);
      font-family: 'Inter', system-ui, sans-serif;
      transform: translateY(16px) scale(0.97); opacity: 0;
      transition: transform 0.25s cubic-bezier(.34,1.56,.64,1), opacity 0.2s;
      pointer-events: none;
    }
    #leo-chat-panel.visible { transform: translateY(0) scale(1); opacity: 1; pointer-events: all; }

    #leo-chat-header {
      padding: 14px 16px; border-bottom: 1px solid rgba(212,168,67,0.1);
      display: flex; align-items: center; gap: 10px; flex-shrink: 0;
    }
    .leo-avatar {
      width: 32px; height: 32px; border-radius: 50%; flex-shrink: 0;
      background: rgba(212,168,67,0.12); border: 1px solid rgba(212,168,67,0.3);
      display: flex; align-items: center; justify-content: center;
    }
    #leo-chat-header .leo-title { font-weight: 700; font-size: 0.85rem; color: #FFFFFF; letter-spacing: 0.01em; }
    #leo-chat-header .leo-subtitle { font-size: 0.72rem; color: #6B7280; margin-top: 1px; }
    #leo-chat-header .leo-close {
      margin-left: auto; background: none; border: none; cursor: pointer;
      color: #6B7280; padding: 4px; border-radius: 6px; line-height: 1;
      transition: color 0.15s, background 0.15s;
    }
    #leo-chat-header .leo-close:hover { color: #D4A843; background: rgba(212,168,67,0.08); }

    #leo-messages {
      flex: 1; overflow-y: auto; padding: 16px 14px;
      display: flex; flex-direction: column; gap: 12px;
      scroll-behavior: smooth;
    }
    #leo-messages::-webkit-scrollbar { width: 4px; }
    #leo-messages::-webkit-scrollbar-track { background: transparent; }
    #leo-messages::-webkit-scrollbar-thumb { background: rgba(212,168,67,0.2); border-radius: 4px; }

    .leo-msg { display: flex; gap: 8px; align-items: flex-end; max-width: 100%; }
    .leo-msg.user { flex-direction: row-reverse; }
    .leo-bubble {
      padding: 9px 13px; border-radius: 14px; font-size: 0.82rem;
      line-height: 1.55; max-width: 82%; word-break: break-word;
    }
    .leo-msg.bot .leo-bubble {
      background: rgba(255,255,255,0.05); color: #E5E7EB;
      border: 1px solid rgba(255,255,255,0.07);
      border-bottom-left-radius: 4px;
    }
    .leo-msg.user .leo-bubble {
      background: linear-gradient(135deg, #D4A843, #B8860B);
      color: #0A0A1A; font-weight: 500;
      border-bottom-right-radius: 4px;
    }
    .leo-bubble a { color: #D4A843; text-decoration: underline; }
    .leo-bubble strong { color: #FFFFFF; }

    .leo-typing .leo-bubble {
      background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.07);
      padding: 10px 16px; border-bottom-left-radius: 4px;
    }
    .leo-dots { display: flex; gap: 4px; align-items: center; height: 16px; }
    .leo-dots span {
      width: 6px; height: 6px; border-radius: 50%;
      background: #D4A843; opacity: 0.6;
      animation: leoDot 1.2s infinite ease-in-out;
    }
    .leo-dots span:nth-child(2) { animation-delay: 0.2s; }
    .leo-dots span:nth-child(3) { animation-delay: 0.4s; }
    @keyframes leoDot {
      0%, 60%, 100% { transform: translateY(0); opacity: 0.6; }
      30% { transform: translateY(-5px); opacity: 1; }
    }

    .leo-suggestions {
      display: flex; flex-wrap: wrap; gap: 6px; padding: 0 14px 10px;
    }
    .leo-suggestion {
      font-size: 0.73rem; padding: 5px 10px; border-radius: 20px;
      background: rgba(212,168,67,0.08); border: 1px solid rgba(212,168,67,0.2);
      color: #D4A843; cursor: pointer; transition: background 0.15s;
      font-family: inherit;
    }
    .leo-suggestion:hover { background: rgba(212,168,67,0.16); }

    #leo-chat-footer {
      padding: 10px 12px; border-top: 1px solid rgba(212,168,67,0.08); flex-shrink: 0;
    }
    .leo-input-row {
      display: flex; gap: 8px; align-items: flex-end;
      background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);
      border-radius: 12px; padding: 6px 6px 6px 12px;
      transition: border-color 0.15s;
    }
    .leo-input-row:focus-within { border-color: rgba(212,168,67,0.35); }
    #leo-input {
      flex: 1; background: none; border: none; outline: none; resize: none;
      color: #E5E7EB; font-size: 0.82rem; font-family: inherit;
      line-height: 1.4; max-height: 96px; min-height: 20px;
      overflow-y: auto; padding: 2px 0;
    }
    #leo-input::placeholder { color: #4B5563; }
    #leo-send {
      width: 32px; height: 32px; border-radius: 8px; border: none; cursor: pointer;
      background: linear-gradient(135deg, #D4A843, #B8860B);
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0; transition: opacity 0.15s, transform 0.15s;
    }
    #leo-send:disabled { opacity: 0.35; cursor: not-allowed; transform: none; }
    #leo-send:not(:disabled):hover { transform: scale(1.08); }
    .leo-footer-note {
      text-align: center; font-size: 0.65rem; color: #6B7280;
      margin-top: 7px; letter-spacing: 0.01em;
    }
    .leo-footer-note a {
      color: #D4A843; text-decoration: underline; cursor: pointer;
    }
    .leo-footer-note a:hover { color: #F0C060; }

    @media (max-width: 640px) {
      #leo-chat-panel { right: 8px; left: 8px; width: auto; bottom: 76px; }
      #leo-chat-btn { bottom: 16px; right: 12px; }
    }
  `;

  const style = document.createElement('style');
  style.textContent = css;
  document.head.appendChild(style);

  // ── Build HTML ───────────────────────────────────────────────────────────────
  const spartan = `<svg width="16" height="16" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M16 3C13 3 10 5 10 8v2H8v3h1l1 3-2 8h16l-2-8 1-3h1v-3h-2V8c0-3-3-5-6-5z" stroke="#D4A843" stroke-width="1.5" fill="none"/>
    <path d="M12 10h8M13 13h6" stroke="#D4A843" stroke-width="1.2" stroke-linecap="round"/>
  </svg>`;

  const chatIcon = `<svg class="icon-chat" width="22" height="22" viewBox="0 0 22 22" fill="none">
    <path d="M3 4h16c.6 0 1 .4 1 1v10c0 .6-.4 1-1 1H7l-4 3V5c0-.6.4-1 1-1z" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M7 9h8M7 12h5" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
  </svg>`;

  const closeIcon = `<svg class="icon-close" width="18" height="18" viewBox="0 0 18 18" fill="none" style="display:none">
    <path d="M4 4l10 10M14 4L4 14" stroke="white" stroke-width="2" stroke-linecap="round"/>
  </svg>`;

  const sendIcon = `<svg width="14" height="14" viewBox="0 0 14 14" fill="none">
    <path d="M12 7H2M7 2l5 5-5 5" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>`;

  // Build the panel — use ROOT_URL so the contact link works from any subdirectory
  document.body.insertAdjacentHTML('beforeend', `
    <button id="leo-chat-btn" aria-label="Chat with Leonidas AI" title="Chat with us">
      ${chatIcon}${closeIcon}
    </button>

    <div id="leo-chat-panel" role="dialog" aria-label="Leonidas AI Chat" aria-hidden="true">
      <div id="leo-chat-header">
        <div class="leo-avatar">${spartan}</div>
        <div>
          <div class="leo-title">Leonidas AI</div>
          <div class="leo-subtitle">Usually replies instantly</div>
        </div>
        <button class="leo-close" aria-label="Close chat">
          <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
            <path d="M2 2l10 10M12 2L2 12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
          </svg>
        </button>
      </div>

      <div id="leo-messages" aria-live="polite" aria-atomic="false"></div>

      <div class="leo-suggestions" id="leo-suggestions"></div>

      <div id="leo-chat-footer">
        <div class="leo-input-row">
          <textarea id="leo-input" rows="1" placeholder="Ask about our services…" aria-label="Chat message"></textarea>
          <button id="leo-send" aria-label="Send message" disabled>${sendIcon}</button>
        </div>
        <div class="leo-footer-note">
          Powered by Leonidas AI &nbsp;·&nbsp;
          <a href="${ROOT_URL}/contact.html">Talk to a human</a>
        </div>
      </div>
    </div>
  `);

  // ── State ────────────────────────────────────────────────────────────────────
  const panel       = document.getElementById('leo-chat-panel');
  const btn         = document.getElementById('leo-chat-btn');
  const messages    = document.getElementById('leo-messages');
  const input       = document.getElementById('leo-input');
  const sendBtn     = document.getElementById('leo-send');
  const suggestions = document.getElementById('leo-suggestions');

  let history   = []; // [{role, content}]
  let isOpen    = false;
  let isLoading = false;
  let greeted   = false;

  const SUGGESTIONS = [
    'What services do you offer?',
    'How does managed IT work?',
    'Do you handle cybersecurity?',
    'Tell me about VoIP options',
    'How do I get a free assessment?',
  ];

  // ── Helpers ──────────────────────────────────────────────────────────────────
  function scrollBottom() {
    messages.scrollTop = messages.scrollHeight;
  }

  /**
   * Add a message bubble from AI or user.
   * @param {string} role  - 'bot' | 'user'
   * @param {string} text  - plain text (will be formatted/escaped)
   */
  function addMessage(role, text) {
    const div = document.createElement('div');
    div.className = `leo-msg ${role}`;
    const bubble = document.createElement('div');
    bubble.className = 'leo-bubble';
    bubble.innerHTML = role === 'user' ? escapeHTML(text) : formatBotText(text);
    if (role === 'bot') {
      const avatar = document.createElement('div');
      avatar.className = 'leo-avatar';
      avatar.innerHTML = spartan;
      div.appendChild(avatar);
    }
    div.appendChild(bubble);
    messages.appendChild(div);
    scrollBottom();
    return div;
  }

  /**
   * Add a bot message that contains pre-built safe HTML (for error fallbacks).
   * Bypasses text escaping — only use with hardcoded strings, never user input.
   */
  function addBotHTML(html) {
    const div = document.createElement('div');
    div.className = 'leo-msg bot';
    const avatar = document.createElement('div');
    avatar.className = 'leo-avatar';
    avatar.innerHTML = spartan;
    const bubble = document.createElement('div');
    bubble.className = 'leo-bubble';
    bubble.innerHTML = html;
    div.appendChild(avatar);
    div.appendChild(bubble);
    messages.appendChild(div);
    scrollBottom();
  }

  /** Escape user input for safe display */
  function escapeHTML(text) {
    return text
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/\n/g, '<br>');
  }

  /**
   * Format AI response text:
   * - Escapes HTML first (safe)
   * - Then converts markdown bold/italic
   * - Auto-links https:// URLs
   * - Auto-links email addresses
   * - Auto-links phone numbers
   */
  function formatBotText(text) {
    return escapeHTML(text)
      // Bold **text**
      .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
      // Italic *text*
      .replace(/\*(.*?)\*/g, '<em>$1</em>')
      // https:// URLs
      .replace(/(https?:\/\/[^\s<]+)/g, '<a href="$1" target="_blank" rel="noopener noreferrer">$1</a>')
      // Email addresses
      .replace(/([a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,})/g, '<a href="mailto:$1">$1</a>')
      // US phone numbers like 850-614-9343 or (850) 614-9343
      .replace(/(\(?\d{3}\)?[\s.\-]\d{3}[\s.\-]\d{4})/g, function(match) {
        const digits = match.replace(/\D/g, '');
        return '<a href="tel:' + digits + '">' + match + '</a>';
      });
  }

  function showTyping() {
    const el = document.createElement('div');
    el.className = 'leo-msg bot leo-typing';
    el.id = 'leo-typing';
    const avatar = document.createElement('div');
    avatar.className = 'leo-avatar';
    avatar.innerHTML = spartan;
    el.innerHTML = '';
    el.appendChild(avatar);
    const bubble = document.createElement('div');
    bubble.className = 'leo-bubble';
    bubble.innerHTML = '<div class="leo-dots"><span></span><span></span><span></span></div>';
    el.appendChild(bubble);
    messages.appendChild(el);
    scrollBottom();
  }

  function removeTyping() {
    const el = document.getElementById('leo-typing');
    if (el) el.remove();
  }

  function setSuggestions(show) {
    suggestions.innerHTML = '';
    if (!show) return;
    SUGGESTIONS.forEach(s => {
      const sugBtn = document.createElement('button');
      sugBtn.className = 'leo-suggestion';
      sugBtn.textContent = s;
      sugBtn.addEventListener('click', () => {
        setSuggestions(false);
        sendMessage(s);
      });
      suggestions.appendChild(sugBtn);
    });
  }

  function autoResize() {
    input.style.height = 'auto';
    input.style.height = Math.min(input.scrollHeight, 96) + 'px';
    sendBtn.disabled = input.value.trim() === '' || isLoading;
  }

  // ── Open / Close ─────────────────────────────────────────────────────────────
  function openChat() {
    isOpen = true;
    panel.classList.add('visible');
    panel.setAttribute('aria-hidden', 'false');
    btn.classList.add('open');
    btn.setAttribute('aria-expanded', 'true');
    input.focus();
    if (!greeted) {
      greeted = true;
      addMessage('bot', GREETING);
      setSuggestions(true);
    }
  }

  function closeChat() {
    isOpen = false;
    panel.classList.remove('visible');
    panel.setAttribute('aria-hidden', 'true');
    btn.classList.remove('open');
    btn.setAttribute('aria-expanded', 'false');
  }

  btn.addEventListener('click', () => isOpen ? closeChat() : openChat());
  document.querySelector('#leo-chat-header .leo-close').addEventListener('click', closeChat);

  document.addEventListener('keydown', e => {
    if (e.key === 'Escape' && isOpen) closeChat();
  });

  // ── Send message ─────────────────────────────────────────────────────────────
  async function sendMessage(text) {
    text = (text || input.value).trim();
    if (!text || isLoading) return;

    setSuggestions(false);
    input.value = '';
    input.style.height = 'auto';
    sendBtn.disabled = true;

    addMessage('user', text);
    history.push({ role: 'user', content: text });

    isLoading = true;
    showTyping();

    try {
      const res = await fetch(API_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ messages: history }),
      });

      const data = await res.json();
      removeTyping();

      if (data.error) {
        addBotHTML(
          'Sorry, something went wrong. You can reach us directly at ' +
          '<a href="tel:8506149343">850-614-9343</a> or ' +
          '<a href="mailto:sales@leonidastek.com">sales@leonidastek.com</a>.'
        );
      } else {
        addMessage('bot', data.reply);
        history.push({ role: 'assistant', content: data.reply });
      }
    } catch (err) {
      removeTyping();
      // Detect file:// local testing — chat requires a live PHP server
      const isLocal = window.location.protocol === 'file:';
      addBotHTML(
        isLocal
          ? 'The AI chat requires the live website to work — it runs on a PHP server. ' +
            'Upload to GoDaddy and it will work. In the meantime, reach us at ' +
            '<a href="tel:8506149343">850-614-9343</a> or ' +
            '<a href="mailto:sales@leonidastek.com">sales@leonidastek.com</a>.'
          : 'Sorry, I had trouble connecting. Please try again or reach us directly at ' +
            '<a href="tel:8506149343">850-614-9343</a> or ' +
            '<a href="mailto:sales@leonidastek.com">sales@leonidastek.com</a>.'
      );
    }

    isLoading = false;
    input.focus();
  }

  sendBtn.addEventListener('click', () => sendMessage());
  input.addEventListener('keydown', e => {
    if (e.key === 'Enter' && !e.shiftKey) {
      e.preventDefault();
      sendMessage();
    }
  });
  input.addEventListener('input', autoResize);
})();
