<template>
    <div class="destination-card-items">
        <div class="destination-image">
            <img :src="image" :alt="title" />
            <div class="rating-badge">
                <i class="fa-solid fa-star"></i>
                <span>{{ rating }}</span>
            </div>
        </div>
        <div class="destination-content">
            <ul class="meta">
                <li>
                    <i class="fa-thin fa-location-dot"></i>
                    {{ location }}
                </li>
                <li class="rating-text">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p style="color: #113d48">{{ rating }}</p>
                </li>
            </ul>
            <h5>
                {{ title }}
            </h5>
            <div class="price">
                <h6><span>mulai dari </span>IDR {{ formatPrice(price) }}</h6>
                <Link
                    :href="route('detail-wisata', { slug: slug })"
                    class="theme-btn style-2"
                    style="color: #113d48"
                >
                    Lihat Detail
                    <i class="fa-sharp fa-regular fa-arrow-right"></i>
                </Link>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    id: {
        type: Number,
        default: 0,
    },
    slug: {
        type: String,
        required: true,
    },
    image: {
        type: String,
        required: true,
    },
    location: {
        type: String,
        required: true,
    },
    rating: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    price: {
        type: String,
        required: true,
    },
});

// Format price with thousands separator
const formatPrice = (price) => {
    return new Intl.NumberFormat('id-ID').format(price);
};
</script>

<style scoped>
.destination-card-items {
    position: relative;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
}

.destination-card-items:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.destination-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.destination-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.destination-card-items:hover .destination-image img {
    transform: scale(1.05);
}

.rating-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: rgba(255, 255, 255, 0.9);
    padding: 5px 8px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    gap: 4px;
    font-size: 12px;
    font-weight: bold;
    color: #113d48;
}

.rating-badge i {
    color: #ffa500;
}

.destination-content {
    padding: 15px;
}

.meta {
    list-style: none;
    padding: 0;
    margin: 0 0 10px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.meta li {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 14px;
    color: #666;
}

.meta li i {
    color: #5ce1e6;
}

.rating-text {
    display: flex;
    align-items: center;
    gap: 5px;
}

.star i {
    color: #ffa500;
}

.rating-text p {
    margin: 0;
    font-weight: bold;
}

.destination-content h5 {
    margin: 10px 0 15px 0;
    color: #113d48;
    font-size: 18px;
    font-weight: bold;
    line-height: 1.3;
}

.price {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 15px;
}

.price h6 {
    margin: 0;
    color: #113d48;
    font-weight: bold;
}

.price h6 span {
    color: #666;
    font-weight: normal;
    font-size: 12px;
}

.theme-btn {
    background: #5ce1e6;
    color: #113d48 !important;
    padding: 8px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
    font-weight: bold;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.theme-btn:hover {
    background: #4bc5ca;
    transform: translateX(3px);
}

.theme-btn i {
    margin-left: 5px;
    transition: transform 0.3s ease;
}

.theme-btn:hover i {
    transform: translateX(3px);
}

@media (max-width: 768px) {
    .destination-image {
        height: 150px;
    }

    .destination-content {
        padding: 12px;
    }

    .price {
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
    }

    .theme-btn {
        width: 100%;
        text-align: center;
    }
}
</style>
