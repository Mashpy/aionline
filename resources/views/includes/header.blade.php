<!--Navbar -->
<div class="top-nav-bar">
    <nav class="navbar navbar-expand-xl navbar-dark nav-background home-navbar-icon">
       <div class="container-fluid">
           <a class="navbar-brand mr-5" href="{{ route('home.index') }}">
               <img src="{{asset('ai-logo.png')}}">
           </a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
                   aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon">&#9776;</span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
               <ul class="navbar-nav m-auto">
                   <li class="nav-item">
                       <form class="form-inline my-2 my-lg-0 search-box" action="{{ route('home.search') }}" method="get">
                           <input type="text" value="{{isset($query) ? $query : ''}}" name="keyword" aria-expanded="false" class="right-20" placeholder="Search for tutorial, blog, software" required>
                       </form>
                   </li>
               </ul>
               <ul class="navbar-nav ml-auto">
                   <span class="our-social">
                       <a href="{{ route('ai-quiz-questions.index') }}" class="btn btn-sm btn-success take-quiz">Take a Quiz Test</a>
                        <a href="https://www.linkedin.com/company/aionlinecourse/" title="Linkedin" target="_blank">
                            <img src="{{asset('images/icons/linkedin.png')}}">
                        </a>
                        <a href="https://twitter.com/aionlinecourse" target="_blank" title="Twitter">
                            <img src="{{asset('images/icons/twitter.png')}}">
                        </a>
                        <a href="https://facebook.com/aionlinecourse" target="_blank" title="Facebook">
                            <img src="{{asset('images/icons/facebook.png')}}">
                        </a>
                        <a href="https://www.youtube.com/channel/UC94LZMGRKqKn3rfaQtzH3Rg" title="Youtube" target="_blank">
                            <img src="{{asset('images/icons/youtube.png')}}">
                        </a>
                    </span>
               </ul>
           </div>
       </div>
    </nav>
</div>
<div class="mobile-search-bar d-block d-sm-none">
    <form class="form-inline my-2 my-lg-0 search-box" action="{{ route('home.search') }}" method="get">
        <input type="text" value="{{isset($query) ? $query : ''}}" name="keyword" aria-expanded="false" class="right-20" placeholder="Search for tutorial, blog, software" required>
    </form>
</div>
<!--/.Navbar -->