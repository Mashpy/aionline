<footer class="mainfooter" role="contentinfo">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                        <h4>Company</h4>
                        <ul class="list-unstyled">
                            <li><a href="#"></a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">News and Updates</a></li>
                            <li><a href="#">FAQs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-pad">
                        <h4>Top Category</h4>
                        <ul class="list-unstyled">
                            @foreach($categories as $category)
                                 <li><a href="{{route('ai_software.category-softwares', $category->category_slug)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-pad">
                        <h4>Important Links</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Link1</a></li>
                            <li><a href="#">Link2</a></li>
                            <li><a href="#">Link3</a></li>
                            <li><a href="#">Link4</a></li>
                            <li><a href="#">Link5</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4>Follow Us</h4>
                    <ul class="social-network social-circle">
                        <li><a href="https://facebook.com/aionlinecourse" target="_blank" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.linkedin.com/company/aionlinecourse" target="_blank" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="https://twitter.com/aionlinecourse" target="_blank" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://plus.google.com/b/117716147608852636539" target="_blank" class="icoGoogleplus" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UC94LZMGRKqKn3rfaQtzH3Rg" target="_blank" class="icoYoutube" title="Youtube"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 copy">
                    <p class="text-center">&copy; Copyright <script type="text/JavaScript">
                            document.write(new Date().getFullYear());
                        </script> - aionlinecourse.com.  All rights reserved.</p>
                </div>
            </div>


        </div>
    </div>
</footer>