<template>
    <!-- Header Section Start -->
    <header class="header-section-10">
        <div id="header-sticky" class="header-11">
            <div class="container-fluid">
                <div class="mega-menu-wrapper">
                    <div class="header-main">
                        <div class="logo">
                            <a href="index.html" class="header-logo">
                                <img
                                    src="assets/img/Logo_TripGo.svg"
                                    alt="logo-img"
                                    style="height: 100px; width: 100px"
                                />
                            </a>
                        </div>
                        <div
                            class="header-right d-flex justify-content-end align-items-center"
                        >
                            <div class="mean__menu-wrapper">
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <ul>
                                            <li
                                                class="has-dropdown active menu-thumb"
                                            >
                                                <a href="index.html"> Home </a>
                                            </li>
                                            <li
                                                class="has-dropdown active d-xl-none"
                                            >
                                                <a
                                                    href="team.html"
                                                    class="border-none"
                                                >
                                                    Home
                                                </a>
                                                <ul class="submenu">
                                                    <li>
                                                        <a href="index.html"
                                                            >Home 01</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="index-2.html"
                                                            >Home 02</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="index-3.html"
                                                            >Home 03</a
                                                        >
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="about.html"
                                                    >About Us</a
                                                >
                                            </li>
                                            <li>
                                                <a
                                                    href="destination-details.html"
                                                >
                                                    Destinations
                                                    <i
                                                        class="fa-solid fa-chevron-down"
                                                    ></i>
                                                </a>
                                                <ul class="submenu">
                                                    <li>
                                                        <a
                                                            href="destination.html"
                                                            >our Destination</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="destination-details.html"
                                                            >Destination
                                                            Details</a
                                                        >
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="tour-details.html">
                                                    Tour
                                                    <i
                                                        class="fa-solid fa-chevron-down"
                                                    ></i>
                                                </a>
                                                <ul class="submenu">
                                                    <li>
                                                        <a href="tour.html"
                                                            >Our Tour</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="tour-details.html"
                                                            >Tour Details</a
                                                        >
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="has-dropdown">
                                                <a href="news.html">
                                                    Pages
                                                    <i
                                                        class="fa-solid fa-chevron-down"
                                                    ></i>
                                                </a>
                                                <ul class="submenu">
                                                    <li>
                                                        <a
                                                            href="activities.html"
                                                            >Activities</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="activities-details.html"
                                                            >Activities
                                                            Details</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="team.html"
                                                            >Our Team</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="team-details.html"
                                                            >Team Details</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="faq.html"
                                                            >Our Faq</a
                                                        >
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="news-details.html">
                                                    Blog
                                                    <i
                                                        class="fa-solid fa-chevron-down"
                                                    ></i>
                                                </a>
                                                <ul class="submenu">
                                                    <li>
                                                        <a href="news.html"
                                                            >Blog Grid</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="news-classic.html"
                                                            >Blog Classic</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="news-details.html"
                                                            >Blog Details</a
                                                        >
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="contact.html"
                                                    >Contact Us</a
                                                >
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <a href="#0" class="search-trigger search-icon"
                                ><i class="fa-regular fa-magnifying-glass"></i
                            ></a>
                            <a href="contact.html" class="theme-btn">
                                Login
                                <i
                                    class="fa-sharp fa-regular fa-arrow-right"
                                ></i
                            ></a>
                            <div class="header__hamburger d-xl-none my-auto">
                                <div class="sidebar__toggle">
                                    <i class="fas fa-bars"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: 'Navbar',
};
</script>

<style scoped>
nav {
    background-color: #333;
    padding: 10px;
}
ul {
    list-style: none;
    display: flex;
}
li {
    margin-right: 20px;
}
</style>
