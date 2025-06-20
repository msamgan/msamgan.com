<footer class="mt-8 border-t border-gray-200 transition-colors duration-200 dark:border-gray-800">
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 sm:py-12">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            <!-- Navigation Links -->
            <div>
                <h3 class="mb-3 text-sm font-medium text-gray-900 dark:text-gray-100">Navigation</h3>
                <ul class="space-y-2">
                    <li>
                        <a
                            href="{{ url('/') }}"
                            wire:navigate
                            class="text-sm text-gray-600 transition-colors duration-200 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                        >
                            Home
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ url('/posts') }}"
                            wire:navigate
                            class="text-sm text-gray-600 transition-colors duration-200 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                        >
                            Blog
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ url('/projects') }}"
                            wire:navigate
                            class="text-sm text-gray-600 transition-colors duration-200 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                        >
                            Projects
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ url('/contact') }}"
                            wire:navigate
                            class="text-sm text-gray-600 transition-colors duration-200 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                        >
                            Contact
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Connect -->
            <div>
                <h3 class="mb-3 text-sm font-medium text-gray-900 dark:text-gray-100">Connect</h3>
                <div class="flex space-x-3">
                    <a
                        href="https://github.com/msamgan"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-gray-500 transition-colors duration-200 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"
                            />
                        </svg>
                    </a>
                    <a
                        href="https://twitter.com/msamgan"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-gray-500 transition-colors duration-200 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"
                            />
                        </svg>
                    </a>
                    <a
                        href="https://www.linkedin.com/in/mohd-samgan-khan/"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-gray-500 transition-colors duration-200 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"
                            />
                        </svg>
                    </a>
                    <a
                        href="https://www.youtube.com/@FellowDeveloper"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-gray-500 transition-colors duration-200 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"
                            />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- About -->
            <div>
                <h3 class="mb-3 text-sm font-medium text-gray-900 dark:text-gray-100">About</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Mohammed Samgan Khan is a Software Engineer with over 9 years of experience in designing, coding,
                    and testing complex applications.
                </p>
                <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">
                    <span class="font-medium">Email:</span>
                    <a href="mailto:mail@msamgan.com" class="text-gray-900 hover:underline dark:text-gray-300">
                        mail@msamgan.com
                    </a>
                </p>
            </div>
        </div>

        <div class="mt-8 border-t border-gray-200 pt-6 text-center dark:border-gray-800">
            <p class="text-xs text-gray-500 dark:text-gray-400">
                &copy; {{ date('Y') }} Mohammed Samgan Khan (msamgan). All rights reserved.
            </p>
        </div>
    </div>
</footer>
