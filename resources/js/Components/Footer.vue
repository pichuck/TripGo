<template>
    <footer class="footer">
        <div class="footer-content">
            <!-- Logo -->
            <div class="footer-logo">
                <img src="/images/logo.png" alt="TripGo Logo" class="logo" />
            </div>

            <!-- Copyright Info -->
            <div class="footer-info">
                <p>© 2025 TripGo LLC All rights reserved</p>
                <p>
                    <a href="/terms-of-use">Terms of Use</a> |
                    <a href="/privacy-policy">Privacy Policy</a> |
                    <a href="/site-map">Site Map</a> |
                    <a href="/how-the-site-works">How the Site Works</a>
                </p>
            </div>

            <!-- Explore Links -->
            <div class="footer-explore">
                <p>EXPLORE</p>
                <p>
                    <a href="/about-us">About Us</a> |
                    <a href="/help-center">Help Center</a>
                </p>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: "Footer",
};
</script>

<style scoped>
.footer {
    background-color: #f8f8f8;
    padding: 20px;
    font-family: Arial, sans-serif;
    color: #333;
    border-top: 1px solid #ccc;
}

.footer-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.footer-logo img {
    width: 120px;
    height: auto;
}

.footer-info,
.footer-explore {
    text-align: left;
}

.footer-info p,
.footer-explore p {
    margin: 5px 0;
}

.footer-info a,
.footer-explore a {
    text-decoration: none;
    color: #007bff;
}

.footer-info a:hover,
.footer-explore a:hover {
    text-decoration: underline;
}
</style>
