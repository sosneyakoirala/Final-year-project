<footer>

    <section class="footer-Content">
    <div class="container">
    <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="widget">
    <h3 class="block-title"><img src="{{asset('frontasset/assets/img/logo2.png')}}" class="img-responsive" alt="Footer Logo"></h3>
    <div class="textwidget">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis tincidunt est, et euismod purus suscipit quis. Etiam euismod ornare elementum.  ex est, consectetur eget facilisis sed.</p>
    </div>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="widget">
    <h3 class="block-title">Quick Links</h3>
    <ul class="menu">
    <li><a href="/workers">Worker</a></li>
    <li><a href="/categories">Categories</a></li>
    <li><a href="/contact">Contact</a></li>
    </ul>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="widget">
    <h3 class="block-title">Trending Workers</h3>
    @php( $professions = \App\Models\User::all())

    @foreach($professions->where('role','=','worker')->slice(0,4) as $profession)
    <ul class="menu">
    <li><a href="#">{{$profession->profession}}</a></li>
    </ul>
    @endforeach
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="widget">
    <h5 class="block-title" >Follow Us</h5>
    <div class="bottom-social-icons social-icon">
    <a class="twitter" href="#"><i class="ti-twitter-alt"></i></a>
    <a class="facebook" href="#"><i class="ti-facebook"></i></a>
    <a class="youtube" href="#"><i class="ti-youtube"></i></a>
    <a class="dribble" href="#"><i class="ti-dribbble"></i></a>
    <a class="linkedin" href="#"><i class="ti-linkedin"></i></a>
    </div>
    {{-- <p>Join our mailing list to stay up to date and get notices about our new releases!</p>
    <form class="subscribe-box">
    <input type="text" placeholder="Your email">
    <input type="submit" class="btn-system" value="Send">
    </form> --}}
    </div>
    </div>
    </div>
    </div>
    </section>


    {{-- <div id="copyright">
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <div class="site-info text-center">
    <p>All Rights reserved &copy; 2017 - Designed & Developed by <a rel="nofollow" href="http://graygrids.com">GrayGrids</a></p>
    </div>
    </div>
    </div>
    </div>
    </div> --}}

    </footer>


    {{-- <a href="#" onclick="event.preventDefault();
    document.getElementById('back-to-top').submit();" class="back-to-top">
    <i class="ti-arrow-up"></i>
    </a> --}}
    {{-- <div id="loading">
    <div id="loading-center">
    <div id="loading-center-absolute">
    <div class="object" id="object_one"></div>
    <div class="object" id="object_two"></div>
    <div class="object" id="object_three"></div>
    <div class="object" id="object_four"></div>
    <div class="object" id="object_five"></div>
    <div class="object" id="object_six"></div>
    <div class="object" id="object_seven"></div>
    <div class="object" id="object_eight"></div>
    </div>
    </div>
    </div> --}}



    {{-- <script type="text/javascript">
        $(function () {
            $("#btnSubmit").click(function () {
                var password = $("#password").val();
                var cpassword = $("#cpassword").val();
                if (password != cpassword) {
                    alert("Passwords do not match.");
                    return false;
                }
                return true;
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $("#btnSubmit2").click(function () {
                var password2 = $("#password2").val();
                var cpassword2 = $("#cpassword2").val();
                if (password2 != cpassword2) {
                    alert("Passwords do not match.");
                    return false;
                }
                return true;
            });
        });
    </script> --}}
