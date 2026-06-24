<x-layout :title="$resume->basics->name . ' — Resume'">
    <x-resume.header :resume="$resume" />

    @if (count($resume->work))
        <x-resume.section title="Experience" id="work-heading">
            <ul class="space-y-8">
                @foreach ($resume->work as $job)
                    <li class="text-sm">
                        <div class="flex flex-col gap-1 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <div class="mb-1">
                                    <span style="color:#dcdcaa;">function </span>
                                    @if ($job->url)
                                        <a href="{{ $job->url }}" target="_blank" rel="noopener noreferrer"
                                            class="hover:underline" style="color:#569cd6;">{{ $job->name }}</a>
                                    @else
                                        <span style="color:#569cd6;">{{ $job->name }}</span>
                                    @endif
                                    <span style="color:#d4d4d4;">()</span>
                                </div>
                                @if ($job->position)
                                    <div class="mb-1">
                                        <span style="color:#9cdcfe;">$position</span>
                                        <span style="color:#d4d4d4;"> = </span>
                                        <span style="color:#ce9178;">"{{ $job->position }}"</span>
                                        <span style="color:#d4d4d4;">;</span>
                                    </div>
                                @endif
                            </div>
                            <x-resume.date-range :start="$job->startDate" :end="$job->endDate" class="shrink-0 mt-1" />
                        </div>
                        @if ($job->summary)
                            <p class="mt-2 leading-relaxed" style="color:#6a9955;">// {{ $job->summary }}</p>
                        @endif
                        @if (count($job->highlights))
                            <ul class="mt-3 space-y-1" style="color:#d4d4d4;">
                                @foreach ($job->highlights as $highlight)
                                    <li class="flex items-start gap-2">
                                        <span style="color:#c586c0;">→</span>
                                        <span>{{ $highlight }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </x-resume.section>
    @endif

    @if (count($resume->education))
        <x-resume.section title="Education" id="education-heading">
            <ul class="space-y-6">
                @foreach ($resume->education as $edu)
                    <li class="text-sm">
                        <div class="flex flex-col gap-1 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <div class="mb-1">
                                    <span style="color:#dcdcaa;">function </span>
                                    @if ($edu->url)
                                        <a href="{{ $edu->url }}" target="_blank" rel="noopener noreferrer"
                                            class="hover:underline" style="color:#569cd6;">{{ $edu->institution }}</a>
                                    @else
                                        <span style="color:#569cd6;">{{ $edu->institution }}</span>
                                    @endif
                                    <span style="color:#d4d4d4;">()</span>
                                </div>
                                @if ($edu->area || $edu->studyType)
                                    <div class="mb-1">
                                        <span style="color:#9cdcfe;">$degree</span>
                                        <span style="color:#d4d4d4;"> = </span>
                                        <span
                                            style="color:#ce9178;">"{{ collect([$edu->studyType, $edu->area])->filter()->implode(' in ') }}"</span>
                                        <span style="color:#d4d4d4;">;</span>
                                    </div>
                                @endif
                            </div>
                            <x-resume.date-range :start="$edu->startDate" :end="$edu->endDate" class="shrink-0 mt-1" />
                        </div>
                        @if (filled($edu->score))
                            <div class="mt-1 text-sm">
                                <span style="color:#9cdcfe;">$gpa</span>
                                <span style="color:#d4d4d4;"> = </span>
                                <span style="color:#b5cea8;">{{ $edu->score }}</span>
                                <span style="color:#d4d4d4;">;</span>
                            </div>
                        @endif
                        @if (count($edu->courses))
                            <div class="mt-3">
                                <div class="mb-2 text-xs" style="color:#6a9955;">// courses</div>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($edu->courses as $course)
                                        <span class="rounded px-2 py-0.5 text-xs"
                                            style="background:#2d2d30; color:#9cdcfe; border:1px solid #3e3e42;">{{ $course }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </x-resume.section>
    @endif

    @if (count($resume->skills))
        <x-resume.section title="Skills" id="skills-heading">
            <ul class="space-y-5">
                @foreach ($resume->skills as $skill)
                    <li class="text-sm">
                        <div class="mb-2 flex flex-wrap items-baseline gap-2">
                            <span style="color:#dcdcaa;">$</span><span
                                style="color:#9cdcfe;">{{ lcfirst(str_replace(' ', '_', $skill->name)) }}</span>
                            <span style="color:#d4d4d4;"> = [</span>
                            @if ($skill->level)
                                <span class="rounded px-1.5 py-0.5 text-xs"
                                    style="background:#0e3a1c; color:#4ec9b0; border:1px solid #1a5c30;">{{ $skill->level->title() }}</span>
                            @endif
                        </div>
                        @if (count($skill->keywords))
                            <div class="ml-4 flex flex-wrap gap-2 mb-2">
                                @foreach ($skill->keywords as $keyword)
                                    <span class="rounded px-2.5 py-1 text-xs"
                                        style="background:#1e1e2e; color:#ce9178; border:1px solid #3e3e42;">"{{ $keyword }}"</span>
                                @endforeach
                            </div>
                        @endif
                        <div style="color:#d4d4d4;">];</div>
                    </li>
                @endforeach
            </ul>
        </x-resume.section>
    @endif

    @if (count($resume->projects))
        <x-resume.section title="Projects" id="projects-heading">
            <ul class="space-y-8">
                @foreach ($resume->projects as $project)
                    <li class="text-sm">
                        <div class="flex flex-col gap-1 sm:flex-row sm:items-start sm:justify-between">
                            <div class="mb-1">
                                <span style="color:#dcdcaa;">function </span>
                                @if ($project->url)
                                    <a href="{{ $project->url }}" target="_blank" rel="noopener noreferrer"
                                        class="hover:underline" style="color:#569cd6;">{{ $project->name }}</a>
                                @else
                                    <span style="color:#569cd6;">{{ $project->name }}</span>
                                @endif
                                <span style="color:#d4d4d4;">()</span>
                            </div>
                            <x-resume.date-range :start="$project->startDate" :end="$project->endDate" class="shrink-0 mt-1" />
                        </div>
                        @if ($project->description)
                            <p class="mt-1 mb-3 leading-relaxed" style="color:#6a9955;">// {{ $project->description }}
                            </p>
                        @endif
                        @if (count($project->highlights))
                            <ul class="space-y-1" style="color:#d4d4d4;">
                                @foreach ($project->highlights as $highlight)
                                    <li class="flex items-start gap-2">
                                        <span style="color:#c586c0;">→</span>
                                        <span>{{ $highlight }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </x-resume.section>
    @endif

    @if (count($resume->volunteer))
        <x-resume.section title="Volunteer" id="volunteer-heading">
            <ul class="space-y-8">
                @foreach ($resume->volunteer as $v)
                    <li class="text-sm">
                        <div class="flex flex-col gap-1 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <div class="mb-1">
                                    <span style="color:#dcdcaa;">function </span>
                                    @if ($v->url)
                                        <a href="{{ $v->url }}" target="_blank" rel="noopener noreferrer"
                                            class="hover:underline" style="color:#569cd6;">{{ $v->organization }}</a>
                                    @else
                                        <span style="color:#569cd6;">{{ $v->organization }}</span>
                                    @endif
                                    <span style="color:#d4d4d4;">()</span>
                                </div>
                                @if ($v->position)
                                    <div>
                                        <span style="color:#9cdcfe;">$role</span>
                                        <span style="color:#d4d4d4;"> = </span>
                                        <span style="color:#ce9178;">"{{ $v->position }}"</span>
                                        <span style="color:#d4d4d4;">;</span>
                                    </div>
                                @endif
                            </div>
                            <x-resume.date-range :start="$v->startDate" :end="$v->endDate" class="shrink-0 mt-1" />
                        </div>
                        @if ($v->summary)
                            <p class="mt-2 leading-relaxed" style="color:#6a9955;">// {{ $v->summary }}</p>
                        @endif
                        @if (count($v->highlights))
                            <ul class="mt-3 space-y-1" style="color:#d4d4d4;">
                                @foreach ($v->highlights as $highlight)
                                    <li class="flex items-start gap-2">
                                        <span style="color:#c586c0;">→</span>
                                        <span>{{ $highlight }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </x-resume.section>
    @endif

    @if (count($resume->awards))
        <x-resume.section title="Awards" id="awards-heading">
            <ul class="space-y-4">
                @foreach ($resume->awards as $award)
                    <li class="rounded p-4 text-sm" style="background:#252526; border:1px solid #3e3e42;">
                        <div class="flex flex-col gap-1 sm:flex-row sm:items-baseline sm:justify-between">
                            <span style="color:#dcdcaa;">{{ $award->title }}</span>
                            @if ($award->date)
                                <time datetime="{{ $award->date->toDateString() }}"
                                    style="color:#6a9955; font-size:0.7rem;">//
                                    {{ $award->date->format('M Y') }}</time>
                            @endif
                        </div>
                        @if ($award->awarder)
                            <p class="mt-1" style="color:#9cdcfe;">{{ $award->awarder }}</p>
                        @endif
                        @if ($award->summary)
                            <p class="mt-2 leading-relaxed" style="color:#6a9955;">// {{ $award->summary }}</p>
                        @endif
                    </li>
                @endforeach
            </ul>
        </x-resume.section>
    @endif

    @if (count($resume->certificates))
        <x-resume.section title="Certificates" id="certificates-heading">
            <ul class="space-y-3">
                @foreach ($resume->certificates as $cert)
                    <li class="flex flex-col gap-1 text-sm sm:flex-row sm:items-baseline sm:justify-between">
                        <div>
                            <span style="color:#dcdcaa;">function </span>
                            @if ($cert->url)
                                <a href="{{ $cert->url }}" target="_blank" rel="noopener noreferrer"
                                    class="hover:underline" style="color:#569cd6;">{{ $cert->name }}</a>
                            @else
                                <span style="color:#569cd6;">{{ $cert->name }}</span>
                            @endif
                            @if ($cert->issuer)
                                <div class="mt-0.5">
                                    <span style="color:#9cdcfe;">$issuer</span>
                                    <span style="color:#d4d4d4;"> = </span>
                                    <span style="color:#ce9178;">"{{ $cert->issuer }}"</span>
                                    <span style="color:#d4d4d4;">;</span>
                                </div>
                            @endif
                        </div>
                        @if ($cert->date)
                            <time datetime="{{ $cert->date->toDateString() }}"
                                style="color:#6a9955; font-size:0.7rem;">// {{ $cert->date->format('M Y') }}</time>
                        @endif
                    </li>
                @endforeach
            </ul>
        </x-resume.section>
    @endif

    @if (count($resume->languages) || count($resume->interests))
        <div class="grid gap-10 lg:grid-cols-2">
            @if (count($resume->languages))
                <x-resume.section title="Languages" id="languages-heading" class="mb-0">
                    <ul class="space-y-3">
                        @foreach ($resume->languages as $lang)
                            <li class="text-sm">
                                <span style="color:#9cdcfe;">$</span><span
                                    style="color:#9cdcfe;">{{ strtolower($lang->language) }}</span>
                                <span style="color:#d4d4d4;"> = </span>
                                <span style="color:#ce9178;">"{{ $lang->fluency }}"</span>
                                <span style="color:#d4d4d4;">;</span>
                            </li>
                        @endforeach
                    </ul>
                </x-resume.section>
            @endif

            @if (count($resume->interests))
                <x-resume.section title="Interests" id="interests-heading" class="mb-0">
                    <ul class="space-y-4">
                        @foreach ($resume->interests as $interest)
                            <li class="text-sm">
                                <span style="color:#9cdcfe;">${{ strtolower($interest->name) }}</span>
                                <span style="color:#d4d4d4;"> = [</span>
                                @if (count($interest->keywords))
                                    <div class="ml-4 mt-1 flex flex-wrap gap-2 mb-1">
                                        @foreach ($interest->keywords as $keyword)
                                            <span style="color:#ce9178;">"{{ $keyword }}"</span><span
                                                style="color:#d4d4d4;">,</span>
                                        @endforeach
                                    </div>
                                @endif
                                <span style="color:#d4d4d4;">];</span>
                            </li>
                        @endforeach
                    </ul>
                </x-resume.section>
            @endif
        </div>
    @endif

    @if (count($resume->references))
        <x-resume.section title="References" id="references-heading">
            <ul class="space-y-6">
                @foreach ($resume->references as $ref)
                    <li class="rounded p-4 text-sm" style="background:#252526; border:1px solid #3e3e42;">
                        @if ($ref->name)
                            <p style="color:#4ec9b0;">{{ $ref->name }}</p>
                        @endif
                        @if ($ref->reference)
                            <blockquote class="mt-2 border-l-2 pl-4 text-sm leading-relaxed italic"
                                style="border-color:#569cd6; color:#6a9955;">
                                // "{{ $ref->reference }}"
                            </blockquote>
                        @endif
                    </li>
                @endforeach
            </ul>
        </x-resume.section>
    @endif

    <x-resume.footer :resume="$resume" />
</x-layout>
