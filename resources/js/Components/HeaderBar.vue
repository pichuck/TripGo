<template>
    <!-- Navigation Above Search Bar -->
    <header class="mx-3 py-8">
        <div class="mx-auto max-w-3xl px-4 text-center">
            <h1 class="mb-8 text-5xl font-bold">
                <strong>Mau Kemana Kita?</strong>
            </h1>

            <div class="py-3">
                <div class="mx-auto max-w-7xl px-4">
                    <div class="flex justify-center gap-0 space-x-6">
                        <a
                            href="#"
                            class="text-lg text-gray-700 hover:text-[#1ba9c9]"
                            >Cari Semua</a
                        >
                        <a
                            href="#"
                            class="text-lg text-gray-700 hover:text-[#1ba9c9]"
                            >Hotel</a
                        >
                        <a
                            href="#"
                            class="text-lg text-gray-700 hover:text-[#1ba9c9]"
                            >Restoran</a
                        >
                        <a
                            href="#"
                            class="text-lg text-gray-700 hover:text-[#1ba9c9]"
                            >Oleh-Oleh</a
                        >
                        <a
                            href="#"
                            class="text-lg text-gray-700 hover:text-[#1ba9c9]"
                            >Rental</a
                        >
                    </div>
                </div>
            </div>

            <!-- Search Bar -->
            <div
                class="mx-auto flex max-w-2xl gap-4 rounded-full bg-white p-2 shadow-lg"
            >
                <input
                    type="text"
                    placeholder="Cari wisata, hotels, Restoran, Rentalan ......."
                    class="flex-1 rounded-full px-6 py-3 text-lg text-gray-900 outline-none hover:text-gray-900 focus:text-gray-900"
                />
                <button
                    class="rounded-full bg-[#1ba9c9] px-8 py-3 text-lg text-white"
                >
                    Search
                </button>
            </div>
        </div>
    </header>
</template>
