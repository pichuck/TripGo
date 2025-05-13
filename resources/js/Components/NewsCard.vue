<template>
    <div class="news-card-items">
        <div v-if="type === 'image'" class="news-image">
            <img :src="image" alt="news" />
            <a v-if="withPopup" :href="image" class="icon img-popup2">
                <i class="fa-regular fa-plus"></i>
            </a>
        </div>

        <div
            v-if="type === 'content'"
            class="news-content"
            style="background-color: #caf6ff"
        >
            <ul class="post-meta">
                <li>
                    <i class="fa-regular fa-calendar-days"></i>
                    {{ date }}
                </li>
                <li>
                    <i class="fa-solid fa-tag"></i>
                    {{ tag }}
                </li>
            </ul>
            <h3>
                <a :href="link">{{ title }}</a>
            </h3>
            <a :href="link" class="link-btn" style="color: #113d48">
                Read More
                <i class="fa-sharp fa-regular fa-arrow-right"></i>
            </a>
        </div>
    </div>
</template>

<script setup>
defineProps({
    type: {
        type: String,
        default: 'image', // 'image' atau 'content'
        validator: (value) => ['image', 'content'].includes(value),
    },
    image: String,
    date: String,
    tag: String,
    title: String,
    link: {
        type: String,
        default: 'news-details.html',
    },
    withPopup: Boolean,
});
</script>
