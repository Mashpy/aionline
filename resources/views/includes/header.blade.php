<!--Navbar -->
<nav class="navbar navbar-expand-xl navbar-dark nav-background sticky-top">
    <a class="navbar-brand mr-5 text-dark" href="{{ route('home.index') }}"><h3>AI Online Course</h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
            aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item nav-link {{ (request()->is('/')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home.index') }}">Home</a>
            </li>
            <li class="nav-item nav-link {{ (request()->is('ai-software')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ai_software.index') }}">Ai Software</a>
            </li>
            <li class="nav-item nav-link {{ (request()->is('quiz_topic')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('quiz_topic.index') }}">Quiz</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control" type="text" placeholder="Search">
                    <button class="btn btn-info" type="button">Submit</button>
                    <span class="our-social pleft20">
                        <a href="https://facebook.com/aionlinecourse" target="_blank" title="Facebook" class="fa fa-facebook"></a>
                        <a href="https://twitter.com/aionlinecourse" target="_blank" title="Twitter" class="fa fa-twitter"></a>
                        <a href="https://plus.google.com/b/117716147608852636539/" title="Google plus" target="_blank" class="fa fa-google"></a>
                        <a href="https://www.linkedin.com/company/aionlinecourse/" title="Linkedin" target="_blank" class="fa fa-linkedin"></a>
                        <a href="https://www.youtube.com/channel/UC94LZMGRKqKn3rfaQtzH3Rg" title="Youtube" target="_blank" class="fa fa-youtube"></a>
                    </span>
                </form>
            </li>
        </ul>
    </div>
</nav>
<!--/.Navbar -->

