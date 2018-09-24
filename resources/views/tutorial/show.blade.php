@extends('layouts.master')

@section('title')
    {{ $tutorial->title . ' | ' . $tutorial->category->name . ' | ' }}
@endsection

@section('content')
    @include('includes.header')

    <div class="container-fluid top15">
        <div class="row">
            <div class="col-md-3">
                <table class="table table-striped">
                    <tbody>
                        <div class="list-group">
                            @foreach($category_tutorials as $category_tutorial)
                                <div>
                                    <a class="list-group-item list-group-item-action {{ Request::url() == route('tutorial.show', $category_tutorial->slug) ? 'active' : '' }}" href="{{ route('tutorial.show', $category_tutorial->slug) }}">{{$category_tutorial->title}}</a>
                                </div>
                            @endforeach
                        </div>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6 individual-article nopadding">
                <div class="box-style">
                    <h3>{{ $tutorial->title }} | {{$tutorial->category->name}}</h3>
                    <hr>
                    <p>{!! $tutorial->description !!}</p>
                </div>

                <div id="disqus_thread"></div>
                <script>

                    /**
                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                    /*
                     var disqus_config = function () {
                     this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                     this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                     };
                     */
                    (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://www-aionlinecourse-com.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            </div>

            <div class="col-md-3">
                @include('includes/google_ad')
            </div>
        </div>
    </div>

    @include('includes.footer')
@endsection

@section('run_custom_js_file')
    <script id="dsq-count-scr" src="//www-aionlinecourse-com.disqus.com/count.js" async></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ba75bceb97e9318"></script>
@endsection

@section('run_custom_jquery')
    <script>
        $("img").addClass("img-responsive");
    </script>
@endsection
