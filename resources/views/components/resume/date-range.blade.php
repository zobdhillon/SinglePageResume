@props(['start' => null, 'end' => null])

<p {{ $attributes->class('inline-flex items-center gap-1.5 text-xs') }}
    style="color:#6a9955; font-family: 'JetBrains Mono', monospace;">
    <span>// {{ $start?->format('M Y') ?? '—' }} — {{ $end?->format('M Y') ?? 'Present' }}</span>
</p>
