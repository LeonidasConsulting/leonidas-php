<?php
class BlogManager {
    private array $posts;
    private string $jsonPath;

    public function __construct(string $jsonPath) {
        $this->jsonPath = $jsonPath;
        $raw = file_get_contents($jsonPath);
        if (!$raw) throw new RuntimeException("Cannot read blog JSON: $jsonPath");
        $data = json_decode($raw, true);
        if (json_last_error() !== JSON_ERROR_NONE) throw new RuntimeException("Invalid blog JSON");
        $this->posts = array_map(function($p) {
            $p['slug'] = $p['slug'] ?? $this->slugify($p['title']);
            $p['date'] = $p['date'] ?? date('Y-m-d');
            return $p;
        }, $data);
        usort($this->posts, fn($a,$b) => strcmp($b['date'], $a['date']));
    }

    public function all(): array { return $this->posts; }

    public function paginate(int $page, int $perPage = 12): array {
        $offset = ($page - 1) * $perPage;
        return array_slice($this->posts, $offset, $perPage);
    }

    public function totalPages(int $perPage = 12): int {
        return (int) ceil(count($this->posts) / $perPage);
    }

    public function findBySlug(string $slug): ?array {
        foreach ($this->posts as $p) {
            if ($p['slug'] === $slug) return $p;
        }
        return null;
    }

    public function findIndex(string $slug): int {
        foreach ($this->posts as $i => $p) {
            if ($p['slug'] === $slug) return $i;
        }
        return -1;
    }

    public function prev(string $slug): ?array {
        $i = $this->findIndex($slug);
        return ($i > 0) ? $this->posts[$i - 1] : null;
    }

    public function next(string $slug): ?array {
        $i = $this->findIndex($slug);
        return ($i >= 0 && $i < count($this->posts) - 1) ? $this->posts[$i + 1] : null;
    }

    public function byCategory(string $cat): array {
        return array_filter($this->posts, fn($p) => ($p['category'] ?? '') === $cat);
    }

    public function categories(): array {
        return array_unique(array_map(fn($p) => $p['category'] ?? 'General', $this->posts));
    }

    private function slugify(string $text): string {
        return strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $text), '-'));
    }
}
