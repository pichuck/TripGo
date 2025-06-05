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
                        class="absolute left-0 top-1/2 -z-10 h-1 -translate-y-1/2 bg-primary transition-all duration-500"
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
                />
            </div>

            <!-- Submit Button (Only visible on last step) -->
            <div v-if="step === 3" class="mt-8 text-center">
                <button
                    @click="submitForm"
                    class="next-btn rounded-full bg-primary px-12 py-4 text-lg font-medium text-white shadow-lg transition-all hover:bg-blue-700 disabled:opacity-50"
                >
                    Submit
                    <i class="fas fa-arrow-right ml-2"></i>
                </button>
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
import axios from 'axios';

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

        // Progress Bar (Persen Progress berdasarkan Step)
        const progress = computed(() => {
            return (step.value - 1) * 50; // 3 step, setiap step 50%
        });

        // Step Component yang aktif
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

        // Fungsi Next Step
        const nextStep = () => {
            changingStep.value = true;
            setTimeout(() => {
                if (step.value < 3) {
                    step.value++;
                }
                changingStep.value = false;
            }, 300);
        };

        // Fungsi Previous Step
        const prevStep = () => {
            changingStep.value = true;
            setTimeout(() => {
                if (step.value > 1) {
                    step.value--;
                }
                changingStep.value = false;
            }, 300);
        };

        // Update Form Data
        const updateFormData = (data) => {
            formData.value = { ...formData.value, ...data };
        };

        // Submit Form untuk Mengirim Data ke Laravel
        const submitForm = async () => {
            const formDataToSend = {
                query: formData.value.destination.name, // Nama kota dari formData
                category: formData.value.categories,
                dateRange: formData.value.dateRange,
            };

            try {
                const response = await axios.post(
                    '/api/tour-recommendations',
                    formDataToSend,
                );
                // Terima rekomendasi dari Flask melalui Laravel
                const recommendations = response.data;

                // Redirect atau lakukan hal lain setelah menerima hasil rekomendasi
                // Contoh bisa menggunakan Inertia untuk redirect ke halaman rekomendasi
                this.$router.push({
                    name: 'RekomendasiAi',
                    params: { recommendations },
                });
            } catch (error) {
                console.error('Error submitting form:', error);
                alert('Terjadi kesalahan. Silakan coba lagi.');
            }
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
