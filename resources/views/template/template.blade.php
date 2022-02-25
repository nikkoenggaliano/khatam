<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Khataman - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/fontawesome.min.css"
        integrity="sha512-t5T3Rc5ovESH1DDzUmPb7WDF91QvYVzP26HdUqABGy26RIiRRp5S4ygqEWDQbWmUqgMdUISpaESbM/iopIWHIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"
        integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="">
    <style>
        @font-face {
            font-family: litelpmq;
            src: url(/fonts/litelpmq.woff2) format("woff2"),
                url(/fonts/litelpmq.woff) format("woff"),
                url(/fonts/litelpmq.ttf) format("truetype"),
                url(/fonts/litelpmq.eot) format("embedded-opentype");
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }

        .depan {
            height: 180px;
        }

        .depan .has-text-centered {
            display: block;
        }

        .arab {
            font-family: litelpmq;
            font-size: 30px;
        }

    </style>
</head>

<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <img src="https://www.kindpng.com/picc/m/207-2070301_twice-kpop-logo-transparent-hd-png-download.png"
                    width="112" height="28">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
                data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item">
                    Home
                </a>

                <a class="navbar-item">
                    Documentation
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        More
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            About
                        </a>
                        <a class="navbar-item">
                            Jobs
                        </a>
                        <a class="navbar-item">
                            Contact
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            Report an issue
                        </a>
                    </div>
                </div>
            </div>
            @if (Auth::check())
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a class="button is-danger" href="{{ route('logout') }}">
                                <strong>Log Out</strong>
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a class="button is-primary" href="{{ route('register-page') }}">
                                <strong>Sign up</strong>
                            </a>
                            <a class="button is-light" href="{{ route('login-page') }}">
                                Log in
                            </a>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </nav>
    @section('content')
    @show
    {{-- <footer class="footer">
        <div class="content has-text-centered">
            <i class="fa-brands fa-github"></i>
            <p>
                <strong>Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
                <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
                is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
            </p>
        </div>
    </footer> --}}



    <script>
        $(document).ready(function() {
            // Check for click events on the navbar burger icon
            $(".navbar-burger").click(function() {
                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                $(".navbar-burger").toggleClass("is-active");
                $(".navbar-menu").toggleClass("is-active");
            });

            $(".notification .delete").click(function() {
                $("#alert-notify").remove();
            });
        });
        // document.addEventListener('DOMContentLoaded', () => {
        //     (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
        //         const $notification = $delete.parentNode;
        //         $delete.addEventListener('click', () => {
        //             $notification.parentNode.removeChild($notification);
        //         });
        //     });
        // });
    </script>
    @yield('scripts')
</body>

</html>
