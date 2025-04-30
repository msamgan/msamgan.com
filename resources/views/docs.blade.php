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
    } else {
        $mdContent = '<p>Documentation not found.</p>';
    }
@endphp

<x-layouts.docs>
    <article class="docs post mb-12 space-y-8 text-gray-900">
        {!! $mdContent !!}
    </article>
</x-layouts.docs>
