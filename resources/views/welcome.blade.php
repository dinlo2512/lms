<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Responsive Animated Online Education Website Design Tutorial</title>
    <link rel="stylesheet" type="text/css" href="{{URL('front-end/css/normalize.css')}}">
    <link rel="stylesheet" href="{{URL('front-end/css/fontawesome-5.web/css/all.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{URL('front-end/css/style.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<!--header section starts -->
<div id="header">

    <a href="#" class="logo"><img src="{{URL('front-end/images/logo.png')}}" alt=""></a>

    <nav>
        <ul>
            <li><a href="#home">home</a></li>
            <li><a href="#course">courses</a></li>
            <li><a href="#service">services</a></li>
            <li><a href="#testimonial">testimonials</a></li>
            <li><a href="#contact">contact</a></li>
            <li><a href="{{URL('/login')}}">login</a></li>
        </ul>
    </nav>

    <div class="fas fa-bars"></div>

</div>
<!--header section ends-->

<!-- home section starts  -->

<section id="home" class="container-fluid">

    <div class="row align-items-center min-vh-100 content">

        <div class="col-md-8 ml-md-5 text-center text-md-left">

            <h2>Lorem</h2>
            <h1>Ipsum </h1>
            <h3>learn online from home</h3>

            <a href="#course">
                <button> enroll now >></button>
            </a>

            <div class="icons">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-google-plus-g"></a>
            </div>

        </div>

    </div>


</section>

<!-- home section ends -->
<!-- course section starts  -->

<section id="course">

    <h1 class="heading">our latest courses</h1>

    <div class="box-container">

        <div class="box" data-aos="flip-right">
            <i class=" fab fa-html5"></i>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla dolor fuga soluta quo quos delectus
                praesentium aliquam officia? Repellendus, natus.</p>
        </div>

        <div class="box" data-aos="flip-down">
            <i class=" fab fa-css3-alt"></i>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla dolor fuga soluta quo quos delectus
                praesentium aliquam officia? Repellendus, natus.</p>
        </div>

        <div class="box" data-aos="flip-left">
            <i class="fab fa-php"></i>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla dolor fuga soluta quo quos delectus
                praesentium aliquam officia? Repellendus, natus.</p>
        </div>

        <div class="box" data-aos="flip-right">
            <i class="fab fa-js"></i>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla dolor fuga soluta quo quos delectus
                praesentium aliquam officia? Repellendus, natus.</p>
        </div>

        <div class="box" data-aos="flip-up">
            <i class="fab fa-laravel"></i>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla dolor fuga soluta quo quos delectus
                praesentium aliquam officia? Repellendus, natus.</p>
        </div>

        <div class="box" data-aos="flip-right">
            <i class="fab fa-react"></i>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla dolor fuga soluta quo quos delectus
                praesentium aliquam officia? Repellendus, natus.</p>
        </div>


    </div>

</section>

<!-- course section ends -->
<!-- service section starts  -->

<section id="service">

    <h1 class="heading">what we offer?</h1>

    <div class="box-container">

        <div class="box" data-aos="flip-up">
            <i class="fas fa-chalkboard-teacher"></i>
            <div class="info">
                <h2>skilled teachers</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus ad officia quas pariatur error
                    nesciunt consectetur voluptatem minima fugit quo!</p>
            </div>
        </div>

        <div class="box" data-aos="flip-down">
            <i class="fas fa-headset"></i>
            <div class="info">
                <h2>24x7 hours service</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus ad officia quas pariatur error
                    nesciunt consectetur voluptatem minima fugit quo!</p>
            </div>
        </div>

        <div class="box" data-aos="flip-up">
            <i class="far fa-id-card"></i>
            <div class="info">
                <h2>certificate distribution</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus ad officia quas pariatur error
                    nesciunt consectetur voluptatem minima fugit quo!</p>
            </div>
        </div>

    </div>

</section>

<!-- service section ends -->
<!-- testimonials section starts  -->

