<template>
    <!-- News-details-Section Start -->
    <section class="news-details fix section-padding">
        <div class="container">
            <div class="news-details-area">
                <div class="row g-5">
                    <div class="blog-post-details">
                        <div class="single-blog-post" v-if="newsItem">
                            <div
                                class="post-featured-thumb bg-cover"
                                :style="{
                                    backgroundImage: `url('${newsItem.featuredImage}')`,
                                }"
                            >
                                <div class="post">
                                    <h3>
                                        {{ newsItem.date.split(' ')[0] }}
                                        <span>{{
                                            newsItem.date.split(' ')[1]
                                        }}</span>
                                    </h3>
                                </div>
                            </div>

                            <div class="post-content">
                                <ul class="post-list d-flex align-items-center">
                                    <li>
                                        <i class="fa-regular fa-user"></i>
                                        By {{ newsItem.author }}
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-comment"></i>
                                        {{ newsItem.comments }} Comments
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-tag"></i>
                                        {{ newsItem.category }}
                                    </li>
                                </ul>
                                <h3>{{ newsItem.title }}</h3>
                                <div v-html="newsItem.content"></div>
                            </div>
                        </div>

                        <!-- Loading state -->
                        <div v-else class="py-5 text-center">
                            <h3>Loading...</h3>
                        </div>

                        <!-- Tags and Share Section -->
                        <div
                            class="row tag-share-wrap mb-5 mt-4"
                            v-if="newsItem"
                        >
                            <div class="col-lg-8 col-12">
                                <div class="tagcloud">
                                    <a
                                        v-for="tag in newsItem.tags"
                                        :key="tag"
                                        href="#"
                                        @click.prevent
                                    >
                                        {{ tag }}
                                    </a>
                                </div>
                            </div>
                            <div
                                class="col-lg-4 col-12 mt-lg-0 text-lg-end mt-3"
                            >
                                <div class="social-share">
                                    <span class="me-3">Share:</span>
                                    <a href="#" @click.prevent="shareOnFacebook"
                                        ><i class="fab fa-facebook-f"></i
                                    ></a>
                                    <a href="#" @click.prevent="shareOnTwitter"
                                        ><i class="fab fa-twitter"></i
                                    ></a>
                                    <a href="#" @click.prevent="shareOnLinkedIn"
                                        ><i class="fab fa-linkedin-in"></i
                                    ></a>
                                    <a href="#" @click.prevent="copyLink"
                                        ><i class="fa-regular fa-link"></i
                                    ></a>
                                </div>
                            </div>
                        </div>

                        <!-- Comments Section -->
                        <div class="comments-area" v-if="newsItem">
                            <div class="comments-heading">
                                <h3>
                                    {{
                                        newsItem.comments
                                            .toString()
                                            .padStart(2, '0')
                                    }}
                                    Comments
                                </h3>
                            </div>
                            <div
                                class="blog-single-comment d-flex gap-4 pb-4 pt-4"
                            >
                                <div class="image">
                                    <img
                                        src="assets/img/news/comment.png"
                                        alt="image"
                                    />
                                </div>
                                <div class="content">
                                    <div
                                        class="head d-flex align-items-center justify-content-between flex-wrap gap-2"
                                    >
                                        <div class="con">
                                            <h5>
                                                <a href="#" @click.prevent
                                                    >Leslie Alexander</a
                                                >
                                            </h5>
                                            <span
                                                >February 10, 2024 at 2:37
                                                pm</span
                                            >
                                        </div>
                                        <a href="#" @click.prevent class="reply"
                                            >Reply</a
                                        >
                                    </div>
                                    <p class="mt-30 mb-4">
                                        Neque porro est qui dolorem ipsum quia
                                        quaed inventor veritatis et quasi
                                        architecto var sed efficitur turpis
                                        gilla sed sit amet finibus eros. Lorem
                                        Ipsum is simply dummy
                                    </p>
                                </div>
                            </div>
                            <div
                                class="blog-single-comment d-flex gap-4 pb-4 pt-5"
                            >
                                <div class="image">
                                    <img
                                        src="assets/img/news/comment-2.png"
                                        alt="image"
                                    />
                                </div>
                                <div class="content">
                                    <div
                                        class="head d-flex align-items-center justify-content-between flex-wrap gap-2"
                                    >
                                        <div class="con">
                                            <h5>
                                                <a href="#" @click.prevent
                                                    >Ralph Edwards</a
                                                >
                                            </h5>
                                            <span
                                                >February 10, 2024 at 2:37
                                                pm</span
                                            >
                                        </div>
                                        <a href="#" @click.prevent class="reply"
                                            >Reply</a
                                        >
                                    </div>
                                    <p class="mt-30 mb-4">
                                        Neque porro est qui dolorem ipsum quia
                                        quaed inventor veritatis et quasi
                                        architecto var sed efficitur turpis
                                        gilla sed sit amet finibus eros. Lorem
                                        Ipsum is simply dummy
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Comment Form -->
                        <div class="comment-form-wrap pt-5" v-if="newsItem">
                            <h3>Leave a comments</h3>
                            <form
                                @submit.prevent="submitComment"
                                id="contact-form"
                            >
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <span>Your Name*</span>
                                            <input
                                                type="text"
                                                v-model="commentForm.name"
                                                id="name"
                                                placeholder="Your Name"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <span>Your Email*</span>
                                            <input
                                                type="email"
                                                v-model="commentForm.email"
                                                id="email6"
                                                placeholder="Your Email"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-clt">
                                            <span>Message*</span>
                                            <textarea
                                                v-model="commentForm.message"
                                                id="message"
                                                placeholder="Write Message"
                                                required
                                            ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <button
                                            type="submit"
                                            class="theme-btn"
                                            :disabled="isSubmitting"
                                        >
                                            {{
                                                isSubmitting
                                                    ? 'Posting...'
                                                    : 'post comment'
                                            }}
                                            <i
                                                class="fa-solid fa-arrow-right-long"
                                            ></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Related News Section -->
                        <div
                            class="related-news mt-5"
                            v-if="relatedNews.length > 0"
                        >
                            <h3 class="mb-4">Related Articles</h3>
                            <div class="row g-4">
                                <div
                                    v-for="related in relatedNews"
                                    :key="related.id"
                                    class="col-lg-4 col-md-6"
                                >
                                    <div class="news-card-items-3 mt-0">
                                        <div class="news-image">
                                            <img
                                                :src="related.image"
                                                :alt="related.title"
                                            />
                                        </div>
                                        <div class="news-content">
                                            <ul class="post-meta">
                                                <li class="post">
                                                    {{ related.date }}
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa-regular fa-user"
                                                    ></i>
                                                    By {{ related.author }}
                                                </li>
                                                <li>
                                                    <i
                                                        class="fa-regular fa-tag"
                                                    ></i>
                                                    {{ related.category }}
                                                </li>
                                            </ul>
                                            <h4>
                                                <Link
                                                    :href="
                                                        route('detail-update', {
                                                            id: related.id,
                                                        })
                                                    "
                                                >
                                                    {{ related.title }}
                                                </Link>
                                            </h4>
                                            <Link
                                                :href="
                                                    route('detail-update', {
                                                        id: related.id,
                                                    })
                                                "
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import { getNewsById, getRelatedNews } from '../../data/news.js';

