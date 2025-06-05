<template>
    <MainLayout>
        <!-- Hero Section -->
        <section class="relative overflow-hidden py-20">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div
                    class="absolute inset-0"
                    style="
                        background-image: url('data:image/svg+xml,<svg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;><g fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;><g fill=&quot;%23ffffff&quot; fill-opacity=&quot;0.1&quot;><circle cx=&quot;30&quot; cy=&quot;30&quot; r=&quot;2&quot;/></g></g></svg>');
                    "
                ></div>
            </div>
            <div class="container relative mx-auto px-4">
                <div class="text-center text-[#b3b3b3]">
                    <h1
                        class="wow fadeInUp mb-6 text-4xl font-bold md:text-5xl lg:text-6xl"
                    >
                        Tambahkan Destinasi
                        <span class="text-yellow-300"></span>
                    </h1>
                    <p
                        class="wow fadeInUp mx-auto mb-8 max-w-3xl text-xl opacity-90 md:text-2xl"
                        data-wow-delay=".2s"
                    >
                        Bantu ribuan traveler menemukan keajaiban tersembunyi di
                        Pulau Jawa
                    </p>
                    <div
                        class="wow fadeInUp flex justify-center space-x-8 text-sm md:text-base"
                        data-wow-delay=".4s"
                    >
                        <div class="flex items-center">
                            <div
                                class="mr-2 h-3 w-3 rounded-full bg-green-400"
                            ></div>
                            <span>Gratis Selamanya</span>
                        </div>
                        <div class="flex items-center">
                            <div
                                class="mr-2 h-3 w-3 rounded-full bg-yellow-400"
                            ></div>
                            <span>Verifikasi Cepat</span>
                        </div>
                        <div class="flex items-center">
                            <div
                                class="mr-2 h-3 w-3 rounded-full bg-blue-400"
                            ></div>
                            <span>Bantuan 24/7</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Form Section -->
        <section class="py-16">
            <div class="container mx-auto px-4">
                <div class="mx-auto max-w-4xl">
                    <!-- Progress Indicator -->
                    <div class="wow fadeInUp mb-12">
                        <div
                            class="mb-4 flex items-center justify-center space-x-4"
                        >
                            <div class="flex items-center">
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-600 font-semibold text-white"
                                >
                                    1
                                </div>
                                <span class="ml-2 font-medium text-blue-600"
                                    >Informasi Dasar</span
                                >
                            </div>
                            <div class="h-1 w-16 rounded bg-gray-300"></div>
                            <div class="flex items-center">
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-300 font-semibold text-gray-500"
                                >
                                    2
                                </div>
                                <span class="ml-2 text-gray-500"
                                    >Detail & Media</span
                                >
                            </div>
                            <div class="h-1 w-16 rounded bg-gray-300"></div>
                            <div class="flex items-center">
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-300 font-semibold text-gray-500"
                                >
                                    3
                                </div>
                                <span class="ml-2 text-gray-500"
                                    >Review & Publish</span
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Form Card -->
                    <div
                        class="wow fadeInUp rounded-2xl bg-white p-8 shadow-xl md:p-12"
                        data-wow-delay=".2s"
                    >
                        <form @submit.prevent="submitForm">
                            <!-- Step 1: Basic Information -->
                            <div v-show="currentStep === 1">
                                <div class="mb-8">
                                    <h2
                                        class="mb-2 text-3xl font-bold text-gray-800"
                                    >
                                        Informasi Dasar
                                    </h2>
                                    <p class="text-gray-600">
                                        Ceritakan tentang tempat wisata yang
                                        ingin kamu bagikan
                                    </p>
                                </div>
                                <div class="grid gap-6 md:grid-cols-2">
                                    <!-- Nama Tempat Wisata -->
                                    <div class="md:col-span-2">
                                        <label
                                            class="mb-3 block font-semibold text-gray-700"
                                        >
                                            Nama Tempat Wisata
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            v-model="form.name"
                                            type="text"
                                            placeholder="Contoh: Pantai Tanjung Lesung"
                                            class="w-full rounded-xl border-2 border-gray-200 px-4 py-4 text-gray-700 outline-none transition-all focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20"
                                            required
                                            style="color: black"
                                        />
                                    </div>
                                    <!-- Kategori -->
                                    <div>
                                        <label
                                            class="mb-3 block font-semibold text-gray-700"
                                        >
                                            Kategori
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <select
                                            v-model="form.category"
                                            class="w-full rounded-xl border-2 border-gray-200 px-4 py-4 text-gray-700 outline-none transition-all focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20"
                                            required
                                        >
                                            <option value="">
                                                Pilih Kategori
                                            </option>
                                            <option value="pantai">
                                                Wisata
                                            </option>
                                            <option value="gunung">
                                                Restoran
                                            </option>
                                            <option value="candi">
                                                Oleh Oleh
                                            </option>
                                            <option value="air-terjun">
                                                Penginapan
                                            </option>
                                        </select>
                                    </div>
                                    <!-- Provinsi -->
                                    <div>
                                        <label
                                            class="mb-3 block font-semibold text-gray-700"
                                        >
                                            Provinsi
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <select
                                            v-model="form.province"
                                            class="w-full rounded-xl border-2 border-gray-200 px-4 py-4 text-gray-700 outline-none transition-all focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20"
                                            required
                                        >
                                            <option value="">
                                                Pilih Provinsi
                                            </option>
                                            <option value="banten">
                                                Banten
                                            </option>
                                            <option value="jakarta">
                                                DKI Jakarta
                                            </option>
                                            <option value="jawa-barat">
                                                Jawa Barat
                                            </option>
                                            <option value="jawa-tengah">
                                                Jawa Tengah
                                            </option>
                                            <option value="yogyakarta">
                                                DIY Yogyakarta
                                            </option>
                                            <option value="jawa-timur">
                                                Jawa Timur
                                            </option>
                                        </select>
                                    </div>
                                    <!-- Kota/Kabupaten -->
                                    <div>
                                        <label
                                            class="mb-3 block font-semibold text-gray-700"
                                        >
                                            Kota/Kabupaten
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            v-model="form.city"
                                            type="text"
                                            placeholder="Contoh: Pandeglang"
                                            class="w-full rounded-xl border-2 border-gray-200 px-4 py-4 text-gray-700 outline-none transition-all focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20"
                                            required
                                            style="color: black"
                                        />
                                    </div>
                                    <!-- Alamat Lengkap -->
                                    <div>
                                        <label
                                            class="mb-3 block font-semibold text-gray-700"
                                        >
                                            Alamat Lengkap
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            v-model="form.address"
                                            type="text"
                                            placeholder="Alamat detail lokasi"
                                            class="w-full rounded-xl border-2 border-gray-200 px-4 py-4 text-gray-700 outline-none transition-all focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20"
                                            required
                                            style="color: black"
                                        />
                                    </div>
                                    <!-- Deskripsi -->
                                    <div class="md:col-span-2">
                                        <label
                                            class="mb-3 block font-semibold text-gray-700"
                                        >
                                            Deskripsi Singkat
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <textarea
                                            v-model="form.description"
                                            rows="4"
                                            placeholder="Ceritakan keunikan dan daya tarik tempat ini..."
                                            class="w-full resize-none rounded-xl border-2 border-gray-200 px-4 py-4 text-gray-700 outline-none transition-all focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20"
                                            required
                                        ></textarea>
                                        <p class="mt-2 text-sm text-gray-500">
                                            Minimal 50 karakter
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 2: Details & Media -->
                            <div v-show="currentStep === 2">
                                <div class="mb-8">
                                    <h2
                                        class="mb-2 text-3xl font-bold text-gray-800"
                                    >
                                        Detail & Media
                                    </h2>
                                    <p class="text-gray-600">
                                        Tambahkan foto dan informasi detail
                                        tentang tempat wisata
                                    </p>
                                </div>
                                <div class="space-y-6">
                                    <!-- Upload Foto -->
                                    <!-- Upload Foto - Diubah untuk mendukung preview -->
                                    <div>
                                        <label
                                            class="mb-3 block font-semibold text-gray-700"
                                        >
                                            Foto Tempat Wisata
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <div
                                            @click="openFilePicker"
                                            class="cursor-pointer rounded-xl border-2 border-dashed border-gray-300 p-8 text-center transition-colors hover:border-blue-400"
                                        >
                                            <!-- Tampilkan preview jika ada gambar -->
                                            <div
                                                v-if="previewImages.length > 0"
                                                class="grid grid-cols-3 gap-4"
                                            >
                                                <div
                                                    v-for="(
                                                        preview, index
                                                    ) in previewImages"
                                                    :key="index"
                                                    class="relative"
                                                >
                                                    <img
                                                        :src="preview"
                                                        class="h-32 w-full rounded-lg object-cover"
                                                    />
                                                    <button
                                                        type="button"
                                                        @click.stop="
                                                            removeImage(index)
                                                        "
                                                        class="absolute -right-2 -top-2 rounded-full bg-red-500 p-1 text-white"
                                                    >
                                                        <svg
                                                            class="h-4 w-4"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            viewBox="0 0 24 24"
                                                        >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M6 18L18 6M6 6l12 12"
                                                            ></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Tampilkan instruksi upload jika belum ada gambar -->
                                            <div v-else>
                                                <div
                                                    class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-blue-100"
                                                >
                                                    <svg
                                                        class="h-8 w-8 text-blue-600"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <p class="mb-2 text-gray-600">
                                                    <strong
                                                        >Klik untuk
                                                        upload</strong
                                                    >
                                                    atau drag & drop
                                                </p>
                                                <p
                                                    class="text-sm text-gray-500"
                                                >
                                                    PNG, JPG hingga 10MB
                                                </p>
                                            </div>

                                            <input
                                                type="file"
                                                ref="fileInput"
                                                class="hidden"
                                                accept="image/*"
                                                multiple
                                                @change="handleImageUpload"
                                            />
                                        </div>
                                        <p
                                            v-if="previewImages.length > 0"
                                            class="mt-2 text-sm text-gray-500"
                                        >
                                            {{ previewImages.length }} gambar
                                            dipilih
                                        </p>
                                    </div>
                                    <div class="grid gap-6 md:grid-cols-2">
                                        <!-- Harga Tiket -->
                                        <div>
                                            <label
                                                class="mb-3 block font-semibold text-gray-700"
                                            >
                                                Harga Tiket Masuk
                                            </label>
                                            <div class="relative">
                                                <span
                                                    class="absolute left-4 top-4 text-gray-500"
                                                    >Rp</span
                                                >
                                                <input
                                                    v-model="form.price"
                                                    type="number"
                                                    placeholder="0"
                                                    class="w-full rounded-xl border-2 border-gray-200 py-4 pl-12 pr-4 text-gray-700 outline-none transition-all focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20"
                                                    style="color: black"
                                                />
                                            </div>
                                            <p
                                                class="mt-2 text-sm text-gray-500"
                                            >
                                                Kosongkan jika gratis
                                            </p>
                                        </div>
                                        <!-- Jam Operasional -->
                                        <div>
                                            <label
                                                class="mb-3 block font-semibold text-gray-700"
                                            >
                                                Jam Operasional
                                            </label>
                                            <input
                                                v-model="form.operatingHours"
                                                type="text"
                                                placeholder="Contoh: 08:00 - 17:00"
                                                class="w-full rounded-xl border-2 border-gray-200 px-4 py-4 text-gray-700 outline-none transition-all focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20"
                                                style="color: black"
                                            />
                                        </div>
                                        <!-- Kontak -->
                                        <div>
                                            <label
                                                class="mb-3 block font-semibold text-gray-700"
                                            >
                                                Kontak (Opsional)
                                            </label>
                                            <input
                                                v-model="form.contact"
                                                type="text"
                                                placeholder="Nomor telepon atau website"
                                                class="w-full rounded-xl border-2 border-gray-200 px-4 py-4 text-gray-700 outline-none transition-all focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20"
                                                style="color: black"
                                            />
                                        </div>
                                        <!-- Rating -->
                                        <div>
                                            <label
                                                class="mb-3 block font-semibold text-gray-700"
                                            >
                                                Rating Pengalaman Kamu
                                            </label>
                                            <div class="flex space-x-2">
                                                <button
                                                    v-for="star in 5"
                                                    :key="star"
                                                    type="button"
                                                    @click="form.rating = star"
                                                    class="flex h-12 w-12 items-center justify-center rounded-full transition-all hover:scale-110"
                                                    :class="
                                                        star <= form.rating
                                                            ? 'bg-yellow-100 text-yellow-500'
                                                            : 'bg-gray-100 text-gray-400'
                                                    "
                                                >
                                                    <svg
                                                        class="h-6 w-6"
                                                        fill="currentColor"
                                                        viewBox="0 0 20 20"
                                                    >
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fasilitas -->
                                    <div>
                                        <label
                                            class="mb-3 block font-semibold text-gray-700"
                                        >
                                            Fasilitas yang Tersedia
                                        </label>
                                        <div
                                            class="grid grid-cols-2 gap-3 md:grid-cols-4"
                                        >
                                            <label
                                                v-for="facility in facilities"
                                                :key="facility.value"
                                                class="flex cursor-pointer items-center space-x-2"
                                            >
                                                <input
                                                    type="checkbox"
                                                    :value="facility.value"
                                                    v-model="form.facilities"
                                                    class="h-5 w-5 rounded border-2 border-gray-300 text-blue-600 focus:ring-blue-500"
                                                />
                                                <span
                                                    class="text-sm text-gray-700"
                                                    >{{ facility.label }}</span
                                                >
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 3: Review & Contact -->
                            <div v-show="currentStep === 3">
                                <div class="mb-8">
                                    <h2
                                        class="mb-2 text-3xl font-bold text-gray-800"
                                    >
                                        Review & Informasi Kontak
                                    </h2>
                                    <p class="text-gray-600">
                                        Periksa kembali informasi dan berikan
                                        kontak untuk verifikasi
                                    </p>
                                </div>
                                <div class="space-y-6">
                                    <!-- Review Summary -->
                                    <div class="rounded-xl bg-gray-50 p-6">
                                        <h3
                                            class="mb-4 text-xl font-semibold text-gray-800"
                                        >
                                            Ringkasan Informasi
                                        </h3>
                                        <div
                                            class="grid gap-4 text-sm md:grid-cols-2"
                                        >
                                            <div>
                                                <span class="text-gray-600"
                                                    >Nama:</span
                                                >
                                                <span
                                                    class="ml-2 font-medium text-gray-800"
                                                    >{{
                                                        form.name || '-'
                                                    }}</span
                                                >
                                            </div>
                                            <div>
                                                <span class="text-gray-600"
                                                    >Kategori:</span
                                                >
                                                <span
                                                    class="ml-2 font-medium text-gray-800"
                                                    >{{
                                                        form.category || '-'
                                                    }}</span
                                                >
                                            </div>
                                            <div>
                                                <span class="text-gray-600"
                                                    >Lokasi:</span
                                                >
                                                <span
                                                    class="ml-2 font-medium text-gray-800"
                                                    >{{ form.city }},
                                                    {{ form.province }}</span
                                                >
                                            </div>
                                            <div>
                                                <span class="text-gray-600"
                                                    >Rating:</span
                                                >
                                                <span
                                                    class="ml-2 font-medium text-gray-800"
                                                    >{{ form.rating }}/5
                                                    ⭐</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Contact Information -->
                                    <div class="grid gap-6 md:grid-cols-2">
                                        <div>
                                            <label
                                                class="mb-3 block font-semibold text-gray-700"
                                            >
                                                Nama Lengkap
                                                <span class="text-red-500"
                                                    >*</span
                                                >
                                            </label>
                                            <input
                                                v-model="form.contributorName"
                                                type="text"
                                                placeholder="Nama lengkap kamu"
                                                class="w-full rounded-xl border-2 border-gray-200 px-4 py-4 text-gray-700 outline-none transition-all focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20"
                                                required
                                                style="color: black"
                                            />
                                        </div>
                                        <div>
                                            <label
                                                class="mb-3 block font-semibold text-gray-700"
                                            >
                                                Email
                                                <span class="text-red-500"
                                                    >*</span
                                                >
                                            </label>
                                            <input
                                                v-model="form.contributorEmail"
                                                type="email"
                                                placeholder="email@example.com"
                                                class="w-full rounded-xl border-2 border-gray-200 px-4 py-4 text-gray-700 outline-none transition-all focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20"
                                                required
                                                style="color: black"
                                            />
                                        </div>
                                        <div class="md:col-span-2">
                                            <label
                                                class="mb-3 block font-semibold text-gray-700"
                                            >
                                                Nomor WhatsApp
                                            </label>
                                            <input
                                                v-model="form.contributorPhone"
                                                type="tel"
                                                placeholder="08xxxxxxxxxx"
                                                class="w-full rounded-xl border-2 border-gray-200 px-4 py-4 text-gray-700 outline-none transition-all focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20"
                                                style="color: black"
                                            />
                                        </div>
                                    </div>
                                    <!-- Agreement -->
                                    <div class="rounded-xl bg-blue-50 p-6">
                                        <label
                                            class="flex cursor-pointer items-start space-x-3"
                                        >
                                            <input
                                                type="checkbox"
                                                v-model="form.agreement"
                                                class="mt-1 h-5 w-5 rounded border-2 border-gray-300 text-blue-600 focus:ring-blue-500"
                                                required
                                            />
                                            <div class="text-sm text-gray-700">
                                                <p class="mb-2">
                                                    Saya menyetujui bahwa
                                                    informasi yang saya berikan
                                                    adalah benar dan dapat
                                                    diverifikasi. Saya
                                                    memberikan izin kepada
                                                    TripGo untuk:
                                                </p>
                                                <ul
                                                    class="list-inside list-disc space-y-1 text-xs text-gray-600"
                                                >
                                                    <li>
                                                        Menampilkan informasi
                                                        tempat wisata ini di
                                                        platform
                                                    </li>
                                                    <li>
                                                        Menghubungi saya untuk
                                                        verifikasi informasi
                                                    </li>
                                                    <li>
                                                        Menggunakan foto yang
                                                        saya upload (jika ada)
                                                    </li>
                                                </ul>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Navigation Buttons -->
                            <div
                                class="mt-12 flex items-center justify-between border-t pt-8"
                            >
                                <button
                                    v-if="currentStep > 1"
                                    type="button"
                                    @click="currentStep--"
                                    class="rounded-xl border-2 border-gray-300 px-6 py-3 font-medium text-gray-600 transition-colors hover:border-gray-400"
                                >
                                    ← Sebelumnya
                                </button>
                                <div v-else></div>
                                <button
                                    v-if="currentStep < 3"
                                    type="button"
                                    @click="nextStep"
                                    class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-3 font-semibold text-white shadow-lg transition-all hover:from-blue-700 hover:to-indigo-700 hover:shadow-xl"
                                >
                                    Selanjutnya →
                                </button>
                                <button
                                    v-else
                                    type="submit"
                                    :disabled="isSubmitting"
                                    class="rounded-xl bg-gradient-to-r from-green-600 to-emerald-600 px-8 py-3 font-semibold text-white shadow-lg transition-all hover:from-green-700 hover:to-emerald-700 hover:shadow-xl disabled:opacity-50"
                                >
                                    <span v-if="!isSubmitting"
                                        >🚀 Kirim Kontribusi</span
                                    >
                                    <span v-else>⏳ Mengirim...</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Success Modal -->
        <div
            v-if="showSuccessModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4"
        >
            <div class="w-full max-w-md rounded-2xl bg-white p-8 text-center">
                <div
                    class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-green-100"
                >
                    <svg
                        class="h-8 w-8 text-green-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"
                        ></path>
                    </svg>
                </div>
                <h3 class="mb-2 text-2xl font-bold text-gray-800">
                    Terima Kasih! 🎉
                </h3>
                <p class="mb-6 text-gray-600">
                    Kontribusi kamu telah berhasil dikirim. Tim kami akan
                    melakukan verifikasi dalam 1-3 hari kerja.
                </p>
                <div class="space-y-3">
                    <button
                        @click="resetForm"
                        class="w-full rounded-xl bg-blue-600 px-6 py-3 font-medium text-white transition-colors hover:bg-blue-700"
                    >
                        Tambah Tempat Lain
                    </button>
                    <Link
                        href="/"
                        class="block w-full rounded-xl border border-gray-300 px-6 py-3 font-medium text-gray-600 transition-colors hover:border-gray-400"
                    >
                        Kembali ke Beranda
                    </Link>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
