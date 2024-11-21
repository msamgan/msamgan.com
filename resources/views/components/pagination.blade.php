<div class="flex justify-center space-x-1 text-gray-800">
    @if ($data['prev_page_url'])
        <a
            href="{{ url('posts?page=' . $data['current_page'] - 1 . '&query=' . request('query', '')) }}"
            title="previous"
            type="button"
            class="inline-flex h-8 w-8 items-center justify-center rounded-md border border-gray-100 bg-gray-50 py-0 shadow-md"
        >
            <svg
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="w-4"
            >
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
        </a>
    @endif

    @for ($i = 1; $i <= $data['last_page']; $i++)
        <a
            href="{{ url('posts?page=' . $i . '&query=' . request('query', '')) }}"
            type="button"
            title="Page 1"
            class="{{ $i === $data['current_page'] ? 'inline-flex h-8 w-8 items-center justify-center rounded border border-red-600 bg-gray-50 text-sm text-red-600 shadow-md' : 'inline-flex h-8 w-8 items-center justify-center rounded border border-gray-100 bg-gray-50 text-sm shadow-md' }}"
        >
            {{ $i }}
        </a>
    @endfor

    @if ($data['next_page_url'])
        <a
            href="{{ url('posts?page=' . $data['current_page'] + 1 . '&query=' . request('query', '')) }}"
            title="next"
            type="button"
            class="inline-flex h-8 w-8 items-center justify-center rounded-md border border-gray-100 bg-gray-50 py-0 shadow-md"
        >
            <svg
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="w-4"
            >
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a>
    @endif
</div>
