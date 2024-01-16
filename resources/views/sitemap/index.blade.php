<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc>{{ url('/') }}/news</loc>
        <lastmod>{{ $news->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    @foreach($news->subsections as $new)
    <url>
        <loc>{{ url('/') }}/news/{{ $new->id }}</loc>
        <lastmod>{{ $new->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    <url>
        <loc>{{ url('/') }}/services</loc>
        <lastmod>{{ $services->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    @foreach($services->subsections as $service)
        <url>
            <loc>{{ url('/') }}/services/{{ $service->id }}</loc>
            <lastmod>{{ $service->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    <url>
        <loc>{{ url('/') }}/abouts</loc>
        <lastmod>{{ $abouts->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ url('/') }}/respons</loc>
        <lastmod>{{ $respons->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    @foreach($respons->subsections as $respon)
        <url>
            <loc>{{ url('/') }}/respons/{{ $respon->id }}</loc>
            <lastmod>{{ $respon->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

</urlset>
