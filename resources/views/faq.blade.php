@extends('layouts.master')

@section('title') FAQ | Ai Online Course @endsection

@section('content')
    @include('includes.header')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">FAQ</h1>
            <div class="col-md-8 offset-md-2 faq-qa">
                <div class="faq-qa-in">
                    <div id="accordion" class="faq-qa-container">
                        <div id="qa-1" class="faq-qa-category">
                            <h2 class="faq-category-hd">Product Information</h2>
                            <div class="faq-qa-category-in">

                                <div class="faq-qa-entry">
                                    <div class="faq-qa-title">
                                        <i></i>
                                        <h3 class="faq-qa-category-hd">How can I check product availability?</h3>
                                    </div>
                                    <div class="faq-qa-content">
                                        <li class="custom-des">Go to Products and select a product to discover
                                            availability. You will be able to view the product’s availability.
                                        </li>
                                        <li class="custom-des">Contact the Supply Continuity Team at 1-XXX-XXX-XXXX
                                            or PISupplyContinuity@bacso.com for all your supply needs, including
                                            order fulfillment/status, live ordering, and allocation requests.
                                        </li>

                                    </div>
                                </div>
                                <div class="faq-qa-entry">
                                    <div class="faq-qa-title">
                                        <i></i>
                                        <h3 class="faq-qa-category-hd">How do I contact a Hospita sales
                                            representative?</h3>
                                    </div>
                                    <div class="faq-qa-content">
                                        <p class="custom-des">• Please contact Customer Service for product pricing
                                            information at 1-XXX-XXX-XXXX</p>
                                        <p class="custom-des">• For help getting in touch with one of our
                                            knowledgeable sales representatives, please go to Contact Us and provide
                                            some information so a Pfizer Sales Representative can follow up.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
@stop
@section('run_custom_jquery')
<script>
    $(document).ready(function() {
        // Select all links with hashes
        $('a[href*="#"]')
            // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function(event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                    &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function() {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            };
                        });
                    }
                }
            });

        jQuery(function() {
            var Accordion = function(el, multiple) {
                this.el = el || {};
                this.multiple = multiple || false;

                var links = this.el.find('.faq-qa-title');
                links.on('click', {
                    el: this.el,
                    multiple: this.multiple
                }, this.dropdown)
            }

            Accordion.prototype.dropdown = function(e) {
                var jQueryel = e.data.el;
                jQuerythis = jQuery(this),
                    jQuerynext = jQuerythis.next();

                jQuerynext.slideToggle();
                jQuerythis.parent().toggleClass('open');

                if (!e.data.multiple) {
                    jQueryel.find('.faq-qa-content').not(jQuerynext).slideUp().parent().removeClass('open');
                };
            }
            var accordion = new Accordion(jQuery('.faq-qa-container'), false);
        });
        if (window.matchMedia('(min-width: 768px)').matches)
        {
            var stickySidebar = $('.faq-category-wrp').offset().top;
            $(window).scroll(function() {
                if ($(window).scrollTop() > stickySidebar) {
                    $('.faq-category-wrp').addClass('affix');
                }
                else {
                    $('.faq-category-wrp').removeClass('affix');
                }
            });
        }

    });

</script>
@stop