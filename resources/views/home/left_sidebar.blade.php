<div class="row">
    <div class="col-md-12>">
        <div class="left-side-home-menu">
            <ul>
                @if(Request::routeIs('home.search'))
                <li class="{{Request::routeIs('home.search') ? 'active' : ''}}">
                    <a href="{{ route('home.search') }}">
                        <img src="{{ asset('images/icons/search.png') }}">
                        <span>Search Result</span>
                    </a>
                </li>
                @endif
                <li class="{{Request::routeIs('home.index') ? 'active' : ''}}">
                    <a href="{{ route('home.index') }}">
                        <img src="{{ asset('images/icons/home.png') }}">
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tutorial.index') }}">
                        <img src="{{ asset('images/icons/browse_tutorial.png') }}">
                        <span>Browse Tutorials</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('ai_software.index') }}">
                        <img src="{{ asset('images/icons/ai_software.png') }}">
                        <span>Ai Softwares</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('ai-quiz-questions.index') }}">
                        <img src="{{ asset('images/icons/quiz.png') }}">
                        <span>Quiz</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('blog.index') }}">
                        <img src="{{ asset('images/icons/blog.png') }}">
                        <span>Blog</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('images/icons/help.png') }}">
                        <span>Help</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('images/icons/feedback.png') }}">
                        <span>Send Feedback</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>