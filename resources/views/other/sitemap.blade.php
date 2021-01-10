<?xml version="1.0" encoding="UTF-8"?>
<urlset
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->

    <url>
        <loc>{{ route('home.index') }}</loc>
    </url>

    @foreach($ai_softwares as $ai_software)
        <url>
            <loc>{{ route('ai_software.view', $ai_software->slug) }}</loc>
        </url>
    @endforeach
    
    @foreach($tutorials as $tutorial)
        <url>
            <loc>{{ $tutorial->tutorial_url }}</loc>
        </url>
    @endforeach
    
    @foreach($blog as $blog_post)
        <url>
            <loc> {{route('blog.show', $blog_post->slug)}} </loc>
        </url>
    @endforeach
    
    <url>
        <loc> {{route('ai-quiz-questions.index')}} </loc>
    </url>
    
</urlset>
