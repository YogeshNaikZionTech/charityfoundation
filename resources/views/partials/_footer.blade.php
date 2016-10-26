 <footer id="footer">
    <div class="container-fluid footerContainer">
        <div class="row">
            <div class="col-md-3 col-lg-3 col-xs-10 col-sm-3">
                <span class="copyright">Copyright &copy; AA Foundation 2016</span>
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>

            <div class="col-md-2 col-lg-2 col-xs-10 col-sm-3">
               
                <ol>
                    <li>
                        <a href="{{url('projects')}}">Projects</a>
                    </li>
                    <li>
                        <a href="{{url('events')}}">Events</a>
                    </li>
                </ol>
            </div>
             <div class="col-md-2 col-lg-2 col-xs-10 col-sm-3">
               
                <ol>
                    @if(! Auth::check())
                        <li>
                            <a href="{{url('/login')}}">Login</a>
                        </li>
                        <li>
                            <a href="{{url('/register')}}">Sign Up</a>
                        </li>
                    @endif
                    <li>
                        <a href="{{url('aboutus')}}">About Us</a>
                    </li>
                    <li>
                        <a href="{{url('contact')}}">Contact US</a>
                    </li>
                </ol>
            </div>
            <div class="col-md-2 col-lg-2 col-xs-10 col-sm-3">
               
                <p class="footerpara">
                    AA Foundation<br/>
                    2665 N First St,<br/>
                    San Jose, CA, 95134
                </p>
            </div>
            <div class="col-md-2 col-lg-2 col-xs-10 col-sm-3">
                <ul class="list-inline social-buttons">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</footer>
 @section('scripts')
     <script>
         $(document).ready(function() {

             $('footer').css('margin-top', $(document).height() - $('#content').height() - $('footer').height());
         });

     </script>
     @endsection