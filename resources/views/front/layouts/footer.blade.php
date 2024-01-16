<!--Start footer -->

<div class="footer">
    <div class="container">
        <div class="row all_links_wrapper">
            <div class="col-12 col-md-6 col-lg-5">
                <a href="index.html">
                    <img src="{{ asset('FrontS/img/logoo.png')}}" alt="" class="footer_logo">
                </a>
                       <div class="info_contact">
                        <p class="footer_des">
                            Subscribe our Newsletter
                        </p>

                        <form action="{{route('storemail')}}" class="footer-form" method="POST" data-parsley-validate>
                            @csrf
                            @method('post')
                            <i class="far fa-envelope"></i>
                            <input type="email" name="email" required placeholder="النشره البريديه">
                            <input type="submit" name="submit" value="@lang('website.send')">
                        </form>


                    </div>
                <div class="info_contact">
                    <p class="footer_des">
                        {{$setting->description}}
                    </p>

                    <div class="icon-social d-flex">
                        <div class="social-cont face">
                            <a href="{{$setting->facebook}}">
                                <i class="fa fa-facebook-f"></i>
                            </a>
                        </div>
                        <div class="social-cont twiter">
                            <a href="{{$setting->twitter}}">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                        <div class="social-cont whats">
                            <a href="{{$setting->instagram}}">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>



                    </div>

                </div>

            </div>
            <div class=" col-md-6 col-lg-4">
                <h3 class="footer-title heading-list"> @lang('website.quicklinks')<i class="fas fa-sort-down"></i></h3>
                <ul class="footer_menu grid_menu grid-mob">
                    <li>
                        <a href="{{route('aboutus')}}" class="footer-link">@lang('website.aboutus')</a>
                    </li>
                    <li>
                        <a href="{{route('services')}}" class="footer-link"> @lang('website.services')</a>
                    </li>
                    <li>
                        <a href="{{route('clients')}}" class="footer-link">@lang('website.clients')</a>
                    </li>
                     <li>
                        <a  href="{{route('requestjobs')}}" class="footer-link">@lang('website.jobs') </a>
                     </li>
                    <li>
                        <a  href="{{route('servicereq')}}" class="footer-link">@lang('website.servicerequest')</a>
                    </li>
                    <li>
                        <a href="{{route('news')}}" class="footer-link">@lang('website.news')</a>
                    </li>
                    <li>
                        <a href="{{route('respons')}}" class="footer-link">@lang('website.respons')</a>
                    </li>
                     <li>
                        <a href="{{route('consultants')}}" class="footer-link" >@lang('website.consultants')</a>
                     </li>
                     <li>
                        <a href="{{route('contactsus')}}" class="footer-link">@lang('website.contactUs')</a>
                    </li>
                </ul>
            </div>

            <div class="col-6 col-lg-3">
                <h3 class="footer-title heading-list">@lang('website.contactinfo')<i class="fas fa-sort-down"></i></h3>
                <ul class="footer_menu">
                    <li>
                        <i class="fas fa-phone"></i>
                        <a href="tel:{{$setting->phone}}" class="footer-link">{{$setting->phone}} </a>

                    </li>
                    <li>
                        <i class="far fa-envelope"></i>
                        <a href="mailto: {{$setting->email}}" class="footer-link">{{$setting->email}}</a>
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <a href="#" class="footer-link"> {{$setting->address}}</a>
                    </li>


                </ul>

            </div>


        </div>

    </div>

</div>

<!-- end footer -->
<div class="copyrights ">
    <div class="container ">
        <div class="row ">
            <div class="col-12 col-md-3 ">
                <a href="#">
                    <div class="made_By ">
                        <span><img src="{{ asset('FrontS/img/kian.png')}}" alt="" class="img-fliud footer-a ">@lang('website.kian')</span>

                    </div>
                </a>
            </div>
            <div class="col-12 col-md-9 ">
                <div class="d-flex justify-content-center justify-content-md-end ">
                    <p>@lang('website.copyright')</p>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="# " class="go-top " data-toggle="tooltip " title=" " data-placement="left " data-original-title="go to top ">
    <i class="fa fa-arrow-up "></i>
</a>




<script src="{{ asset('FrontS/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('FrontS/js/simple-lightbox.min.js') }} " type="text/javascript "></script>
<script src="{{ asset('FrontS/js/slick.js ') }}"></script>
<script src="{{ asset('FrontS/js/jquery.nice-select.js') }} "></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js " integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN " crossorigin="anonymous "></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="{{ asset('FrontS/js/bootstrap.min.js') }} "></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js "></script>
<script src="{{ asset('FrontS/js/main.js') }} "></script>
<script src="{{ asset('FrontS/js/wow.min.js') }} "></script>
<script>
    new WOW().init();
</script>
<script src="{{asset('AdminS/parsley/parsley.min.js')}}"></script>
<script src="{{asset('AdminS/i18n/ar.js')}}"></script>

<script>

$('.clipboard').on('click', function() {
  var temp = $("<input>");
  var url = $(location).attr('href');

  $("body").append(temp);
  temp.val(url).select();
  document.execCommand("copy");
  temp.remove();
  swal("@lang('website.copied')","", "success");
}) 
</script>



@stack('js')



</body>

</html>
