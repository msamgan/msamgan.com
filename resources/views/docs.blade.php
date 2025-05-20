@php
    use League\CommonMark\Environment\Environment;
    use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
    use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
    use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkRenderer;
    use League\CommonMark\MarkdownConverter;

    $project = request('project');
    $page = request('page') ?? 'index';
    $filePath = resource_path('views/docs/' . $project . DIRECTORY_SEPARATOR . $page . '.md');

    if (file_exists($filePath)) {
        $mdContent = file_get_contents($filePath);
        $sidebar = file_get_contents(resource_path('views/docs/' . $project . DIRECTORY_SEPARATOR . 'sidebar.md'));
        // Convert Markdown to HTML

        $config = [
            'heading_permalink' => [
                'html_class' => 'heading-permalink',
                'id_prefix' => '',
                'apply_id_to_heading' => false,
                'heading_class' => '',
                'fragment_prefix' => '',
                'insert' => 'before',
                'min_heading_level' => 1,
                'max_heading_level' => 6,
                'title' => 'Permalink',
                'symbol' => HeadingPermalinkRenderer::DEFAULT_SYMBOL,
                'aria_hidden' => true,
            ],
        ];

        $environment = new Environment($config);

        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new HeadingPermalinkExtension());

        $converter = new MarkdownConverter($environment);
        $mdContent = $converter->convert($mdContent);
        $sidebar = $converter->convert($sidebar);
    } else {
        $sidebar = '<div></div>';
        $mdContent = '<p>Documentation not found.</p>';
    }
@endphp

<x-layouts.docs>
    <x-slot name="head">
        <title>{{ titleGenerator(Str::title('laravel env key checker')) }}</title>
        <meta
            name="description"
            content="Ensure consistency across your Laravel .env files with the Laravel Env Keys Checker package. Automatically sync, validate, and manage keys across multiple .env files to prevent missing configurations and streamline your development workflow."
        />
        <meta
            name="keywords"
            content="Laravel .env checker, Laravel environment keys, .env validation, Laravel keys management, Laravel package, .env files sync, Laravel .gitignore, Laravel env keys checker, environment file management, PHP artisan tools"
        />

        <meta property="og:title" content="{{ titleGenerator(Str::title('laravel env key checker')) }}" />
        <meta
            property="og:description"
            content="Ensure consistency across your Laravel .env files with the Laravel Env Keys Checker package. Automatically sync, validate, and manage keys across multiple .env files to prevent missing configurations and streamline your development workflow."
        />
        <meta
            property="og:image"
            content="{{ 'https://github.com/user-attachments/assets/8f80ef4a-a777-46ed-bc49-e70e3c1bec60' }}"
        />
    </x-slot>
    <div class="flex w-full flex-col md:flex-row gap-8 md:gap-16 px-4 md:px-0 py-6">
        <article class="docs post w-full md:w-8/12">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 md:p-8 border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:shadow-lg">
                <div class="prose prose-red max-w-none dark:prose-invert">
                    {!! $mdContent !!}
                </div>

                <!-- Article footer with metadata -->
                <div class="mt-10 pt-6 border-t border-gray-200 dark:border-gray-700 flex flex-wrap items-center justify-between text-sm text-gray-600 dark:text-gray-400">
                    <div class="flex items-center mb-2 md:mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <span>Last updated: {{ date('M d, Y') }}</span>
                    </div>
                    <div class="flex space-x-4">
                        <a href="https://github.com/msamgan/laravel-env-keys-checker" target="_blank" class="flex items-center hover:text-red-500 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                            View on GitHub
                        </a>
                    </div>
                </div>
            </div>
        </article>
        <aside class="post w-full md:w-4/12">
            <div class="docs sticky left-0 right-0 top-6 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:shadow-lg">
                <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Documentation
                </h2>
                <div class="docs-sidebar">
                    {!! $sidebar !!}
                </div>
            </div>
        </aside>
    </div>
</x-layouts.docs>
