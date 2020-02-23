<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 mb-2 software-view-panel">
            <section class="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{$ai_software->logo_url}}" class="software-view-logo" alt="...">
                            <div class="like-review">
                                <form action="{{route('ai_software.software.like', $ai_software->id)}}" method="post">
                                    @csrf
                                    <button class="btn alternate-seemore-btn btn-sm" type="submit" title="hit like"><i class="fa fa-thumbs-up"></i> {{$ai_software->like}} Like</button>
                                    <a class="btn btn-info btn-sm alternate-seemore-btn" title="view review" href="{{route('ai_software.reviews', $ai_software->slug)}}"><i class="fa fa-user"></i> {{$reviews->count()}} Review</a>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h5><a class="software-view-title" href="{{route('ai_software.view', $ai_software->slug)}}">{{$ai_software->name}}</a></h5>
                            <small>Description</small>
                            <p>{{$ai_software->description}}</p>
                            <small>Social Links</small><br>
                            @php $official_link = "http://".$ai_software->official_link ; @endphp
                            <a href="{{$official_link}}" class="btn btn-outline-warning mt-2 btn-sm" target="_blank"><i class="fa fa-link"></i> Official Website</a>
                            <a href="" class="btn btn-outline-primary mt-2 btn-sm" target="_blank"><i class="fa fa-facebook-square"></i> facebook</a>
                            <a href="" class="btn btn-outline-info mt-2 btn-sm" target="_blank"><i class="fa fa-twitter"></i> twitter</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-3">
            <div>
                @include('includes/google_ad', ['ad_format' => 'rectangle'])        
            </div>
        
            @php $official_link = "http://".$ai_software->official_link ; @endphp
            <a href="{{ $official_link }}" class="btn btn-info float-right mt-2 official-link-button" target="_blank">Official Website</a>

        </div>
    </div>
</div>