export default {
    components: {
        Link,
    },

    props: {
        newsId: {
            type: [String, Number],
            required: true,
        },
    },

    data() {
        return {
            newsItem: null,
            relatedNews: [],
            commentForm: {
                name: '',
                email: '',
                message: '',
            },
            isSubmitting: false,
        };
    },

    mounted() {
        this.loadNews();
    },

    watch: {
        newsId() {
            this.loadNews();
        },
    },

    methods: {
        loadNews() {
            // Get news item by ID
            this.newsItem = getNewsById(this.newsId);

            // Get related news
            if (this.newsItem) {
                this.relatedNews = getRelatedNews(
                    this.newsId,
                    this.newsItem.category,
                    3,
                );
            }
        },

        submitComment() {
            this.isSubmitting = true;

            // Simulate form submission
            setTimeout(() => {
                alert('Comment submitted successfully!');
                this.commentForm = {
                    name: '',
                    email: '',
                    message: '',
                };
                this.isSubmitting = false;
            }, 1000);
        },

        shareOnFacebook() {
            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent(this.newsItem.title);
            window.open(
                `https://www.facebook.com/sharer/sharer.php?u=${url}&t=${title}`,
                '_blank',
            );
        },

        shareOnTwitter() {
            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent(this.newsItem.title);
            window.open(
                `https://twitter.com/intent/tweet?url=${url}&text=${title}`,
                '_blank',
            );
        },

        shareOnLinkedIn() {
            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent(this.newsItem.title);
            window.open(
                `https://www.linkedin.com/sharing/share-offsite/?url=${url}&title=${title}`,
                '_blank',
            );
        },

        copyLink() {
            navigator.clipboard
                .writeText(window.location.href)
                .then(() => {
                    alert('Link copied to clipboard!');
                })
                .catch(() => {
                    alert('Failed to copy link');
                });
        },
    },
};
</script>

<style scoped>
.related-news .news-card-items-3 {
    border: 1px solid #eee;
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.related-news .news-card-items-3:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.theme-btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.tagcloud a {
    display: inline-block;
    padding: 5px 15px;
    margin: 5px 5px 5px 0;
    background-color: #f8f9fa;
    color: #666;
    text-decoration: none;
    border-radius: 20px;
    font-size: 14px;
    transition: all 0.3s ease;
}

.tagcloud a:hover {
    background-color: #63ab45;
    color: white;
}

.social-share a {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    margin: 0 5px;
    background-color: #f8f9fa;
    color: #666;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.social-share a:hover {
    background-color: #63ab45;
    color: white;
    transform: translateY(-2px);
}
</style>
