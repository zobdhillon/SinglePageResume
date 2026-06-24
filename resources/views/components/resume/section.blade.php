@props(['title', 'icon' => null, 'id' => null])

<section {{ $attributes->class('mb-10') }}
    @if ($id) aria-labelledby="{{ $id }}" @endif>

    {{-- Section header styled as a PHP class declaration --}}
    <div class="mb-4 text-sm" @if ($id) id="{{ $id }}" @endif>
        <span style="color:#569cd6;">class </span><span
            style="color:#4ec9b0; font-size:1.1rem; font-weight:500;">{{ $title }}</span><span
            style="color:#c586c0;"> extends </span><span style="color:#4ec9b0;">Resume</span><span style="color:#d4d4d4;">
            {</span>
    </div>

    {{-- Content indented like a class body --}}
    <div class="ml-6 border-l pl-4" style="border-color:#3e3e42;">
        {{ $slot }}
    </div>

    <div class="mt-4 text-sm" style="color:#d4d4d4;">}</div>

    <div class="mt-2 border-t" style="border-color:#2d2d30;"></div>
</section>
