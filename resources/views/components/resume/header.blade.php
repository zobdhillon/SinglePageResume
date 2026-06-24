@props(['resume'])

@php
    $basics = $resume->basics;
    $loc = $basics->location;
@endphp

<header class="mb-8 pt-2">

    {{-- Opening class declaration --}}
    <div class="mb-1 text-sm" style="color:#6a9955;">// {{ $basics->label }} ·
        {{ collect([$loc->city, $loc->countryCode])->filter()->implode(', ') }}</div>

    <div class="mb-2 text-sm">
        <span style="color:#569cd6;">class </span><span
            style="color:#4ec9b0; font-size:1.75rem; font-weight:500; letter-spacing:-0.02em;">{{ $basics->name }}</span><span
            style="color:#d4d4d4;"> {</span>
    </div>

    <div class="ml-6 mb-1 text-sm">
        <span style="color:#569cd6;">public static </span><span style="color:#dcdcaa;">function </span><span
            style="color:#569cd6;">main</span><span style="color:#d4d4d4;">(</span><span
            style="color:#4ec9b0;">string</span><span style="color:#d4d4d4;"> $role</span><span style="color:#d4d4d4;">)
            {</span>
    </div>

    {{-- Content block --}}
    <div class="ml-12 mb-4">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
            <div class="min-w-0 flex-1">

                {{-- Label as string --}}
                @if ($basics->label)
                    <div class="mb-3 text-sm">
                        <span style="color:#9cdcfe;">$title</span>
                        <span style="color:#d4d4d4;"> = </span>
                        <span style="color:#ce9178;">"{{ $basics->label }}"</span>
                        <span style="color:#d4d4d4;">;</span>
                    </div>
                @endif

                {{-- Contact info as array --}}
                <div class="mb-3 text-sm">
                    <span style="color:#9cdcfe;">$contact</span>
                    <span style="color:#d4d4d4;"> = [</span>
                </div>

                <div class="ml-6 flex flex-col gap-1.5 text-sm mb-3">
                    @if ($basics->email)
                        <div>
                            <span style="color:#ce9178;">"email"</span>
                            <span style="color:#d4d4d4;"> => </span>
                            <a href="mailto:{{ $basics->email }}" data-copy="{{ $basics->email }}" class="transition"
                                style="color:#ce9178;" title="Click to copy">
                                "{{ $basics->email }}"
                            </a>
                            <span style="color:#d4d4d4;">,</span>
                        </div>
                    @endif
                    @if ($basics->url)
                        <div>
                            <span style="color:#ce9178;">"portfolio"</span>
                            <span style="color:#d4d4d4;"> => </span>
                            <a href="{{ $basics->url }}" target="_blank" rel="noopener noreferrer"
                                class="transition hover:underline" style="color:#ce9178;">
                                "{{ parse_url($basics->url, PHP_URL_HOST) ?: $basics->url }}"
                            </a>
                            <span style="color:#d4d4d4;">,</span>
                        </div>
                    @endif
                    @if (filled($loc->city) || filled($loc->countryCode))
                        <div>
                            <span style="color:#ce9178;">"location"</span>
                            <span style="color:#d4d4d4;"> => </span>
                            <span
                                style="color:#ce9178;">"{{ collect([$loc->city, $loc->region, $loc->countryCode])->filter()->implode(', ') }}"</span>
                            <span style="color:#d4d4d4;">,</span>
                        </div>
                    @endif
                    @foreach ($basics->profiles as $profile)
                        <div>
                            <span style="color:#ce9178;">"{{ strtolower($profile->network) }}"</span>
                            <span style="color:#d4d4d4;"> => </span>
                            <a href="{{ $profile->url }}" target="_blank" rel="noopener noreferrer"
                                class="transition hover:underline" style="color:#ce9178;">
                                "{{ $profile->username }}"
                            </a>
                            <span style="color:#d4d4d4;">,</span>
                        </div>
                    @endforeach
                </div>

                <div class="text-sm mb-4">
                    <span style="color:#d4d4d4;">];</span>
                </div>

                {{-- Summary as comment block --}}
                @if ($basics->summary)
                    <div class="text-sm leading-relaxed" style="color:#6a9955;">
                        <div>/**</div>
                        <div class="ml-1"> * {{ $basics->summary }}</div>
                        <div> */</div>
                    </div>
                @endif
            </div>

            {{-- Profile photo --}}
            @if ($basics->image)
                <div class="shrink-0">
                    <div class="text-xs mb-1" style="color:#6a9955;">// profile.png</div>
                    <img src="{{ $basics->image }}" alt="{{ $basics->name }}"
                        class="h-28 w-28 rounded-lg object-cover sm:h-32 sm:w-32"
                        style="border: 1px solid #3e3e42; filter: grayscale(10%);" />
                </div>
            @endif
        </div>
    </div>

    <div class="ml-6 mb-1 text-sm" style="color:#d4d4d4;">}</div>
    <div class="text-sm mb-2" style="color:#d4d4d4;">}</div>

    {{-- Closing divider --}}
    <div class="mt-4 border-t" style="border-color:#3e3e42;"></div>
</header>
