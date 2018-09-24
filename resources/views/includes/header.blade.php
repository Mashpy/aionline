<nav class="navbar navbar-expand-sm navbar-dark bg-info">
    <a class="navbar-brand" href="{{ route('home.index') }}">AI ONLINE COURSE</a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('home.index') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('quiz_topic.index') }}">Quiz</a></li>
    </ul>

    <form class="form-inline my-2 my-lg-0">
        <input class="form-control" type="text" placeholder="Search">
        <button class="btn btn-info" style="border: 1px dotted white" type="button">Submit</button>

        <span class="our-social pleft20">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-google"></a>
            <a href="#" class="fa fa-linkedin"></a>
            <a href="#" class="fa fa-youtube"></a>
        </span>
    </form>
</nav>