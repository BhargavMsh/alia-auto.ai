<?php
$featureCards = [
    ['icon'=>'chart','tag'=>'Core','title'=>'Offer Aggregation','text'=>'Structured database of cash-back, APR, lease, and OEM campaign data across all major brands — normalized for apples-to-apples comparison.','tone'=>'navy'],
    ['icon'=>'compare','tag'=>'Strategy','title'=>'Competitive Benchmarking','text'=>'Side-by-side comparison of offer structures across brands, segments, and markets. Understand where your offer sits vs. every rival in the room.','tone'=>'orange'],
    ['icon'=>'earth','tag'=>'Coverage','title'=>'Key Middle East Markets','text'=>'UAE, KSA, Qatar, and Kuwait — each market tracked independently with local currency, local incentive types, and country-specific OEM programs.','tone'=>'navy'],
    ['icon'=>'trend','tag'=>'Analytics','title'=>'Trend & Pattern Analysis','text'=>'Trend and pattern analysis of the different markets data across months and model years — revealing seasonal patterns, launch cycles, and incentive escalation trends.','tone'=>'orange'],
    ['icon'=>'brain','tag'=>'Intelligence','title'=>'AI-Driven Insights','text'=>'Automated pattern recognition surfaces anomalies, campaign outliers, and strategic inflection points — so analysts spend time deciding, not digging.','tone'=>'orange'],
    ['icon'=>'layers','tag'=>'Filtering','title'=>'Segment Analysis','text'=>'Filter by vehicle segment — sedan, SUV, pickup, luxury, EV — to see how incentive strategies differ across categories within the same brand.','tone'=>'orange'],
    ['icon'=>'score','tag'=>'Scoring','title'=>'Incentive Scoring','text'=>'Proprietary scoring that quantifies total consumer benefit across cash, financing, and lease offers — enabling true value-to-MSRP comparison.','tone'=>'navy'],
];

$markets = [
    ['flag'=>'🇦🇪','name'=>'United Arab Emirates','code'=>'AED · UAE','cities'=>['Dubai','Abu Dhabi','Sharjah'],'desc'=>'Largest Gulf auto market by volume. Tracks all seven emirates including free zone dealer activity.','types'=>['Cash Back','0% APR','Lease','Loyalty','Fleet']],
    ['flag'=>'🇸🇦','name'=>'Kingdom of Saudi Arabia','code'=>'SAR · KSA','cities'=>['Riyadh','Jeddah','Dammam'],'desc'=>'Highest-volume market in the region. Tracks Vision 2030-linked EV incentive programs alongside conventional offers.','types'=>['Cash Back','APR Campaigns','OEM Programs','Fleet','Conquest']],
    ['flag'=>'🇶🇦','name'=>'Qatar','code'=>'QAR · QAT','cities'=>['Doha','Al Wakrah'],'desc'=>'Smaller but high-value market. Premium and luxury segment incentives tracked in full alongside mainstream brands.','types'=>['Cash Back','Dealer Incentives','Loyalty','APR']],
    ['flag'=>'🇰🇼','name'=>'Kuwait','code'=>'KWD · KWT','cities'=>['Kuwait City','Hawalli','Al Ahmadi'],'desc'=>'High per-capita vehicle ownership. Tracks extensive year-end clearance campaigns and import-dealer offers.','types'=>['Cash Back','Lease','OEM Promotions','End-of-Year Deals']],
];

$segments = [
    ['icon'=>'🚗','name'=>'Sedan & Saloon'],['icon'=>'🚙','name'=>'SUV & Crossover'],['icon'=>'🛻','name'=>'Pickup Truck'],
    ['icon'=>'🏎️','name'=>'Luxury & Premium'],['icon'=>'⚡','name'=>'Electric Vehicle'],['icon'=>'🚐','name'=>'Van & Commercial'],
];

$ticker = [
    ['Cash-Back Offers','Track manufacturer rebates by model & trim across all Gulf markets'],
    ['0% APR Campaigns','Compare interest-free financing terms from 24 to 84 months'],
    ['Lease Incentives','Monthly lease rates, residual values, and money factors by segment'],
    ['OEM Promotions','Seasonal campaigns, loyalty bonuses, conquest cashback by brand'],
    ['Fleet Pricing','Volume discount structures and fleet incentive tiers'],
    ['End-of-Year Deals','Clearance incentives and model-year transition offers'],
    ['Trade-In Bonuses','Enhanced trade-in allowances stacked with purchase incentives'],
    ['Conquest Offers','Competitive switching incentives targeting rival brand owners'],
];

