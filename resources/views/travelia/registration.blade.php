<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/traveliaStyle.css">
  <link rel="stylesheet" href="/css/animate.css"> <!-- included in wow js -->
  <link rel="stylesheet" href="/css/all.min.css">
  <title>TRAVELIA!</title>
</head>

<body>

   <!-- header part starts -->

   <header class="header-part">
    <div class="items container-fluid bg-dark">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="">
          <img class="wow rotateIn" src="/images/travelia/logo.png" data-wow-duration="3s" data-wow-iteration="40"
            height="50" width="60" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto">
            <li class="nav-item active pr-4">
              <a class="" href="/travelia">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="dhover1 nav-item dropdown pr-4 pb-0">
              <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                destinations
              </a>
              <div class="dropdown-menu bg-dark dmenu1" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" class="chittagong"  href="/travelia/destinations/chittagong">CHITTAGONG</a>
                <a class="dropdown-item" id="sylhet" href="/travelia/destinations/sylhet">SYLHET</a>
                <a class="dropdown-item" class="rajshahi" href="/travelia/destinations/rajshahi">RAJSHAHI</a>
                <a class="dropdown-item" class="khulna" href="/travelia/destinations/khulna">KHULNA</a>
                <a class="dropdown-item" class="barishal" href="/travelia/destinations/barishal">BARISHAL</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" class="dhaka" href="/travelia/destinations//dhaka">DHAKA</a>
              </div>
            </li>

            <li class="nav-item pr-4">
              <a class="" href="howitworks.html">how it works <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item pr-4">
              <a class="" href="help.html">help <span class="sr-only">(current)</span></a>
            </li>


          </ul>
          <form class="form-inline my-2 my-lg-0">
            <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
            <!-- <button class="btn btn-outline-success my-2 my-sm-0 mr-4" type="submit">Sign in</button> -->
            <!-- <a href="#loginModal" role="button" class="btn btn-outline-success mr-4" data-toggle="modal">Login</a>
            <a href="#signupModal" role="button" class="btn btn-outline-success mr-4" data-toggle="modal">Sign up</a> -->
            <!-- <button class="btn btn-outline-success my-2 my-sm-0" data-target="#reg-form" type="submit">Sign up</button> -->
          </form>
        </div>
      </nav>
    </div>
  </header>

  <!-- header part ends -->


<!-- sign up part starts -->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-5 mb-5">

            <form id="reg_form" action="/travelia/registration-submit" method="post">
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="fullname" require id="full_name" class="form-control input-sm" placeholder="Full Name" value="{{old('fullname')}}">
                  <div class="alert-danger">{{$errors->first('fullname')}}</div>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="username" require id="user_name" class="form-control input-sm" placeholder="User Name" value="{{old('username')}}">
                  <div class="alert-danger">{{$errors->first('username')}}</div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <input type="email" name="email" id="email" require value="{{old('email')}}" class="form-control input-sm" placeholder="Email Address">
              <div class="alert-danger">{{$errors->first('email')}}</div>
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect1">User type</label>
              <select class="form-control user_type" require name="usertype" id="exampleFormControlSelect1">
                <option>Admin</option>
                <option>Writer</option>
                <option>Viewer</option>
              </select>
              <div class="alert-danger">{{$errors->first('usertype')}}</div>
            </div>

            <div class="form-group">
              <input type="text" name="address" value="{{old('address')}}" id="address" class="form-control input-sm" placeholder="Address">
              
            </div>

            <div class="form-group">
              <input type="number" name="phoneno" require value="{{old('phoneno')}}" id="phoneno" class="form-control input-sm" placeholder="Phone no">
              <div class="alert-danger">{{$errors->first('phoneno')}}</div>
            </div>

            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="password" name="password" require id="password" class="form-control input-sm" placeholder="Password">
                  <div class="alert-danger">{{$errors->first('password')}}</div>
                  @if(session('password_errors'))
                  <div class="alert-danger">{{session('password_errors')}}</div>
                  @endif
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="password" require name="password_confirmation" id="password_confirmation"
                    class="form-control input-sm" placeholder="Confirm Password">
                    <div class="alert-danger">{{$errors->first('password_confirmation')}}</div>
                </div>
              </div>
            </div>

            <input type="submit" value="Register" name="submit" class="btn btn-info btn-block submit">

          </form>

            </div>
            <div class="col-md-3"></div>
        </div>
          
     

  <!-- sign up part ends -->


  <!-- footer part starts -->
  <section class="footer-part">
    <div class="container">
      <div class="items text-center">
        <img src="/images/travelia/logo.png" alt="">
        <div class="info">
          <div class="row">
            <div class="col-md-7 text-white">
              <h4>More Info</h4>
              <h6>OUR AGREEMENT</h6>
              <br>
              <h6>BOOK NOW!</h6>
              <H4>Follow Us</H4>
              <div class="icons">
                <i class="fab fa-instagram"></i>
                <i class="fab fa-facebook"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-google-plus"></i>
              </div>
            </div>
            <div class="col-md-5 text-white">
              <h4>Have Any Question ?</h4>
              <h6>VISIT HELP CENTER</h6>
              <br>
              <h6>CONTACT US</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- footer part ends -->





  




  <script src="/js/jquery-3.4.1.min.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/wow.js"></script>
  <script src="/js/jquery.hover3d.js"></script>



</body>

</html>