<section id="testimonial">

    <h1 class="heading">what our students says</h1>

    <div class="box-container">

        <div class="box" data-aos="flip-left">
            <img class="user-img" src="{{URL('front-end/images/user.jfif')}}" alt="">
            <div class="info">
                <p><i class="fas fa-quote-left"></i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam
                    quae minima pariatur consequatur odio veniam nam dolorum enim eum a?<i
                        class="fas fa-quote-right"></i></p>
                <h2>--someone's name</h2>
            </div>
        </div>

        <div class="box" data-aos="flip-right">
            <img class="user-img" src="{{URL('front-end/images/user.jfif')}}" alt="">
            <div class="info">
                <p><i class="fas fa-quote-left"></i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam
                    quae minima pariatur consequatur odio veniam nam dolorum enim eum a?<i
                        class="fas fa-quote-right"></i></p>
                <h2>--someone's name</h2>
            </div>
        </div>

        <div class="box" data-aos="flip-left">
            <img class="user-img" src="{{URL('front-end/images/user.jfif')}}" alt="">
            <div class="info">
                <p><i class="fas fa-quote-left"></i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam
                    quae minima pariatur consequatur odio veniam nam dolorum enim eum a?<i
                        class="fas fa-quote-right"></i></p>
                <h2>--someone's name</h2>
            </div>
        </div>

        <div class="box" data-aos="flip-right">
            <img class="user-img" src="{{URL('front-end/images/user.jfif')}}" alt="">
            <div class="info">
                <p><i class="fas fa-quote-left"></i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam
                    quae minima pariatur consequatur odio veniam nam dolorum enim eum a?<i
                        class="fas fa-quote-right"></i></p>
                <h2>--someone's name</h2>
            </div>
        </div>

    </div>

</section>

<!-- testimonials section ends -->
<!-- contact section starts  -->

<section id="contact" class="container-fluid">

    <h1 class="heading">get in touch</h1>

    <div class="row min-vh-75 align-items-center min-vw-100">

        <div class="col-lg-5 col-md-8  mx-auto">

            <form action="" data-aos="zoom-in">

                <div class="inputBox">
                    <input type="text" placeholder=" " required>
                    <h3>full name</h3>
                </div>

                <div class="inputBox">
                    <input type="text" placeholder=" " required>
                    <h3>e-mail</h3>
                </div>

                <div class="inputBox">
                    <input type="text" placeholder=" " required>
                    <h3>phone</h3>
                </div>

                <div class="inputBox">
                    <textarea name="" id="" cols="30" rows="10" placeholder=" " required></textarea>
                    <h3>message</h3>
                </div>

                <div class="inputBox">
                    <input type="submit" value="Send">
                </div>

            </form>

        </div>

    </div>

</section>

<!-- contact section ends -->
<!-- footer section starts  -->

<section id="footer">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="logo-footer col-md-4">
                    <img src="{{URL('front-end/images/logo2.png')}}" alt="">
                </div>
                <div class="contact-us col-md-4">
                    <h3>contact us</h3>
                    <p><i class="fas fa-phone-square-alt"></i> Phone: +999999999</p>
                    <p><i class="fas fa-envelope"></i> Email:aaaa@gmail.com</p>
                </div>
                <div class="icon col-md-4">
                    <h3>get social</h3>
                    <img src="{{URL('front-end/images/facebook-logo.png')}}" alt="">
                    <img src="{{URL('front-end/images/ins-logo.png')}}" alt="">
                    <img src="{{URL('front-end/images/twitter-logo.png')}}" alt="">
                    <img src="{{URL('front-end/images/google-plus.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>

    <h1>&copy; copyright @ 2021 by <span>DINLO</span></h1>

</section>

<!-- footer section ends -->

<!--script starts-->
<script>
    $(document).ready(function () {

        $('.fa-bars').click(function () {
            $(this).toggleClass('fa-times');
            $('nav').toggleClass('nav-toggle');
        })
        $(window).on('load scroll', function () {
            if ($(window).scrollTop() > 20) {
                $('#header').css('top', '0');
                $('.fa-bars').removeClass('fa-times');
                $('nav').removeClass('nav-toggle');
            } else {
                $('#header').css('top', '-100%');
            }
        })
    });
</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<!--script ends-->
</body>
</html>
