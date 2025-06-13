<div class="flex justify-center space-x-2 text-gray-800">
    @if ($data['prev_page_url'])
        <a
            href="{{ url('posts?page=' . $data['current_page'] - 1 . '&query=' . request('query', '')) }}"
            title="Previous page"
            type="button"
            class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-gray-200 bg-white shadow-sm transition-colors duration-200 hover:bg-gray-50"
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
    @else
        <span
            class="inline-flex h-9 w-9 cursor-not-allowed items-center justify-center rounded-md border border-gray-100 bg-gray-50 text-gray-300"
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
        </span>
    @endif

    @for ($i = 1; $i <= $data['last_page']; $i++)
        <a
            href="{{ url('posts?page=' . $i . '&query=' . request('query', '')) }}"
            type="button"
            title="Page {{ $i }}"
            class="{{
                $i === $data['current_page'] ? 'inline-flex h-9 w-9 items-center justify-center rounded-md bg-gray-900 font-medium text-white shadow-sm' : 'inline-flex h-9 w-9 items-center justify-center rounded-md border border-gray-200 bg-white shadow-sm transition-colors duration-200 hover:bg-gray-50'
            }}"
        >
            {{ $i }}
        </a>
    @endfor

    @if ($data['next_page_url'])
        <a
            href="{{ url('posts?page=' . $data['current_page'] + 1 . '&query=' . request('query', '')) }}"
            title="Next page"
            type="button"
            class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-gray-200 bg-white shadow-sm transition-colors duration-200 hover:bg-gray-50"
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
    @else
        <span
            class="inline-flex h-9 w-9 cursor-not-allowed items-center justify-center rounded-md border border-gray-100 bg-gray-50 text-gray-300"
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
        </span>
    @endif
</div>
