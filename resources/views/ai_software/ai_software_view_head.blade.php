<div class="container-fluid view-card-background">
    <div class="row">
        <div class="col-md-9 mb-2">
            <div class="card pt-2 view-card-background border-0">
                <div class="card-body">
                    <img src="{{$ai_softare->logo_url}}" class="ai-logo" alt="...">
                    <h5 class="card-title text-center"><a class="ai-software-view-card-head" href="{{route('ai_software.view', $ai_softare->slug)}}">{{$ai_softare->name}}</a></h5>
                    <form action="{{route('ai_software.software.like', $ai_softare->id)}}" method="post">
                        @csrf
                        <p class="card-title text-center">
                            <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-heart"></i> Like</button>
                            <a class="btn btn-info btn-sm" href="{{route('ai_software.reviews', $ai_softare->slug)}}"><i class="fa fa-user"></i> {{$reviews->count()}} Reviews</a>
                        </p>
                    </form>
                    <small class="card-text review-text-color">{{$ai_softare->description}}</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            @include('includes/google_ad')
            @php $official_link = "http://".$ai_softare->official_link ; @endphp
            <a href="{{ $official_link }}" class="btn btn-info float-right mt-2 official-link-button" target="_blank">Official Website</a>

        </div>
    </div>
</div>