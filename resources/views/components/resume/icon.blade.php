@props(['name', 'class' => 'h-4 w-4'])

@switch($name)
    @case('mail')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="{{ $class }}" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="m3 7 8.25 5.5a1.5 1.5 0 0 0 1.5 0L21 7" />
            <rect x="3" y="5" width="18" height="14" rx="2.5" />
        </svg>
        @break
    @case('phone')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="{{ $class }}" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 6.75c0 6.213 5.037 11.25 11.25 11.25h1.5A2.25 2.25 0 0 0 19.5 15.75v-.976c0-.61-.432-1.135-1.029-1.252l-3.138-.627a1.125 1.125 0 0 0-1.173.417l-.69.92a.9.9 0 0 1-.955.331 9.752 9.752 0 0 1-5.078-5.078.9.9 0 0 1 .331-.955l.92-.69c.338-.254.5-.683.417-1.173l-.627-3.138A1.275 1.275 0 0 0 7.726 2.5H6.75A2.25 2.25 0 0 0 4.5 4.75v2Z" />
        </svg>
        @break
    @case('link')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="{{ $class }}" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H8.25A3.75 3.75 0 0 0 4.5 9.75v6A3.75 3.75 0 0 0 8.25 19.5h6a3.75 3.75 0 0 0 3.75-3.75V10.5" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 4.5h4.5V9" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 13.5 19.5 4.5" />
        </svg>
        @break
    @case('location')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="{{ $class }}" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-5.5 7-11a7 7 0 1 0-14 0c0 5.5 7 11 7 11Z" />
            <circle cx="12" cy="10" r="2.5" />
        </svg>
        @break
    @case('calendar')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="{{ $class }}" stroke-width="1.8">
            <rect x="3" y="5" width="18" height="16" rx="2.5" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 3v4M16 3v4M3 10h18" />
        </svg>
        @break
    @case('briefcase')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="{{ $class }}" stroke-width="1.8">
            <rect x="3" y="7" width="18" height="12" rx="2.5" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 7V5.75A1.75 1.75 0 0 1 10.75 4h2.5A1.75 1.75 0 0 1 15 5.75V7M3 12h18" />
        </svg>
        @break
    @case('education')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="{{ $class }}" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="m3 9 9-4 9 4-9 4-9-4Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 11.5V15c0 1.6 2.2 3 5 3s5-1.4 5-3v-3.5" />
        </svg>
        @break
    @case('skills')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="{{ $class }}" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="m14.25 4.5-9.75 9.75 5.5 5.5 9.75-9.75-5.5-5.5Z" />
            <circle cx="15.5" cy="8.5" r="1" />
        </svg>
        @break
    @case('projects')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="{{ $class }}" stroke-width="1.8">
            <rect x="3" y="4" width="7" height="7" rx="1.5" />
            <rect x="14" y="4" width="7" height="7" rx="1.5" />
            <rect x="3" y="15" width="7" height="7" rx="1.5" />
            <rect x="14" y="15" width="7" height="7" rx="1.5" />
        </svg>
        @break
    @case('award')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="{{ $class }}" stroke-width="1.8">
            <circle cx="12" cy="8" r="4" />
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.8 12.4-1.3 7.1L12 17l4.5 2.5-1.3-7.1" />
        </svg>
        @break
    @case('book')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="{{ $class }}" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 4h10a3 3 0 0 1 3 3v12H9a3 3 0 0 0-3 3V4Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 19h10" />
        </svg>
        @break
    @case('language')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="{{ $class }}" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21c4.97 0 9-4.03 9-9s-4.03-9-9-9-9 4.03-9 9 4.03 9 9 9Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M12 3c2.8 2.5 4 5.5 4 9s-1.2 6.5-4 9c-2.8-2.5-4-5.5-4-9s1.2-6.5 4-9Z" />
        </svg>
        @break
    @case('heart')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="{{ $class }}">
            <path d="M12.001 20.727C4.87 16.286 2 12.75 2 8.86A4.86 4.86 0 0 1 6.86 4c2.014 0 3.322.997 5.14 2.9C13.818 4.997 15.126 4 17.14 4A4.86 4.86 0 0 1 22 8.86c0 3.89-2.87 7.426-9.999 11.867Z" />
        </svg>
        @break
    @default
        <span class="{{ $class }}"></span>
@endswitch
