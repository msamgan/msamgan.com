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
    <div class="flex w-full flex-row gap-1">
        <aside class="post w-4/12 ">
            <div class="sticky left-0 right-0 top-6">
                {!! $sidebar !!}
                <div class="mt-12">
                    <iframe src="https://github.com/sponsors/msamgan/card" title="Sponsor msamgan" height="225"
                            width="460" style="border: 0;"></iframe>
                </div>
            </div>
        </aside>
        <article class="docs post w-8/12">
            {!! $mdContent !!}
        </article>
    </div>
</x-layouts.docs>
