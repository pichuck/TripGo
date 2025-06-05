<template>
    <MainLayout @open-login-modal="showLoginModal = true">
        <!-- Breadcrumb Section -->
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
                        <h2>
                            {{ newsItem ? newsItem.title : 'Detail Berita' }}
                        </h2>
                        <ul class="breadcrumb-list">
                            <li>
                                <Link href="/">Home</Link>
                            </li>
                            <li><i class="fa-solid fa-chevrons-right"></i></li>
                            <li>
                                <Link href="/berita">Berita & Update</Link>
                            </li>
                            <li><i class="fa-solid fa-chevrons-right"></i></li>
                            <li>Detail</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <main>
            <UpdateDetailCard :newsId="newsId" />
        </main>
    </MainLayout>
</template>

<script setup>
import { computed, onMounted, ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import MainLayout from '../Layouts/MainLayout.vue';
import UpdateDetailCard from '@/Components/UpdateDetailCard.vue';
import { Link } from '@inertiajs/vue3';
import { getNewsById } from '../../data/news.js';

// Get the news ID from the route parameters
const page = usePage();
const newsId = computed(
    () => page.props.ziggy?.params?.id || page.url.split('/').pop(),
);

// Get news item for breadcrumb title
const newsItem = ref(null);

onMounted(() => {
    newsItem.value = getNewsById(newsId.value);
});

// For the modal
const showLoginModal = ref(false);
</script>

<style scoped>
.breadcrumb-wrapper {
    background-color: rgba(0, 0, 0, 0.7);
    background-blend-mode: multiply;
    padding: 100px 0;
}

.page-heading h2 {
    color: white;
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 20px;
}

.breadcrumb-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.breadcrumb-list li {
    color: white;
}

.breadcrumb-list li a {
    color: white;
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb-list li a:hover {
    color: #63ab45;
}

.breadcrumb-list li i {
    font-size: 12px;
    opacity: 0.7;
}
</style>
