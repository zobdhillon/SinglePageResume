<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ $title }}</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300;400;500&display=swap"
            rel="stylesheet">
        <link rel="icon"
            href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100' fill='%234ec9b0'><text y='.85em' font-size='65' font-family='monospace' font-weight='bold'>%3E_</text></svg>">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            @media print {
                body {
                    background: #ffffff !important;
                    color: #1a1a1a !important;
                }

                .no-print {
                    display: none !important;
                }

                .print-page {
                    background: #ffffff !important;
                    border: none !important;
                    box-shadow: none !important;
                }

                .vs-keyword {
                    color: #0000ff !important;
                }

                .vs-class-name {
                    color: #267f99 !important;
                }

                .vs-fn {
                    color: #795e26 !important;
                }

                .vs-string {
                    color: #a31515 !important;
                }

                .vs-comment-text {
                    color: #008000 !important;
                }

                .vs-text-main {
                    color: #1a1a1a !important;
                }

                .vs-line-num {
                    color: #aaaaaa !important;
                }

                * {
                    -webkit-print-color-adjust: exact;
                    print-color-adjust: exact;
                }

                section {
                    page-break-inside: avoid;
                }

                li {
                    page-break-inside: avoid;
                }

                h2 {
                    page-break-after: avoid;
                }

                .print-page {
                    padding: 20px !important;
                }

                @page {
                    margin: 1.5cm;
                }
            }
        </style>
    </head>

    <body class="bg-vs-bg text-vs-text antialiased" style="font-family: 'JetBrains Mono', monospace;">

        {{-- Top bar — mimics VS Code tab bar --}}
        <div class="no-print sticky top-0 z-10 flex items-center justify-between border-b border-vs-border bg-vs-surface px-4 py-2"
            style="background:#2d2d30;">
            <div class="flex items-center gap-3">
                <div class="flex gap-1.5">
                    <span class="h-3 w-3 rounded-full bg-red-500"></span>
                    <span class="h-3 w-3 rounded-full bg-yellow-400"></span>
                    <span class="h-3 w-3 rounded-full bg-green-500"></span>
                </div>
                <div class="flex items-center gap-2 rounded-t border-t-2 border-t-vs-blue bg-vs-bg px-4 py-1.5 text-xs text-vs-text"
                    style="border-top-color:#569cd6; margin-bottom:-1px;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none"
                        stroke="#ce9178" stroke-width="2">
                        <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z" />
                        <polyline points="13 2 13 9 20 9" />
                    </svg>
                    <span class="text-vs-orange">resume.php</span>
                </div>
            </div>
            <button onclick="window.print()"
                class="flex items-center gap-2 rounded border border-vs-border px-3 py-1.5 text-xs text-vs-comment transition hover:border-vs-blue hover:text-vs-text">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <polyline points="6 9 6 2 18 2 18 9" />
                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                    <rect x="6" y="14" width="12" height="8" />
                </svg>
                <span>Print / Export PDF</span>
            </button>
        </div>

        {{-- Editor layout with line numbers --}}
        <div class="mx-auto max-w-5xl px-0 sm:px-6 py-6 print-page">
            <div class="flex min-h-screen">
                {{-- Line numbers gutter --}}
                <div class="no-print hidden w-12 shrink-0 select-none sm:block" style="color:#858585; font-size:12px;"
                    id="line-numbers"></div>

                {{-- Main content --}}
                <div class="min-w-0 flex-1 border-l border-vs-border pl-4 sm:pl-6">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <script>
            // Generate line numbers dynamically based on content height
            const gutter = document.getElementById('line-numbers');
            const content = gutter?.nextElementSibling;
            if (gutter && content) {
                const lineHeight = 21;
                const lines = Math.floor(content.offsetHeight / lineHeight) - 3;
                gutter.innerHTML = Array.from({
                        length: lines
                    }, (_, i) =>
                    `<div style="line-height:21px">${i + 1}</div>`
                ).join('');
            }

            // Copy to clipboard on email click
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('[data-copy]').forEach(el => {
                    el.addEventListener('click', function(e) {
                        e.preventDefault();
                        navigator.clipboard.writeText(this.dataset.copy);
                        const orig = this.innerHTML;
                        this.innerHTML = '<span style="color:#4ec9b0">✓ copied</span>';
                        setTimeout(() => this.innerHTML = orig, 1500);
                    });
                });
            });
        </script>
    </body>

</html>
