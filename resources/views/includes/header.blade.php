<!--Navbar -->
<div class="top-nav-bar">
    <p class="top-notification"><marquee direction="left">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</marquee></p>
    <nav class="navbar navbar-expand-xl navbar-dark nav-background">
       <div class="container">
           <a class="navbar-brand mr-5" href="{{ route('home.index') }}">
               <img src="{{asset('ai-logo.png')}}">
           </a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
                   aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
               <ul class="navbar-nav m-auto">
                   <li class="nav-item">
                       <form class="form-inline my-2 my-lg-0 search-box">
                           <input type="text" aria-expanded="false" class="right-20" placeholder="Search">
                       </form>
                   </li>
               </ul>
               <ul class="navbar-nav ml-auto">
                   <span class="our-social">
                       <a href="" class="btn btn-sm btn-success take-quiz">Take a Quiz Test</a>
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
<!--/.Navbar -->