@props(['resume'])

<footer class="mt-10 pb-8 text-xs no-print" style="color:#6a9955; font-family: 'JetBrains Mono', monospace;">
    <div class="border-t pt-4" style="border-color:#3e3e42;">
        <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
            <span>// end of {{ $resume->basics->name }}::resume()</span>
            <span>// built with Laravel · Blade · Tailwind · PHP 8.4</span>
        </div>
    </div>
</footer>
