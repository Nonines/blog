<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Admin</title>

        @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/admin.css'])
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">
                    Blog Admin
                </div>
                <div class="list-group list-group-flush">
                    <a
                        class="list-group-item list-group-item-action list-group-item-light p-3"
                        href="/admin/articles"
                        >Articles</a
                    >
                    <a
                        class="list-group-item list-group-item-action list-group-item-light p-3"
                        href="#!"
                        >Shortcuts</a
                    >
                    <a
                        class="list-group-item list-group-item-action list-group-item-light p-3"
                        href="#!"
                        >Overview</a
                    >
                    <a
                        class="list-group-item list-group-item-action list-group-item-light p-3"
                        href="#!"
                        >Events</a
                    >
                    <a
                        class="list-group-item list-group-item-action list-group-item-light p-3"
                        href="#!"
                        >Profile</a
                    >
                    <a
                        class="list-group-item list-group-item-action list-group-item-light p-3"
                        href="#!"
                        >Status</a
                    >
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav
                    class="navbar navbar-expand-lg navbar-light bg-light border-bottom"
                >
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">
                            Toggle Menu
                        </button>
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div
                            class="collapse navbar-collapse"
                            id="navbarSupportedContent"
                        >
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active">
                                    <a class="nav-link" href="/admin">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/">View blog</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a
                                        class="nav-link dropdown-toggle"
                                        id="navbarDropdown"
                                        href="#"
                                        role="button"
                                        data-bs-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        >More</a
                                    >
                                    <div
                                        class="dropdown-menu dropdown-menu-end"
                                        aria-labelledby="navbarDropdown"
                                    >
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        </a>
                                        <a class="dropdown-item" href="#!"
                                            >Another action</a
                                        >
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!"
                                            >Something else here</a
                                        >

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Core theme JS-->
        <script>
            window.addEventListener("DOMContentLoaded", (event) => {
                // Toggle the side navigation
                const sidebarToggle =
                    document.body.querySelector("#sidebarToggle");
                if (sidebarToggle) {
                    // Uncomment Below to persist sidebar toggle between refreshes
                    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
                    //     document.body.classList.toggle('sb-sidenav-toggled');
                    // }
                    sidebarToggle.addEventListener("click", (event) => {
                        event.preventDefault();
                        document.body.classList.toggle("sb-sidenav-toggled");
                        localStorage.setItem(
                            "sb|sidebar-toggle",
                            document.body.classList.contains(
                                "sb-sidenav-toggled"
                            )
                        );
                    });
                }
            });
        </script>
    </body>
</html>