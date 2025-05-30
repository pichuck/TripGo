<template>
    <MainLayout>
        <div class="container mx-auto max-w-4xl px-4 py-8">
            <!-- Progress Bar -->
            <div class="mb-12">
                <div class="relative flex items-center justify-between">
                    <!-- Progress Line -->
                    <div
                        class="absolute left-0 right-0 top-1/2 -z-10 h-1 -translate-y-1/2 bg-gray-200"
                    ></div>
                    <div
                        class="bg-primary absolute left-0 top-1/2 -z-10 h-1 -translate-y-1/2 transition-all duration-500"
                        :style="`width: ${progress}%;`"
                    ></div>

                    <!-- Step 1 -->
                    <div class="flex flex-col items-center">
                        <div
                            class="mb-2 flex h-10 w-10 items-center justify-center rounded-full"
                            :class="
                                step >= 1
                                    ? 'bg-primary text-white'
                                    : 'bg-gray-200 text-gray-500'
                            "
                        >
                            <span>1</span>
                        </div>
                        <span class="text-sm font-medium">Pilih Destinasi</span>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex flex-col items-center">
                        <div
                            class="mb-2 flex h-10 w-10 items-center justify-center rounded-full"
                            :class="
                                step >= 2
                                    ? 'bg-primary text-white'
                                    : 'bg-gray-200 text-gray-500'
                            "
                        >
                            <span>2</span>
                        </div>
                        <span class="text-sm font-medium">Pilih Tanggal</span>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex flex-col items-center">
                        <div
                            class="mb-2 flex h-10 w-10 items-center justify-center rounded-full"
                            :class="
                                step >= 3
                                    ? 'bg-primary text-white'
                                    : 'bg-gray-200 text-gray-500'
                            "
                        >
                            <span>3</span>
                        </div>
                        <span class="text-sm font-medium">Pilih Kategori</span>
                    </div>
                </div>
            </div>

            <!-- Dynamic Component -->
            <div
                class="transition-all duration-300"
                :class="{
                    'opacity-0': changingStep,
                    'opacity-100': !changingStep,
                }"
            >
                <component
                    :is="currentStepComponent"
                    :form-data="formData"
                    @next-step="nextStep"
                    @prev-step="prevStep"
                    @update-form-data="updateFormData"
                    @submit-form="submitForm"
                />
            </div>
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from '../../Layouts/MainLayout.vue';
import AiSearchEngine from '../../Components/AiSearchEnggine.vue';
import AiPilihTanggal from '../../Components/AiPilihTanggal.vue';
import AiPilihCategory from '../../Components/AiPilihCategory.vue';
import { ref, computed } from 'vue';

export default {
    components: {
        MainLayout,
        AiSearchEngine,
        AiPilihTanggal,
        AiPilihCategory,
    },
    setup() {
        const step = ref(1);
        const changingStep = ref(false);
        const formData = ref({
            destination: null,
            dateRange: null,
            categories: [],
        });

        // Menghitung progress bar (dalam persen)
        const progress = computed(() => {
            return (step.value - 1) * 50; // Karena ada 3 step, maka per step 50% (dari 0% ke 100%)
        });

        // Komponen yang ditampilkan berdasarkan step
        const currentStepComponent = computed(() => {
            switch (step.value) {
                case 1:
                    return AiSearchEngine;
                case 2:
                    return AiPilihTanggal;
                case 3:
                    return AiPilihCategory;
                default:
                    return AiSearchEngine;
            }
        });

        // Fungsi untuk pindah ke step berikutnya dengan animasi
        const nextStep = () => {
            changingStep.value = true;
            setTimeout(() => {
                if (step.value < 3) {
                    step.value++;
                }
                changingStep.value = false;
            }, 300);
        };

        // Fungsi untuk kembali ke step sebelumnya dengan animasi
        const prevStep = () => {
            changingStep.value = true;
            setTimeout(() => {
                if (step.value > 1) {
                    step.value--;
                }
                changingStep.value = false;
            }, 300);
        };

        // Fungsi untuk update data form dari child component
        const updateFormData = (data) => {
            formData.value = { ...formData.value, ...data };
        };

        // Fungsi untuk submit form akhir
        const submitForm = () => {
            console.log('Form data to submit:', formData.value);
            // Di sini Anda bisa lakukan:
            // 1. Kirim data ke backend untuk diproses AI
            // 2. Redirect ke halaman hasil rekomendasi
            // 3. Tampilkan loading indicator

            // Contoh:
            // axios.post('/api/generate-recommendations', formData.value)
            //   .then(response => {
            //       // Redirect ke halaman hasil
            //   });
        };

        return {
            step,
            changingStep,
            progress,
            formData,
            currentStepComponent,
            nextStep,
            prevStep,
            updateFormData,
            submitForm,
        };
    },
};
</script>
