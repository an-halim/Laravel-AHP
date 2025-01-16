<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center">

        <div class="logo mr-auto">
            <h1 class="text-light"><a href="/">SPK Rice Cooker</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="/home"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/#about">About</a></li>
                <li><a href="/#portfolio">Alternative</a></li>
                <li><a href="/#cta">AHP</a></li>
                @if (auth()->user())
                <li class="drop-down"><a href="">Hi, {{ auth()->user()->name }}</a>
                    <ul>
                        <li class="drop-down"><a href="#">Edit Profil</a>
                            <ul>
                                <li><a href="#">Edit Your Name</a></li>
                                <li><a href="/profil/reset" data-toggle="modal" data-target="#ModalPassword">Edit Your Password</a></li>
                            </ul>
                        </li>
                        <li><a href="/logout">Logout</a></li>
                    </ul>
                </li>
                @else
                <li><a href="/login">Login</a></li>
                @endif
            </ul>
        </nav><!-- .nav-menu -->
    </div>
</header><!-- End Header -->
