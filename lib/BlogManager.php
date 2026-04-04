<?php
require_once __DIR__ . '/../includes/config.php';
$b = SITE_BASE;
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

    public static function generateBody(array $post): string {
        $title    = htmlspecialchars($post['title'] ?? '');
        $category = $post['category'] ?? 'Managed IT';

        $intros = [
            'Cybersecurity'   => 'In an era where cyber threats evolve faster than most organizations can respond, understanding the nuances of your security posture is no longer optional — it\'s existential. At Leonidas, we work with businesses across the Florida Panhandle every day to harden defenses, reduce risk, and build sustainable security programs that scale with the organization.',
            'Networking'      => 'Modern business infrastructure lives and dies by its network. Whether you\'re running a single office or a distributed multi-site operation, the decisions you make about connectivity, architecture, and management have cascading effects on productivity, security, and cost. Here\'s what we\'ve learned from deploying networks for businesses throughout the Florida Panhandle.',
            'VoIP'            => 'The shift to cloud-based communications has fundamentally changed what businesses can expect from their phone systems. Flexibility, cost predictability, and feature parity with enterprise-grade systems are now accessible to organizations of any size. At Leonidas, we\'ve guided hundreds of businesses through this transition — and the lessons are worth sharing.',
            'Telecom'         => 'Telecom decisions are among the most consequential — and least understood — choices a business makes. Contracts are long, options are confusing, and the wrong choice locks you in for years. Our vendor-agnostic approach means we help businesses navigate this landscape with clarity, not commission incentives.',
            'Industry Trends' => 'The IT landscape shifts constantly, and businesses that fail to track key trends often find themselves playing catch-up at significant cost. As practitioners working with real organizations across the Florida Panhandle, we see these trends play out in practice — not just in analyst reports. Here\'s a ground-level perspective.',
            'Managed IT'      => 'Managed IT services have matured significantly over the past decade. What was once reactive monitoring and break-fix support has evolved into strategic technology partnership. The businesses that get this right enjoy competitive advantages that compound over time. Those that get it wrong spend their energy on IT problems instead of their core business.',
            'Leonidas'        => 'At Leonidas, transparency and results define everything we do. We believe you deserve to understand how we think, how we work, and why we make the decisions we do. This piece gives you an inside look at our approach — built over 20+ years of serving businesses across the Florida Panhandle.',
        ];

        $sections = [
            'Cybersecurity' => [
                ['h' => 'The Threat Landscape Has Changed', 'body' => "The threats businesses face today are not the same as even three years ago. Ransomware gangs operate like professional organizations. Phishing campaigns use AI to craft convincing, personalized messages at scale. Nation-state actors target small businesses as supply chain entry points into larger enterprises. The perimeter-based security model — \"keep threats out\" — simply doesn't work anymore.\n\nA modern security posture assumes breach. That means layered controls, continuous monitoring, and rapid response capabilities are non-negotiable, regardless of organization size."],
                ['h' => 'What Good Looks Like', 'body' => "Effective cybersecurity for a business in 2026 typically includes: endpoint detection and response (EDR) on every device, multi-factor authentication (MFA) on all accounts, email security with anti-phishing and sandboxing, DNS filtering to block malicious destinations, privileged access management (PAM) for administrative credentials, and continuous monitoring with 24/7 alerting.\n\nNone of these are exotic. All of them are within reach for businesses of any size. The gap between \"adequately protected\" and \"exposed\" is often just a handful of configuration decisions."],
                ['h' => "Leonidas's Approach", 'body' => "We start every client engagement with an assessment — not to sell you things, but to understand where you actually stand. From there, we build a prioritized roadmap that addresses your highest-risk gaps first. We're vendor-agnostic, which means we recommend tools that fit your environment, not tools we're incented to sell.\n\nOur managed security clients receive continuous monitoring, quarterly reviews, and a dedicated point of contact who knows your environment. When something happens — and in security, something always eventually happens — response time is measured in minutes, not hours."],
                ['h' => 'The ROI of Getting This Right', 'body' => "The average cost of a data breach in 2025 exceeded \$4.45 million according to IBM's annual study. For small and mid-sized businesses, a breach of that magnitude is often terminal. Cyber insurance helps, but carriers are increasingly stringent about baseline controls. Businesses without proper security hygiene face exclusions, coverage denials, or premiums that aren't sustainable.\n\nThe math on proactive security investment is straightforward. Prevention is always cheaper than response."],
            ],
            'Networking' => [
                ['h' => 'Infrastructure Is Strategy', 'body' => "Most businesses treat their network as a utility — something that should just work. The companies we work with that have the best outcomes treat it as a strategic asset. A well-designed network enables cloud adoption, supports modern security architectures, and scales with the business without requiring a full rip-and-replace every three years.\n\nThe difference between a reactive network (built to solve today's problem) and a strategic one (designed for the next five years) often comes down to design philosophy and vendor selection during initial deployment."],
                ['h' => 'Common Gaps We See', 'body' => "In our assessments, we consistently find the same categories of issues: flat network architectures with no segmentation, consumer-grade switching in business environments, Wi-Fi systems designed for coverage rather than capacity, no network monitoring or alerting, and WAN configurations that create single points of failure.\n\nThese aren't obscure edge cases. They're the default state of most small and mid-sized business networks that were set up by the lowest bidder or the owner's nephew. And they have real consequences for security, performance, and compliance."],
                ['h' => 'Building for Resilience', 'body' => "A resilient network has redundancy at its critical points, monitoring that catches problems before users notice them, and documentation that allows any qualified technician to understand and work in the environment. These three properties are achievable at any budget level — the question is whether you're being intentional about them.\n\nAt Leonidas, our network engineering practice focuses on getting the fundamentals right: proper switching, structured cabling, enterprise-grade wireless, and SD-WAN or dual-carrier WAN for any location where connectivity is business-critical."],
                ['h' => 'Selecting the Right Partners', 'body' => "Not all network vendors are created equal, and not all vendor relationships are structured in your favor. We work with best-of-breed manufacturers across switching (Cisco, Meraki, Aruba), wireless (Aruba, Cisco, Ruckus), and WAN — with multiple carrier relationships across the Florida Panhandle and Southeast. Our goal is always the right fit for your environment and budget — not the highest margin option."],
            ],
            'VoIP' => [
                ['h' => 'Why Businesses Are Moving to Cloud Communications', 'body' => "The economics of cloud phone systems have flipped decisively in favor of UCaaS (Unified Communications as a Service). Legacy PBX systems require capital investment, ongoing maintenance contracts, and on-site hardware that depreciates. Cloud systems are subscription-based, maintained by the vendor, and accessible from any device anywhere.\n\nBeyond cost, the feature set available in modern cloud platforms — video conferencing, team messaging, contact center capabilities, AI-powered transcription, CRM integration — has no equivalent in legacy telephony at anywhere near the same price point."],
                ['h' => 'Platform Selection Matters', 'body' => "Not every UCaaS platform is the right fit for every business. RingCentral and Microsoft Teams Phone serve different use cases. Five9 and RingCX are built for high-volume inbound/outbound calling. Zoom Phone works well for organizations already deep in the Zoom ecosystem. 8x8 and Nextiva have strengths in specific verticals.\n\nAs a vendor-agnostic consultancy, Leonidas evaluates your specific requirements — user count, call volume, integration needs, contact center requirements — before recommending a platform. We're not locked into any single vendor, which means you get the right fit, not the one we're incented to sell."],
                ['h' => 'The Migration Process', 'body' => "A poorly managed VoIP migration can disrupt your business for weeks. A proper migration starts with a current state assessment: What numbers do you have? What are your call flows? Where are your analog lines (fax, elevator phones, alarm panels)? What's your network's readiness for VoIP traffic?\n\nFrom there, we design the new environment, port numbers with overlap periods to prevent service gaps, train users, and provide hyper-care support during the first 30 days."],
                ['h' => 'Ongoing Management', 'body' => "Once you're on a cloud platform, the work isn't done. Call routing changes, user adds/removes, new integrations, contact center workflow changes — these all require ongoing administration. Leonidas clients have access to our UCaaS management team for day-to-day changes, so you're never waiting on hold with a vendor's support line to move a phone number."],
            ],
            'Telecom' => [
                ['h' => 'The Telecom Problem', 'body' => "Telecom is uniquely opaque. Contracts are written to favor the carrier. Pricing is inconsistent — the same service can cost dramatically different amounts depending on when and how you buy it. Invoices are complex enough that overcharges routinely go unnoticed. And the default sales motion for every telecom carrier is to lock you into as long a term as possible.\n\nLeonidas works as your advocate, not the carrier's. Our relationships with 300+ providers across fiber, cable, fixed wireless, 5G, and SD-WAN give us the ability to benchmark pricing and negotiate terms that reflect actual market rates."],
                ['h' => 'What Telecom Expense Management Actually Means', 'body' => "TEM (Telecom Expense Management) is more than auditing invoices. It starts with building a complete inventory of every telecom service you're paying for — which most businesses don't have. Then benchmarking those services against current market pricing. Then right-sizing capacity to match actual usage. And finally, managing the ongoing lifecycle of those agreements.\n\nThe average business that goes through a proper TEM exercise finds 15-30% in immediate savings. That's not a rounding error — it's often a meaningful line item that funds other IT priorities."],
                ['h' => 'Connectivity Across the Panhandle', 'body' => "Connectivity options for businesses have expanded significantly in recent years. Fiber from multiple providers now reaches many commercial locations. Fixed wireless and 5G business internet offer viable alternatives (or backups) where fiber isn't available. With relationships across 300+ carriers nationwide, Leonidas can benchmark what's available at your specific address — and what real-world performance actually looks like."],
                ['h' => 'Building Resilient WAN Architecture', 'body' => "A single internet connection is a single point of failure. For any business where internet outage means operations stop, a secondary connection from a different carrier and different physical path is essential. SD-WAN technology makes managing dual or multi-carrier WAN configurations both cost-effective and operationally simple — automatic failover, traffic prioritization, and centralized management."],
            ],
            'Industry Trends' => [
                ['h' => 'Reading the Signals', 'body' => "The gap between technology trend and business reality is typically 18-36 months. By the time something is being covered extensively in mainstream business media, early adopters in your industry have already gained the advantage. Understanding which trends are worth tracking — and which are vendor hype — requires experience with what actually gets deployed.\n\nAs practitioners who implement technology for real businesses every day, Leonidas has a ground-level view of what's moving from trend to mainstream."],
                ['h' => "What We're Seeing in Practice", 'body' => "Across our client base in the Florida Panhandle, we're seeing accelerated adoption of AI-powered security tools (particularly for threat detection and response), significant interest in Microsoft Copilot for productivity use cases, ongoing migration from legacy phone systems to cloud communications, and growing urgency around compliance requirements — particularly for businesses serving defense contractors, healthcare organizations, or financial institutions.\n\nThe businesses that will be best positioned in three years are the ones making deliberate investments today."],
                ['h' => 'The Role of a Technology Partner', 'body' => "One of the most valuable things a managed IT partner provides isn't technical labor — it's a filter. Every week brings new vendor pitches, new threat advisories, new compliance requirements, and new technology options. Having a partner who can evaluate what matters for your specific business, prioritize appropriately, and separate signal from noise is increasingly valuable as the pace of change accelerates."],
                ['h' => 'Planning Ahead', 'body' => "Technology planning in 2026 needs to operate on two horizons simultaneously: near-term operational requirements (what do we need to function reliably today?) and longer-term strategic positioning (what do we need to be investing in now to remain competitive?). The businesses that struggle are the ones that only operate in one of these modes — either reactive to today's crises or chasing shiny objects without addressing fundamentals."],
            ],
            'Managed IT' => [
                ['h' => 'What Managed IT Actually Means', 'body' => "The managed IT services label covers a wide range of delivery models, from basic remote monitoring to fully outsourced IT departments. The best partnerships are ones where the MSP functions as a genuine strategic partner — someone who understands your business goals and helps ensure technology serves those goals.\n\nAt Leonidas, our managed IT model is built around two things: making sure your technology works reliably, and making sure we're helping you get competitive advantage from it — not just keeping the lights on."],
                ['h' => 'Proactive vs. Reactive', 'body' => "The break-fix model — calling your IT person when something breaks — was the default for small business IT for decades. The problem is that it creates the wrong incentives. A break-fix provider makes money when things break. A managed services provider makes money when things work.\n\nProactive maintenance, patch management, monitoring, and capacity planning are investments that pay dividends in uptime and stability. The businesses we work with that have been with us for 3+ years almost universally report that their \"IT problems\" have decreased substantially."],
                ['h' => 'What to Expect from a Good MSP Relationship', 'body' => "A well-structured managed IT engagement includes: a documented environment (you shouldn't need to explain your infrastructure to your IT provider every time), a dedicated point of contact who knows your business, regular business reviews that connect IT performance to business outcomes, and transparent pricing without surprise invoices.\n\nIt also includes clear SLAs — response time commitments, resolution time targets, and escalation paths. If your current IT provider can't articulate these, that's a problem."],
                ['h' => 'Right-Sizing IT Investment', 'body' => "IT budget benchmarks suggest businesses should spend between 4-10% of revenue on technology, depending on industry and IT intensity. The specific number matters less than ensuring your spending is allocated correctly — to the right infrastructure, the right security controls, and the right support model for your size and complexity.\n\nLeonidas helps clients build technology roadmaps that prioritize spending against risk and business value, not vendor preferences or the last problem that came up."],
            ],
            'Leonidas' => [
                ['h' => 'Who We Are', 'body' => "Leonidas is a managed IT services provider, MSSP, and unified communications consultancy based in Panama City Beach, FL. We serve businesses across the Florida Panhandle — from small single-site operations to multi-location enterprises.\n\nOur team brings 20+ years of combined experience in IT infrastructure, cybersecurity, and unified communications. We've built networks, secured organizations, and migrated phone systems for businesses in healthcare, legal, construction, hospitality, government contracting, and professional services."],
                ['h' => 'The Vendor-Agnostic Difference', 'body' => "Most IT providers have preferred vendors — manufacturers or platforms where they have certifications, volume discounts, or incentive programs. This creates a natural tendency to recommend those vendors even when a better fit exists elsewhere.\n\nWe're vendor-agnostic by design. We maintain relationships with best-of-breed solutions across every category we service, and our recommendation process starts with your requirements — not our preferred SKU."],
                ['h' => 'How We Work', 'body' => "Every Leonidas engagement starts with an assessment. We want to understand your current environment, your business objectives, and your pain points before recommending anything. The assessment is free, takes about 30 minutes of your time, and typically surfaces several things worth knowing regardless of whether we work together.\n\nFrom there, we design a solution — whether that's a managed IT program, a security stack, a network redesign, or a communications migration. Implementation is handled by our team with a dedicated project manager."],
                ['h' => 'Our Commitment', 'body' => "We show up in person when it matters. We answer the phone when you call. We give you straight answers about technology, pricing, and what we can and can't do. These aren't marketing claims — they're the operating principles that have built our reputation over two decades of serving businesses across the Florida Panhandle.\n\nIf you're evaluating managed IT providers, we'd welcome the conversation. A free assessment is a low-commitment way to see how we think and whether our approach fits your needs."],
            ],
        ];

        $cat     = array_key_exists($category, $sections) ? $category : 'Managed IT';
        $intro   = $intros[$cat] ?? $intros['Managed IT'];
        $sects   = $sections[$cat] ?? $sections['Managed IT'];

        $html = '<p><strong>' . $title . '</strong> — ' . htmlspecialchars($intro) . '</p>';

        foreach ($sects as $s) {
            $html .= '<h2>' . htmlspecialchars($s['h']) . '</h2>';
            foreach (explode("\n\n", $s['body']) as $para) {
                $para = trim($para);
                if ($para !== '') {
                    $html .= '<p>' . nl2br(htmlspecialchars($para)) . '</p>';
                }
            }
        }

        $html .= '<div style="background:rgba(212,168,67,0.06);border:1px solid rgba(212,168,67,0.2);border-radius:0.75rem;padding:1.25rem 1.5rem;margin-top:2rem;">'
               . '<div style="font-size:0.75rem;font-weight:700;letter-spacing:0.15em;color:#D4A843;text-transform:uppercase;margin-bottom:0.5rem;">About Leonidas</div>'
               . '<p style="margin:0;font-size:0.9rem;color:#9CA3AF;">Leonidas is a managed IT services provider, MSSP, and unified communications consultancy based in Panama City Beach, FL, serving the Florida Panhandle. We offer free 30-minute assessments for businesses evaluating their IT and security posture. <a href="' . SITE_BASE . '/contact" style="color:#D4A843;font-weight:600;text-decoration:none;">Contact us</a> or call <a href="tel:8506149343" style="color:#D4A843;font-weight:600;text-decoration:none;">850-614-9343</a>.</p>'
               . '</div>';

        return $html;
    }

    public static function getTopicsForCategory(string $category): string {
        $topics = [
            'Cybersecurity'   => 'threat landscape, endpoint detection, MFA, email security, DNS filtering, incident response, cyber insurance, data breach, ransomware, zero trust',
            'Networking'      => 'network infrastructure, segmentation, SD-WAN, switching, Wi-Fi, WAN resilience, dual carrier, network monitoring, structured cabling, wireless design',
            'VoIP'            => 'UCaaS, cloud phone, PBX migration, RingCentral, Microsoft Teams Phone, number porting, call flows, contact center, unified communications',
            'Telecom'         => 'telecom expense management, carrier contracts, fiber, fixed wireless, 5G, WAN architecture, bandwidth, invoice audit, carrier selection',
            'Industry Trends' => 'AI security tools, Microsoft Copilot, cloud adoption, CMMC compliance, healthcare IT, regulatory requirements, technology roadmap, IT spending',
            'Managed IT'      => 'managed services, MSP, proactive maintenance, break-fix, SLA, IT budget, technology partnership, patch management, help desk, IT strategy',
            'Leonidas'        => 'vendor-agnostic, Panama City Beach, Florida Panhandle, free assessment, managed IT, MSSP, unified communications, company overview',
        ];
        return $topics[$category] ?? 'managed IT, cybersecurity, technology';
    }

    private function slugify(string $text): string {
        return strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $text), '-'));
    }
}
