<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Homepage 1</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap"/>
    <link rel="stylesheet" href="/../../../kit-pro.fontawesome.com/releases/v5.13.0/css/pro.min.css"/>
    <link rel="shortcut icon" type="image/png" href="/assets/images/fav.png"/>

     <!-- Bootstrap Css -->
     <link href="/assets/css/bootstrap.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" href="/assets/css/sweet-alert.css">
    <link rel="stylesheet" href="/assets/css/styles.min.css">
  </head>
  <body>
    <div id="load">
      <div class="load__content">
        <div class="load__icon"><img src="/assets/images/icons/load.gif" alt="Loading icon"/></div>
      </div>
    </div>
    <header class="theme-default">
      <div id="search-box">
        <div class="container">
          <form action="https://avitex.vn/" method="POST">
            <input type="text" placeholder="Searching for news" name="search"/>
            <button><i class="fas fa-arrow-right"></i></button>
          </form>
        </div>
      </div>
      <div class="container">
        <div class="header-wrapper"><a class="header__logo" href="{{route('welcome')}}"><img src="/assets/images/logo.png" alt="Logo"/></a>
          <nav>
            <ul>
              <li class="nav-item text-danger"><a href="{{route('welcome')}}">Home</a>

              </li>
              <li class="nav-item"><a href="{{route('tasks')}}">Tasks</a>
              </li>
              <li class="nav-item"><a href="{{route('add-task')}}">Create Task</a></li>
              {{-- <li class="nav-item"><a href="contact.html">Contact</a></li> --}}
            </ul>
          </nav>
          <div class="header__icon-group"><a href="#" id="search"><i class="fas fa-search"></i></a>
            <div class="social"><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-instagram"></i></a><a href="#"><i class="fab fa-dribbble"></i></a><a id="mobile-menu-controller" href="#"><i class="fas fa-bars"></i></a></div>
          </div>
        </div>
      </div>
    </header>
   {{$slot}}
    <footer>
      <div class="container">
        <div class="footer-content">
          <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
              <div class="footer-col -about">
                <div class="center-line-title">
                  <h5>About us</h5>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida lacus vel facilisis. </p>
                <div class="contact-method">
                  <p> <i class="fas fa-map-marker-alt"></i>5 South Main Street Los Angeles, ZZ-96110 USA</p>
                  <p> <i class="far fa-mobile-android"></i>125-711-811   |   125-668-886</p>
                  <p> <i class="fas fa-headphones-alt"></i>Support.hosting@gmail.com</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
              <div class="footer-col -feature-post">
                <div class="center-line-title">
                  <h5>Feature Tasks</h5>
                </div>
                <div class="feature-post-block">
                    @foreach ($tasks as $t)
                    <div class="post-card -tiny"><a class="card__cover" href="{{route('task', $t->id)}}"><img src="/assets/images/posts/2.png" alt="How to name, save and export a finish template"/></a>
                        <div class="card__content">
                         <a class="card__content-title" href="{{route('task', $t->id)}}">{{$t->title}}</a>
                          <div class="card__content-info">
                            <div class="info__time"><i class="far fa-clock"></i>
                              <p>Clock  {{$t->created_at->format('D m Y')}}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach



                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="copyright">
          <p>© 2024, GuteNews - Task Checkmate. All rights reserved.</p>
        </div>
      </div>
    </footer>
    <script src="/assets/js/main.min.js"></script>
    <script src="/assets/js/sweet-alert.js"></script>
    <script src="{{mix('/js/app.js')}}"></script>

    @if (session()->has('success'))
    <script>
        swal.fire({
            title: "Good job!",
            text: "{{ session()->get('success') }}",
            icon: "success",
            button: "Aww yess!",
            backdrop: `
            rgba(0,0,123,0.4)
            `,
        });
    </script>
@endif

@if (session()->has('error'))
    <script>
        swal.fire({
            title: "Ooops!",
            text: "{{ session()->get('error') }}",
            icon: "error",
            button: "OK",
            backdrop: `
            rgba(0,0,123,0.4)

            `,
        });
    </script>
@endif
  </body>

</html>
