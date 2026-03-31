<?php
function minify_html(string $html): string {
    if (!defined('ENVIRONMENT') || ENVIRONMENT !== 'production') {
        return $html;
    }
    $html = preg_replace('/<!--(?!\[if).*?-->/s', '', $html);
    $html = preg_replace('/>\s+</', '><', $html);
    $html = preg_replace('/\s{2,}/', ' ', $html);
    return trim($html);
}
