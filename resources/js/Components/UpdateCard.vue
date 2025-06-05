<template>
    <!-- News-Section Start -->
    <section class="news-section section-padding fix">
        <div class="container">
            <div class="row g-4">
                <div
                    v-for="(news, index) in paginatedNews"
                    :key="news.id"
                    class="col-xl-4 col-md-6 col-lg-6 wow fadeInUp"
                    :data-wow-delay="`.${3 + (index % 3) * 2}s`"
                >
                    <div class="news-card-items-3 mt-0">
                        <div class="news-image">
                            <img :src="news.image" :alt="news.title" />
                        </div>
                        <div class="news-content">
                            <ul class="post-meta">
                                <li class="post">{{ news.date }}</li>
                                <li>
                                    <i class="fa-regular fa-user"></i>
                                    By {{ news.author }}
                                </li>
                                <li>
                                    <i class="fa-regular fa-tag"></i>
                                    {{ news.category }}
                                </li>
                            </ul>
                            <h4>
                                <Link
                                    :href="
                                        route('detail-update', { id: news.id })
                                    "
                                >
                                    {{ news.title }}
                                </Link>
                            </h4>
                            <Link
                                :href="route('detail-update', { id: news.id })"
                                class="link-btn"
                            >
                                Read More
                                <i
                                    class="fa-sharp fa-regular fa-arrow-right"
                                ></i>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="page-nav-wrap text-center" v-if="totalPages > 1">
                <ul>
                    <li>
                        <a
                            class="page-numbers"
                            href="#"
                            @click.prevent="changePage(currentPage - 1)"
                            :class="{ disabled: currentPage === 1 }"
                        >
                            <i class="fal fa-long-arrow-left"></i>
                        </a>
                    </li>
                    <li v-for="page in visiblePages" :key="page">
                        <a
                            class="page-numbers"
                            href="#"
                            @click.prevent="changePage(page)"
                            :class="{ active: currentPage === page }"
                        >
                            {{ page.toString().padStart(2, '0') }}
                        </a>
                    </li>
                    <li>
                        <a
                            class="page-numbers"
                            href="#"
                            @click.prevent="changePage(currentPage + 1)"
                            :class="{ disabled: currentPage === totalPages }"
                        >
                            <i class="fal fa-long-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import { newsData } from '../../data/news.js';

export default {
    components: {
        Link,
    },

    data() {
        return {
            newsData: newsData,
            currentPage: 1,
            itemsPerPage: 6,
        };
    },

    computed: {
        totalPages() {
            return Math.ceil(this.newsData.length / this.itemsPerPage);
        },

        paginatedNews() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return this.newsData.slice(start, end);
        },

        visiblePages() {
            const pages = [];
            const maxVisible = 3;
            let start = Math.max(
                1,
                this.currentPage - Math.floor(maxVisible / 2),
            );
            let end = Math.min(this.totalPages, start + maxVisible - 1);

            // Adjust start if we're near the end
            if (end - start + 1 < maxVisible) {
                start = Math.max(1, end - maxVisible + 1);
            }

            for (let i = start; i <= end; i++) {
                pages.push(i);
            }

            return pages;
        },
    },

    methods: {
        changePage(page) {
            if (page >= 1 && page <= this.totalPages) {
                this.currentPage = page;
                // Scroll to top of news section
                this.$nextTick(() => {
                    const newsSection = this.$el.querySelector('.news-section');
                    if (newsSection) {
                        newsSection.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            }
        },
    },
};
</script>

<style scoped>
.page-numbers.active {
    background-color: #63ab45;
    color: white;
}

.page-numbers.disabled {
    opacity: 0.5;
    pointer-events: none;
}

.page-numbers:hover:not(.disabled):not(.active) {
    background-color: #f8f9fa;
}
</style>
