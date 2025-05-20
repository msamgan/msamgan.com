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
    <div class="flex w-full flex-col md:flex-row gap-8 md:gap-16 px-4 md:px-0">
        <article class="docs post w-full md:w-8/12 bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 md:p-8">
            <div class="prose prose-red max-w-none dark:prose-invert">
                {!! $mdContent !!}
            </div>
        </article>
        <aside class="post w-full md:w-4/12">
            <div class="docs sticky left-0 right-0 top-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2">Documentation</h2>
                <div class="docs-sidebar">
                    {!! $sidebar !!}
                </div>
                <div class="mt-8 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <iframe
                        src="https://github.com/sponsors/msamgan/card"
                        title="Sponsor msamgan"
                        height="225"
                        width="100%"
                        style="border: 0"
                    ></iframe>
                </div>
            </div>
        </aside>
    </div>
    <script>
        // Add JavaScript to highlight the active section in the sidebar
        document.addEventListener('DOMContentLoaded', function() {
            // Get all headings in the content
            const headings = document.querySelectorAll('.docs h1, .docs h2, .docs h3');
            // Get all links in the sidebar
            const sidebarLinks = document.querySelectorAll('.docs-sidebar a');

            // Function to highlight the active section
            function highlightActiveSection() {
                // Get current scroll position
                const scrollPosition = window.scrollY;

                // Find the current section
                let currentSection = null;
                headings.forEach(heading => {
                    if (heading.offsetTop <= scrollPosition + 100) {
                        currentSection = heading.id;
                    }
                });

                // Remove active class from all links
                sidebarLinks.forEach(link => {
                    link.classList.remove('active');

                    // Add active class to the link that matches the current section
                    const href = link.getAttribute('href');
                    if (href && href.includes(currentSection)) {
                        link.classList.add('active');
                    }
                });
            }

            // Add scroll event listener
            window.addEventListener('scroll', highlightActiveSection);

            // Initial highlight
            highlightActiveSection();
        });
    </script>
</x-layouts.docs>