function iconSvg(string $name): string {
    $common = 'width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"';
    return match ($name) {
        'chart' => "<svg $common><path d=\"M3 3v16a2 2 0 0 0 2 2h16\"/><path d=\"M18 17V9\"/><path d=\"M13 17V5\"/><path d=\"M8 17v-3\"/></svg>",
        'compare' => "<svg $common><path d=\"M8 3 4 7l4 4\"/><path d=\"M4 7h16\"/><path d=\"m16 21 4-4-4-4\"/><path d=\"M20 17H4\"/></svg>",
        'earth' => "<svg $common><circle cx=\"12\" cy=\"12\" r=\"10\"/><path d=\"M2 12h20\"/><path d=\"M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10Z\"/></svg>",
        'trend' => "<svg $common><path d=\"M3 3v16a2 2 0 0 0 2 2h16\"/><path d=\"m19 9-5 5-4-4-3 3\"/></svg>",
        'brain' => "<svg $common><path d=\"M12 5a3 3 0 1 0-6 0 4 4 0 0 0-2.5 6 4 4 0 0 0 .5 6.5A4 4 0 1 0 12 18Z\"/><path d=\"M12 5a3 3 0 1 1 6 0 4 4 0 0 1 2.5 6 4 4 0 0 1-.5 6.5A4 4 0 1 1 12 18Z\"/></svg>",
        'layers' => "<svg $common><path d=\"m12.8 2.2 8.6 3.9a1 1 0 0 1 0 1.8l-8.6 3.9a2 2 0 0 1-1.6 0L2.6 7.9a1 1 0 0 1 0-1.8l8.6-3.9a2 2 0 0 1 1.6 0Z\"/><path d=\"m2 12 9.2 4.2a2 2 0 0 0 1.6 0L22 12\"/><path d=\"m2 17 9.2 4.2a2 2 0 0 0 1.6 0L22 17\"/></svg>",
        'score' => "<svg $common><polyline points=\"22 7 13.5 15.5 8.5 10.5 2 17\"/><polyline points=\"16 7 22 7 22 13\"/></svg>",
        default => ''
    };
}
?>
<main id="top">
    <section class="hero-section">
        <div class="hero-image" aria-hidden="true"></div>
        <div class="hero-gradient" aria-hidden="true"></div>
        <div class="shell hero-shell">
            <div class="hero-copy">
                <h1><span>Know Every Offer.</span><br><span>Outpace Every <em>Rival.</em></span></h1>
                <p>ALIA aggregates and structures automotive offers — cash-back deals, APR promotions, lease incentives, and OEM campaigns — across the Gulf region into one strategic intelligence platform for brands, dealers, and analysts.</p>
                <div class="hero-actions">
                    <a
                        class="react-primary-btn"
                        href="<?= htmlspecialchars($site['contact'], ENT_QUOTES, 'UTF-8') ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <span>Request a Demo</span>

                        <svg
                            class="react-primary-btn__icon"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </a>
                </div>                
                <h2>Built to cover the Middle East market</h2>
                <div class="hero-stats">
                    <article class="stat-card stat-navy">
                        <div class="stat-icon"><?= iconSvg('chart') ?></div><strong>12+</strong><b>Offer Types Tracked</b><small>Cash back, APR, lease &amp; more</small>
                    </article>
                    <article class="stat-card stat-indigo">
                        <div class="stat-icon"><?= iconSvg('earth') ?></div><strong>4</strong><b>Markets Covered</b><small>UAE · KSA · Qatar · Kuwait</small>
                    </article>
                    <article class="stat-card stat-orange">
                        <div class="stat-icon"><?= iconSvg('layers') ?></div><strong>16+</strong><b>Brands in Database</b><small>All major OEMs &amp; segments</small>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="ticker-wrap" aria-label="Offer categories">
        <div class="ticker-fade ticker-fade-left"></div><div class="ticker-fade ticker-fade-right"></div>
        <div class="ticker-track">
            <?php for ($pass=0; $pass<2; $pass++): foreach ($ticker as [$label,$detail]): ?>
            <div class="ticker-item"><strong><?= htmlspecialchars($label) ?></strong><span><?= htmlspecialchars($detail) ?></span></div>
            <?php endforeach; endfor; ?>
        </div>
    </section>

    <section id="features" class="section features-section">
        <div class="shell">
            <div class="section-heading feature-heading">
                <h2>Everything You Need to <span>Stay Ahead with Sales Strategy</span></h2>
                <p>Twelve purpose-built capabilities that cover every step of the automotive offer intelligence workflow — from data collection to strategic decision.</p>
            </div>
            <div class="features-grid">
                <?php foreach ($featureCards as $feature): ?>
                <article class="feature-card <?= $feature['tone'] ?>">
                    <span class="feature-tag"><?= htmlspecialchars($feature['tag']) ?></span>
                    <div class="feature-icon"><?= iconSvg($feature['icon']) ?></div>
                    <h3><?= htmlspecialchars($feature['title']) ?></h3>
                    <p><?= htmlspecialchars($feature['text']) ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="intelligence" class="section intelligence-section">
        <div class="intelligence-glow" aria-hidden="true"></div>
        <div class="shell intelligence-shell">
            <div class="section-heading intelligence-heading">
                <h2>Your Market <span>Command Center</span></h2>
                <p>The charts and offer records below are <strong>illustrative examples</strong> of how ALIA structures and presents automotive intelligence — not live data feeds.</p>
            </div>
            <div class="intel-note"><span>ⓘ</span> Figures represent the type of analysis ALIA generates — not current market values.</div>
            <div class="command-card">
                <div class="command-grid">
                    <div class="trend-panel panel">
                        <div class="panel-head">
                            <div><h3>Average Discount Depth by Brand</h3><p>Sample — 7-month window · USD equivalent</p></div>
                            <span class="illustrative">ILLUSTRATIVE</span>
                        </div>
                        <div class="trend-chart">
                            <svg viewBox="0 0 728 256" role="img" aria-label="Illustrative average discount trend chart">
                                <defs>
                                    <linearGradient id="toyotaFill" x1="0" y1="0" x2="0" y2="1"><stop offset="5%" stop-color="#1C3664" stop-opacity=".25"/><stop offset="95%" stop-color="#1C3664" stop-opacity="0"/></linearGradient>
                                    <linearGradient id="fordFill" x1="0" y1="0" x2="0" y2="1"><stop offset="5%" stop-color="#F26428" stop-opacity=".25"/><stop offset="95%" stop-color="#F26428" stop-opacity="0"/></linearGradient>
                                </defs>
                                <g class="chart-grid">
                                    <?php foreach ([5,59,113,167,221] as $y): ?><line x1="65" y1="<?= $y ?>" x2="723" y2="<?= $y ?>"/><?php endforeach; ?>
                                    <?php foreach ([65,174.7,284.3,394,503.7,613.3,723] as $x): ?><line x1="<?= $x ?>" y1="5" x2="<?= $x ?>" y2="221"/><?php endforeach; ?>
                                </g>
                                <g class="y-axis-labels"><text x="57" y="224">$0K</text><text x="57" y="170">$2K</text><text x="57" y="116">$4K</text><text x="57" y="62">$6K</text><text x="57" y="10">$8K</text></g>
                                <path class="area toyota-area" d="M65,118.4C101.6,114.4 138.1,110.3 174.7,110.3C211.2,110.3 247.8,123.8 284.3,123.8C320.9,123.8 357.4,107.2 394,102.2C430.6,97.3 467.1,96.8 503.7,94.1C540.2,91.4 576.8,88.7 613.3,86C649.9,83.3 686.4,80.6 723,77.9L723,221L65,221Z"/>
                                <path class="line toyota-line" d="M65,118.4C101.6,114.4 138.1,110.3 174.7,110.3C211.2,110.3 247.8,123.8 284.3,123.8C320.9,123.8 357.4,107.2 394,102.2C430.6,97.3 467.1,96.8 503.7,94.1C540.2,91.4 576.8,88.7 613.3,86C649.9,83.3 686.4,80.6 723,77.9"/>
                                <path class="area ford-area" d="M65,56.3C101.6,52.3 138.1,48.2 174.7,48.2C211.2,48.2 247.8,64.4 284.3,64.4C320.9,64.4 357.4,43.7 394,37.4C430.6,31.1 467.1,26.6 503.7,26.6C540.2,26.6 576.8,32 613.3,32C649.9,32 686.4,25.3 723,18.5L723,221L65,221Z"/>
                                <path class="line ford-line" d="M65,56.3C101.6,52.3 138.1,48.2 174.7,48.2C211.2,48.2 247.8,64.4 284.3,64.4C320.9,64.4 357.4,43.7 394,37.4C430.6,31.1 467.1,26.6 503.7,26.6C540.2,26.6 576.8,32 613.3,32C649.9,32 686.4,25.3 723,18.5"/>
                                <path class="line dashed gmc-line" d="M65,80.6C101.6,75.2 138.1,69.8 174.7,69.8C211.2,69.8 247.8,88.7 284.3,88.7C320.9,88.7 357.4,70.3 394,64.4C430.6,58.6 467.1,57.2 503.7,53.6C540.2,50 576.8,46.9 613.3,42.8C649.9,38.8 686.4,34 723,29.3"/>
                                <path class="line dashed hyundai-line" d="M65,142.7C101.6,140.9 138.1,139.1 174.7,137.3C211.2,135.5 247.8,134.2 284.3,131.9C320.9,129.7 357.4,127 394,123.8C430.6,120.7 467.1,116.2 503.7,113C540.2,109.9 576.8,104.9 613.3,104.9C649.9,104.9 686.4,107.6 723,110.3"/>
                                <g class="x-axis-labels"><text x="65" y="245">Jan</text><text x="175" y="245">Feb</text><text x="284" y="245">Mar</text><text x="394" y="245">Apr</text><text x="504" y="245">May</text><text x="613" y="245">Jun</text><text x="718" y="245">Jul</text></g>
                            </svg>
                        </div>
                        <div class="chart-legend"><span class="toyota">Toyota</span><span class="ford">Ford</span><span class="gmc">GMC</span><span class="hyundai">Hyundai</span></div>
                    </div>
                    <div class="command-side">
                        <div class="mix-panel panel">
                            <h3>Offer Type Mix</h3><p>Gulf market — sample breakdown</p>
                            <div class="bar-list">
                                <?php foreach ([['Cash Back',76],['0% APR',54],['Lease Deal',36],['Loyalty Bonus',20],['Conquest',14]] as [$label,$value]): ?>
                                <div class="bar-row"><span><?= htmlspecialchars($label) ?></span><div><i style="width:<?= $value ?>%"></i></div></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="records-panel panel">
                            <h3>Sample Offer Records</h3><p>Format ALIA uses for structured output</p>
                            <?php $offers=[['GM','GMC Sierra 1500','Model-year transition incentive','$7,500 off','Cash Back'],['To','Toyota Land Cruiser','Anniversary campaign — KSA','0% / 60mo','0% APR'],['Hy','Hyundai Tucson','New residual value program — UAE','AED 1,800/mo','Lease'],['Fo','Ford F-150 Raptor','Incentive reduced vs prior month','$9,000 off','Cash Back']]; foreach($offers as $o): ?>
                            <div class="record-row"><span class="record-badge"><?= $o[0] ?></span><div><b><?= $o[1] ?></b><small><?= $o[2] ?></small></div><strong><?= $o[3] ?><small><?= $o[4] ?></small></strong></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="coverage" class="section coverage-section">
        <div class="shell">
            <div class="section-heading coverage-heading">
                <h2>Key Middle East Markets. <span>16+ Brands.</span><br>Every Offer Type.</h2>
                <p>ALIA tracks automotive incentives across every major Gulf market — each with its own currency, regulatory context, and offer landscape.</p>
            </div>
            <div class="markets-grid">
                <?php foreach ($markets as $market): ?>
                <article class="market-card">
                    <div class="market-head"><span class="flag"><?= $market['flag'] ?></span><div><h3><?= htmlspecialchars($market['name']) ?></h3><b><?= htmlspecialchars($market['code']) ?></b></div></div>
                    <div class="city-pills"><?php foreach($market['cities'] as $city): ?><span>⌖ <?= htmlspecialchars($city) ?></span><?php endforeach; ?></div>
                    <p><?= htmlspecialchars($market['desc']) ?></p>
                    <h4>Offer types tracked:</h4>
                    <div class="offer-pills"><?php foreach($market['types'] as $type): ?><span><?= htmlspecialchars($type) ?></span><?php endforeach; ?></div>
                </article>
                <?php endforeach; ?>
            </div>
            <div class="segments-card">
                <div class="segments-title"><span>🚘</span><h3>Vehicle Segments Covered</h3></div>
                <div class="segments-grid"><?php foreach($segments as $segment): ?><div><span><?= $segment['icon'] ?></span><b><?= htmlspecialchars($segment['name']) ?></b></div><?php endforeach; ?></div>
            </div>
        </div>
    </section>

    <section class="cta-section" id="pricing">
        <div class="shell cta-shell">
            <div class="cta-card">
                <div class="cta-icon">⚡</div>
                <h2>Ready to Gain the <span>Edge?</span></h2>
                <p>Join the leading automotive brands and dealers using ALIA to make smarter, faster decisions.</p>
                <div class="cta-actions">
                    <a
                        class="react-cta-btn"
                        href="<?= htmlspecialchars($site['contact'], ENT_QUOTES, 'UTF-8') ?>"
                    >
                        Schedule Demo
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