const fileInput = ref(null);
const previewImages = ref([]);
// Fungsi untuk membuka file picker
const openFilePicker = () => {
    fileInput.value.click();
};
import { ref, reactive } from 'vue';
import { Link } from '@inertiajs/vue3';
import MainLayout from '../Layouts/MainLayout.vue';

// Form steps
const currentStep = ref(1);
const isSubmitting = ref(false);
const showSuccessModal = ref(false);

// Form data
const form = reactive({
    name: '',
    category: '',
    province: '',
    city: '',
    address: '',
    description: '',
    images: [],
    price: '',
    operatingHours: '',
    contact: '',
    rating: 5,
    facilities: [],
    contributorName: '',
    contributorEmail: '',
    contributorPhone: '',
    agreement: false,
});

// Fungsi untuk menangani upload gambar
const handleImageUpload = (event) => {
    const files = event.target.files;
    if (files.length > 0) {
        // Reset preview sebelumnya
        previewImages.value = [];

        // Konversi FileList ke array dan buat preview
        Array.from(files).forEach((file) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImages.value.push(e.target.result);

                // Simpan file asli ke dalam form
                form.images.push(file);
            };
            reader.readAsDataURL(file);
        });
    }
};

const removeImage = (index) => {
    previewImages.value.splice(index, 1);
    form.images.splice(index, 1);
};

