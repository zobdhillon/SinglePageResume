<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ $resume->basics->name ?? 'Resume' }} — Print</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
        <style>
            @page {
                size: A4;
                margin: 0;
            }

            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            html,
            body {
                background: #f0f0f0;
                font-family: 'Inter', sans-serif;
                font-size: 10px;
                line-height: 1.6;
                color: #1a1a1a;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            a {
                color: inherit;
                text-decoration: none;
            }

            /* ── Screen wrapper ── */
            .screen-bar {
                background: #fff;
                border-bottom: 1px solid #e0e0e0;
                padding: 10px 24px;
                display: flex;
                justify-content: flex-end;
                gap: 8px;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 100;
            }

            .screen-bar button,
            .screen-bar a {
                font-family: 'Inter', sans-serif;
                font-size: 11px;
                padding: 6px 16px;
                border-radius: 4px;
                cursor: pointer;
                text-decoration: none;
                display: inline-block;
            }

            .profile-photo {
                width: 130px;
                height: 130px;
                margin: 0 auto 24px;
                overflow: hidden;
                border-radius: 12px;
            }

            .profile-photo img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .btn-print {
                background: #1a1a1a;
                color: #fff;
                border: 1px solid #1a1a1a;
            }

            .btn-back {
                background: transparent;
                color: #666;
                border: 1px solid #ccc;
            }

            .page-wrap {
                padding-top: 50px;
                display: flex;
                justify-content: center;
                min-height: 100vh;
            }

            /* ── A4 Page ── */
            .page {
                background: #ffffff;
                width: 210mm;
                min-height: 297mm;
                box-shadow: 0 4px 32px rgba(0, 0, 0, 0.12);
            }

            /* ═══════════════════════════════
           HEADER
        ═══════════════════════════════ */
            .resume-header {
                display: flex;
                align-items: flex-end;
                gap: 32px;
                padding: 36px 36px 28px 36px;
                border-bottom: 2px solid #1a1a1a;
            }

            .header-name-block {
                flex: 1;
            }

            .header-firstname {
                font-size: 20px;
                font-weight: 400;
                letter-spacing: 0.25em;
                text-transform: uppercase;
                color: #555;
                line-height: 1;
                margin-bottom: 2px;
            }

            .header-lastname {
                font-size: 30px;
                font-weight: 700;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                color: #1a1a1a;
                line-height: 1;
                margin-bottom: 6px;
            }

            .header-title {
                font-size: 9.5px;
                font-weight: 500;
                letter-spacing: 0.2em;
                text-transform: uppercase;
                color: #888;
            }

            .header-contacts {
                display: flex;
                flex-direction: column;
                gap: 4px;
                align-items: flex-end;
            }

            .header-contact-item {
                font-size: 10px;
                color: #555;
                display: flex;
                align-items: center;
                gap: 5px;
            }

            .header-contact-item::before {
                content: '●';
                font-size: 8px;
                color: #bbb;
            }

            /* ═══════════════════════════════
           TWO-COLUMN BODY
        ═══════════════════════════════ */
            .resume-body {
                display: grid;
                grid-template-columns: 58mm 1fr;
                min-height: calc(297mm - 110px);
            }

            /* ── LEFT SIDEBAR ── */
            .sidebar {
                background: #f7f7f7;
                padding: 28px 20px;
                border-right: 1px solid #e8e8e8;
            }

            .sidebar-section {
                margin-bottom: 28px;
            }

            .sidebar-section:last-child {
                margin-bottom: 0;
            }

            .sidebar-heading {
                font-size: 12px;
                font-weight: 700;
                letter-spacing: 0.2em;
                text-transform: uppercase;
                color: #1a1a1a;
                margin-bottom: 10px;
                padding-bottom: 5px;
                border-bottom: 1.5px solid #1a1a1a;
            }

            .languages-inline {
                display: flex;
                flex-wrap: wrap;
                gap: 8px;
            }

            .language-pill {
                font-size: 9px;
                color: #333;
            }

            /* Skills */
            .skill-group {
                margin-bottom: 14px;
            }

            .skill-group-name {
                font-size: 8px;
                font-weight: 600;
                letter-spacing: 0.15em;
                text-transform: uppercase;
                color: #888;
                margin-bottom: 6px;
            }

            .skill-list {
                list-style: none;
            }

            .skill-list li {
                font-size: 9.5px;
                color: #333;
                padding: 2px 0;
                padding-left: 10px;
                position: relative;
            }

            .skill-list li::before {
                content: '●';
                position: absolute;
                left: 0;
                font-size: 5px;
                color: #aaa;
                top: 5px;
            }

            /* Keyword tags for skills */
            .skill-tags {
                display: flex;
                flex-wrap: wrap;
                gap: 4px;
                margin-top: 4px;
            }

            .skill-tag {
                font-size: 8px;
                padding: 2px 7px;
                border: 1px solid #ddd;
                border-radius: 2px;
                color: #444;
                background: #fff;
            }

            /* Education sidebar */
            .edu-entry {
                margin-bottom: 14px;
            }

            .edu-entry:last-child {
                margin-bottom: 0;
            }

            .edu-degree {
                font-size: 9px;
                font-weight: 600;
                color: #1a1a1a;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                line-height: 1.3;
            }

            .edu-institution {
                font-size: 9px;
                color: #666;
                margin-top: 2px;
            }

            .edu-date {
                font-size: 8.5px;
                color: #aaa;
                margin-top: 2px;
            }

            /* Languages sidebar */
            .lang-item {
                margin-bottom: 6px;
            }

            .lang-name {
                font-size: 9.5px;
                font-weight: 600;
                color: #1a1a1a;
            }

            .lang-level {
                font-size: 8.5px;
                color: #888;
            }

            /* ── RIGHT MAIN COLUMN ── */
            .main-col {
                padding: 28px 28px 28px 24px;
            }

            .main-section {
                margin-bottom: 24px;
            }

            .main-section:last-child {
                margin-bottom: 0;
            }

            .main-heading {
                font-size: 12px;
                font-weight: 700;
                letter-spacing: 0.2em;
                text-transform: uppercase;
                color: #1a1a1a;
                margin-bottom: 12px;
                padding-bottom: 5px;
                border-bottom: 1.5px solid #1a1a1a;
            }

            /* Profile / Summary */
            .profile-text {
                font-size: 9.5px;
                color: #444;
                line-height: 1.7;
            }

            /* Experience entries */
            .exp-entry {
                display: grid;
                grid-template-columns: 8px 1fr;
                gap: 0 12px;
                margin-bottom: 18px;
                page-break-inside: avoid;
                break-inside: avoid;
            }

            .exp-entry:last-child {
                margin-bottom: 0;
            }

            /* Timeline dot + line */
            .exp-timeline {
                display: flex;
                flex-direction: column;
                align-items: center;
                padding-top: 3px;
            }

            .exp-dot {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                border: 1.5px solid #1a1a1a;
                background: #fff;
                flex-shrink: 0;
            }

            .exp-line {
                width: 1.5px;
                flex: 1;
                background: #ddd;
                margin-top: 3px;
            }

            .exp-content {}

            .exp-header {
                display: flex;
                align-items: baseline;
                gap: 10px;
                margin-bottom: 2px;
                flex-wrap: wrap;
            }

            .exp-job-title {
                font-size: 9px;
                font-weight: 700;
                letter-spacing: 0.1em;
                text-transform: uppercase;
                color: #1a1a1a;
            }

            .exp-divider {
                font-size: 9px;
                color: #ccc;
            }

            .exp-date {
                font-size: 8.5px;
                font-weight: 500;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                color: #888;
            }

            .exp-company {
                font-size: 9px;
                font-weight: 500;
                color: #555;
                margin-bottom: 5px;
            }

            .exp-summary {
                font-size: 9px;
                color: #666;
                line-height: 1.6;
                margin-bottom: 5px;
            }

            .exp-bullets {
                list-style: none;
                padding: 0;
            }

            .exp-bullets li {
                font-size: 9px;
                color: #444;
                padding-left: 10px;
                position: relative;
                margin-bottom: 2px;
                line-height: 1.55;
            }

            .exp-bullets li::before {
                content: '●';
                position: absolute;
                left: 0;
                font-size: 4.5px;
                color: #bbb;
                top: 4px;
            }

            /* Awards & Certificates */
            .award-entry {
                margin-bottom: 10px;
                page-break-inside: avoid;
                break-inside: avoid;
            }

            .award-title {
                font-size: 9.5px;
                font-weight: 600;
                color: #1a1a1a;
            }

            .award-meta {
                font-size: 8.5px;
                color: #888;
                margin-top: 1px;
            }

            .award-summary {
                font-size: 9px;
                color: #666;
                margin-top: 3px;
                line-height: 1.55;
            }

            /* References */
            .ref-entry {
                margin-bottom: 12px;
                page-break-inside: avoid;
                break-inside: avoid;
            }

            .ref-name {
                font-size: 9.5px;
                font-weight: 600;
                color: #1a1a1a;
            }

            .ref-quote {
                font-size: 9px;
                color: #666;
                font-style: italic;
                margin-top: 3px;
                line-height: 1.6;
                border-left: 2px solid #ddd;
                padding-left: 8px;
            }

            /* ── FOOTER ── */
            .resume-footer {
                border-top: 1px solid #e8e8e8;
                padding: 10px 36px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .resume-footer span {
                font-size: 8px;
                color: #bbb;
                letter-spacing: 0.05em;
            }

            /* ══════════════════
           PRINT RULES
        ══════════════════ */
            @media print {

                html,
                body {
                    background: #fff !important;
                }

                .screen-bar,
                .page-wrap {
                    display: block !important;
                    padding: 0 !important;
                }

                .screen-bar {
                    display: none !important;
                }

                .page {
                    width: 100% !important;
                    box-shadow: none !important;
                    min-height: 0 !important;
                }

                .sidebar {
                    background: #f7f7f7 !important;
                }

                section,
                .exp-entry,
                .edu-entry,
                .award-entry,
                .ref-entry {
                    page-break-inside: avoid !important;
                    break-inside: avoid !important;
                }

                .main-section {
                    page-break-inside: avoid !important;
                    break-inside: avoid !important;
                }
            }
        </style>
    </head>

    <body>

        {{-- Screen-only print bar --}}
        <div class="screen-bar">
            <a href="/" class="btn-back">← Back to Resume</a>
            <button class="btn-print" onclick="window.print()">Print / Save as PDF</button>
        </div>

        <div class="page-wrap">
            <div class="page">

                {{-- ════════════════════════════
                 HEADER
            ════════════════════════════ --}}
                <div class="resume-header">
                    <div class="header-name-block">
                        @php
                            $nameParts = explode(' ', trim($resume->basics->name ?? ''), 2);
                            $firstName = $nameParts[0] ?? '';
                            $lastName = $nameParts[1] ?? '';
                        @endphp
                        <div class="header-firstname">{{ $firstName }}</div>
                        <div class="header-lastname">{{ $lastName }}</div>
                        @if ($resume->basics->label ?? null)
                            <div class="header-title">{{ $resume->basics->label }}</div>
                        @endif
                    </div>

                    <div class="header-contacts">
                        @if ($resume->basics->email ?? null)
                            <div class="header-contact-item">{{ $resume->basics->email }}</div>
                        @endif
                        @if ($resume->basics->phone ?? null)
                            <div class="header-contact-item">{{ $resume->basics->phone }}</div>
                        @endif
                        @if ($resume->basics->url ?? null)
                            <div class="header-contact-item">{{ $resume->basics->url }}</div>
                        @endif
                        @foreach ($resume->basics->profiles ?? [] as $profile)
                            <div class="header-contact-item">{{ $profile->url ?? $profile->username }}</div>
                        @endforeach
                        @if ($resume->basics->location->city ?? null)
                            <div class="header-contact-item">
                                {{ collect([
                                    $resume->basics->location->city ?? null,
                                    $resume->basics->location->region ?? null,
                                    $resume->basics->location->countryCode ?? null,
                                ])->filter()->implode(', ') }}
                            </div>
                        @endif
                    </div>
                </div>

                {{-- ════════════════════════════
                 TWO-COLUMN BODY
            ════════════════════════════ --}}
                <div class="resume-body">

                    {{-- ── LEFT SIDEBAR ── --}}
                    <aside class="sidebar">

                        @if ($resume->basics->image ?? null)
                            <div class="profile-photo">
                                <img src="{{ $resume->basics->image }}" alt="Profile Photo">
                            </div>
                        @endif

                        {{-- Skills --}}
                        @if (count($resume->skills))
                            <div class="sidebar-section">
                                <div class="sidebar-heading">Skills</div>
                                @foreach ($resume->skills as $skill)
                                    <div class="skill-group">
                                        @if ($skill->name)
                                            <div class="skill-group-name">{{ $skill->name }}</div>
                                        @endif
                                        @if (count($skill->keywords))
                                            <ul class="skill-list">
                                                @foreach ($skill->keywords as $keyword)
                                                    <li>{{ $keyword }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Interests --}}
                        @if (count($resume->interests))
                            <div class="sidebar-section">
                                <div class="sidebar-heading">Interests</div>
                                @foreach ($resume->interests as $interest)
                                    <div class="skill-group">
                                        <div class="skill-group-name">{{ $interest->name }}</div>
                                        @if (count($interest->keywords))
                                            <ul class="skill-list">
                                                @foreach ($interest->keywords as $kw)
                                                    <li>{{ $kw }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Certificates --}}
                        @if (count($resume->certificates))
                            <div class="sidebar-section">
                                <div class="sidebar-heading">Certificates</div>
                                @foreach ($resume->certificates as $cert)
                                    <div class="edu-entry">
                                        <div class="edu-degree">
                                            @if ($cert->url ?? null)
                                                <a href="{{ $cert->url }}">{{ $cert->name }}</a>
                                            @else
                                                {{ $cert->name }}
                                            @endif
                                        </div>
                                        @if ($cert->issuer ?? null)
                                            <div class="edu-institution">{{ $cert->issuer }}</div>
                                        @endif
                                        @if ($cert->date ?? null)
                                            <div class="edu-date">
                                                {{ \Carbon\Carbon::parse($cert->date)->format('M Y') }}</div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </aside>

                    {{-- ── RIGHT MAIN COLUMN ── --}}
                    <main class="main-col">

                        {{-- Summary / Profile --}}
                        @if ($resume->basics->summary ?? null)
                            <div class="main-section">
                                <div class="main-heading">Profile</div>
                                <p class="profile-text">{{ $resume->basics->summary }}</p>
                            </div>
                        @endif

                        {{-- Experience --}}
                        @if (count($resume->work))
                            <div class="main-section">
                                <div class="main-heading">Experience</div>
                                @foreach ($resume->work as $job)
                                    <div class="exp-entry">
                                        <div class="exp-timeline">
                                            <div class="exp-dot"></div>
                                            <div class="exp-line"></div>
                                        </div>
                                        <div class="exp-content">
                                            <div class="exp-header">
                                                <span class="exp-job-title">{{ $job->position ?? $job->name }}</span>
                                                <span class="exp-divider">|</span>
                                                <span class="exp-date">
                                                    @if ($job->startDate ?? null)
                                                        {{ \Carbon\Carbon::parse($job->startDate)->format('M Y') }}
                                                        —
                                                        {{ $job->endDate ?? null ? \Carbon\Carbon::parse($job->endDate)->format('M Y') : 'Present' }}
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="exp-company">
                                                @if ($job->url ?? null)
                                                    <a href="{{ $job->url }}">{{ $job->name }}</a>
                                                @else
                                                    {{ $job->name }}
                                                @endif
                                            </div>
                                            @if ($job->summary ?? null)
                                                <p class="exp-summary">{{ $job->summary }}</p>
                                            @endif
                                            @if (count($job->highlights))
                                                <ul class="exp-bullets">
                                                    @foreach ($job->highlights as $h)
                                                        <li>{{ $h }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Projects --}}
                        @if (count($resume->projects))
                            <div class="main-section">
                                <div class="main-heading">Projects</div>
                                @foreach ($resume->projects as $project)
                                    <div class="exp-entry">
                                        <div class="exp-timeline">
                                            <div class="exp-dot"></div>
                                            <div class="exp-line"></div>
                                        </div>
                                        <div class="exp-content">
                                            <div class="exp-header">
                                                <span class="exp-job-title">
                                                    @if ($project->url ?? null)
                                                        <a href="{{ $project->url }}">{{ $project->name }}</a>
                                                    @else
                                                        {{ $project->name }}
                                                    @endif
                                                </span>
                                                @if ($project->startDate ?? null)
                                                    <span class="exp-divider">|</span>
                                                    <span class="exp-date">
                                                        {{ \Carbon\Carbon::parse($project->startDate)->format('M Y') }}
                                                        —
                                                        {{ $project->endDate ?? null ? \Carbon\Carbon::parse($project->endDate)->format('M Y') : 'Present' }}
                                                    </span>
                                                @endif
                                            </div>
                                            @if ($project->description ?? null)
                                                <p class="exp-summary">{{ $project->description }}</p>
                                            @endif
                                            @if (count($project->highlights))
                                                <ul class="exp-bullets">
                                                    @foreach ($project->highlights as $h)
                                                        <li>{{ $h }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Education --}}
                        @if (count($resume->education))
                            <div class="sidebar-section">
                                <div class="sidebar-heading">Education</div>
                                @foreach ($resume->education as $edu)
                                    <div class="edu-entry">
                                        <div class="edu-degree">
                                            {{ collect([$edu->studyType ?? null, $edu->area ?? null])->filter()->implode(' in ') }}
                                        </div>
                                        <div class="edu-institution">
                                            @if ($edu->url ?? null)
                                                <a href="{{ $edu->url }}">{{ $edu->institution }}</a>
                                            @else
                                                {{ $edu->institution }}
                                            @endif
                                        </div>
                                        <div class="edu-date">
                                            @if ($edu->startDate ?? null)
                                                {{ \Carbon\Carbon::parse($edu->startDate)->format('Y') }}
                                                —
                                                {{ $edu->endDate ?? null ? \Carbon\Carbon::parse($edu->endDate)->format('Y') : 'Present' }}
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Languages --}}
                        @if (count($resume->languages))
                            <div class="sidebar-section">
                                <div class="sidebar-heading">Languages</div>

                                <div class="languages-inline">
                                    @foreach ($resume->languages as $lang)
                                        <span class="language-pill">
                                            {{ $lang->language }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Volunteer --}}
                        @if (count($resume->volunteer))
                            <div class="main-section">
                                <div class="main-heading">Volunteer</div>
                                @foreach ($resume->volunteer as $v)
                                    <div class="exp-entry">
                                        <div class="exp-timeline">
                                            <div class="exp-dot"></div>
                                            <div class="exp-line"></div>
                                        </div>
                                        <div class="exp-content">
                                            <div class="exp-header">
                                                <span
                                                    class="exp-job-title">{{ $v->position ?? $v->organization }}</span>
                                                @if ($v->startDate ?? null)
                                                    <span class="exp-divider">|</span>
                                                    <span class="exp-date">
                                                        {{ \Carbon\Carbon::parse($v->startDate)->format('M Y') }}
                                                        —
                                                        {{ $v->endDate ?? null ? \Carbon\Carbon::parse($v->endDate)->format('M Y') : 'Present' }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="exp-company">
                                                @if ($v->url ?? null)
                                                    <a href="{{ $v->url }}">{{ $v->organization }}</a>
                                                @else
                                                    {{ $v->organization }}
                                                @endif
                                            </div>
                                            @if ($v->summary ?? null)
                                                <p class="exp-summary">{{ $v->summary }}</p>
                                            @endif
                                            @if (count($v->highlights))
                                                <ul class="exp-bullets">
                                                    @foreach ($v->highlights as $h)
                                                        <li>{{ $h }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Awards --}}
                        @if (count($resume->awards))
                            <div class="main-section">
                                <div class="main-heading">Awards</div>
                                @foreach ($resume->awards as $award)
                                    <div class="award-entry">
                                        <div class="award-title">{{ $award->title }}</div>
                                        <div class="award-meta">
                                            @if ($award->awarder ?? null)
                                                {{ $award->awarder }}
                                            @endif
                                            @if (($award->awarder ?? null) && ($award->date ?? null))
                                                ·
                                            @endif
                                            @if ($award->date ?? null)
                                                {{ \Carbon\Carbon::parse($award->date)->format('M Y') }}
                                            @endif
                                        </div>
                                        @if ($award->summary ?? null)
                                            <p class="award-summary">{{ $award->summary }}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- References --}}
                        @if (count($resume->references))
                            <div class="main-section">
                                <div class="main-heading">References</div>
                                @foreach ($resume->references as $ref)
                                    <div class="ref-entry">
                                        @if ($ref->name ?? null)
                                            <div class="ref-name">{{ $ref->name }}</div>
                                        @endif
                                        @if ($ref->reference ?? null)
                                            <div class="ref-quote">{{ $ref->reference }}</div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </main>
                </div>

                {{-- ════════════════════════════
                 FOOTER
            ════════════════════════════ --}}
                <div class="resume-footer">
                    <span>{{ $resume->basics->name ?? '' }}</span>
                    <span>Generated {{ now()->format('M Y') }}</span>
                </div>

            </div><!-- .page -->
        </div><!-- .page-wrap -->

    </body>

</html>
