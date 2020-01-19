@extends('layouts.master')

@section('title')
@endsection

@section('content')
    @include('includes.header')
    @include('ai_tool.ai_software_view_head')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-9">
                @include('includes.message')
                <nav class="nav nav-tabs">
                    <a href="{{route('ai-tool.view', $ai_tool->slug)}}" class="nav-item nav-link nav-tab-menu">
                        <i class="fa fa-home"></i> Alternatives
                    </a>
                    <a href="{{route('ai-tool.reviews', $ai_tool->slug)}}" class="nav-item nav-link nav-tab-menu active">
                        <i class="fa fa-user"></i> Reviews
                    </a>
                </nav>
                <div class="row">
                    <div class="col-md-12 mb-4 clearfix">
                        <h3 class="ai-tool-header float-left">{{$ai_tool->name}} Reviews</h3>
                        <a class="btn btn-success btn-green float-right mt-2" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="well well-sm">
                                <div class="row display-none" id="post-review-box">
                                    <div class="col-md-12">
                                        <form accept-charset="UTF-8" action="{{route('ai-tool.review.store')}}" method="post">
                                            @csrf
                                            <table class="table">
                                                <tr>
                                                    <th>Name</th>
                                                    <td>
                                                        <input type="text" class="form-control" name="review_by" placeholder="Enter your name" required>
                                                        <input type="hidden" name="alternative_software_id" value="{{$ai_tool->id}}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Title</th>
                                                    <td>
                                                        <input type="text" class="form-control" name="title" placeholder="Enter a title" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Comment</th>
                                                    <td>
                                                        <textarea class="form-control animated" cols="100" id="new-review" name="description" required placeholder="Enter your review here..." rows="5"></textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="text-right mr-2">
                                                <button class="btn btn-danger btn-sm" id="close-review-box">Cancel</button>
                                                <button class="btn btn-success btn-sm" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        @foreach($reviews as $review)
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{asset('uploads/default_photo/reviewer.jpg')}}" class="img img-rounded img-fluid"/>
                                        </div>
                                        <div class="col-md-10">
                                            <h5 class="review-title">{{$review->title}}</h5>
                                            <p>
                                                <small class="float-left">by <strong>{{$review->review_by}}</strong> &bull; about {{$ai_tool->name}} &bull; {{$review->created_at}}</small><br>
                                            </p>
                                            <div class="clearfix"></div>
                                            <p>{{$review->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @include('includes/google_ad')
            </div>
        </div>
    </div>
@include('includes.footer')
@section('run_custom_jquery')
    <script>
        (function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

        $(function(){
            $('#new-review').autosize({append: "\n"});
            var reviewBox = $('#post-review-box');
            var newReview = $('#new-review');
            var openReviewBtn = $('#open-review-box');
            var closeReviewBtn = $('#close-review-box');
            var ratingsField = $('#ratings-hidden');

            openReviewBtn.click(function(e)
            {
                reviewBox.slideDown(400, function()
                {
                    $('#new-review').trigger('autosize.resize');
                    newReview.focus();
                });
                openReviewBtn.fadeOut(100);
                closeReviewBtn.show();
            });

            closeReviewBtn.click(function(e)
            {
                e.preventDefault();
                reviewBox.slideUp(300, function()
                {
                    newReview.focus();
                    openReviewBtn.fadeIn(200);
                });
                closeReviewBtn.hide();

            });
        });
    </script>
@endsection

@endsection