// Facilities options
const facilities = [
    { value: 'parking', label: '🅿️ Parkir' },
    { value: 'toilet', label: '🚻 Toilet' },
    { value: 'food', label: '🍽️ Warung/Restoran' },
    { value: 'wifi', label: '📶 WiFi' },
    { value: 'guide', label: '👨‍🏫 Pemandu' },
    { value: 'souvenir', label: '🛍️ Toko Souvenir' },
    { value: 'photo_spot', label: '📸 Spot Foto' },
    { value: 'musholla', label: '🕌 Musholla' },
];

// Methods
const nextStep = () => {
    if (validateCurrentStep()) {
        currentStep.value++;
    }
};

const validateCurrentStep = () => {
    if (currentStep.value === 1) {
        if (
            !form.name ||
            !form.category ||
            !form.province ||
            !form.city ||
            !form.address ||
            !form.description
        ) {
            alert('Harap lengkapi semua field yang wajib diisi');
            return false;
        }
        if (form.description.length < 50) {
            alert('Deskripsi harus minimal 50 karakter');
            return false;
        }
    }
    return true;
};

const submitForm = async () => {
    if (currentStep.value < 3) {
        nextStep();
        return;
    }
    // Validasi step terakhir
    if (!form.contributorName || !form.contributorEmail || !form.agreement) {
        alert('Harap lengkapi informasi kontributor dan setujui persyaratan');
        return;
    }
    isSubmitting.value = true;
    try {
        // Simulasi API call
        await new Promise((resolve) => setTimeout(resolve, 1500));
        // Log data yang dikirim (dalam implementasi nyata, gunakan Inertia.post)
        console.log('Data wisata yang dikirim:', form);
        // Tampilkan modal sukses
        showSuccessModal.value = true;
        alert(
            '✅ Wisata berhasil ditambahkan! Terima kasih atas kontribusinya.',
        );
    } catch (error) {
        console.error('Error submitting form:', error);
        alert('❌ Gagal menambahkan wisata. Silakan coba lagi.');
    } finally {
        isSubmitting.value = false;
    }
};

const resetForm = () => {
    Object.keys(form).forEach((key) => {
        if (Array.isArray(form[key])) {
            form[key] = [];
        } else if (typeof form[key] === 'boolean') {
            form[key] = false;
        } else if (typeof form[key] === 'number') {
            form[key] = key === 'rating' ? 5 : 0;
        } else {
            form[key] = '';
        }
    });
    currentStep.value = 1;
    showSuccessModal.value = false;
};
</script>
