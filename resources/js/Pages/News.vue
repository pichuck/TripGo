<template>
    <MainLayout @open-login-modal="showLoginModal = true">
        <section class="breadcrumb-wrapper fix bg-cover">
            <div
                class="container"
                :style="{
                    backgroundImage: 'url(/assets/img/Article-bnr.jpg)',
                    backgroundSize: 'cover',
                    backgroundPosition: 'center',
                    backgroundRepeat: 'no-repeat',
                }"
            >
                <div class="row">
                    <div class="page-heading">
                        <h2>Berita & Update</h2>
                        <ul class="breadcrumb-list">
                            <li>
                                <Link href="/">Home</Link>
                            </li>
                            <li><i class="fa-solid fa-chevrons-right"></i></li>
                            <li>Berita & Update</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <UpdateCard />
    </MainLayout>
</template>

<script>
import MainLayout from '../Layouts/MainLayout.vue';
import UpdateCard from '../Components/UpdateCard.vue';
import { Link } from '@inertiajs/vue3'; // Tambahkan import Link

export default {
    // Tambahkan options API
    components: {
        MainLayout,
        UpdateCard,
        Link,
    },

    data() {
        return {
            showLoginModal: false,
        };
    },
};
</script>
