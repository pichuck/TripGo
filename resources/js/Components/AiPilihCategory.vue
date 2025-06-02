<template>
    <div class="container mx-auto max-w-4xl px-4 py-12">
        <!-- Header -->
        <header class="fade-in mb-12 text-center">
            <h1
                class="mb-3 bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-4xl font-bold leading-tight text-gray-800 md:text-5xl"
            >
                Tell us what you're interested in
            </h1>
            <p class="mx-auto max-w-lg text-lg text-gray-500">
                Select all that apply to personalize your experience.
            </p>
            <div class="mt-4">
                <span class="selection-counter"
                    >{{ selectedInterests.length }} selected</span
                >
            </div>
        </header>

        <!-- Form -->
        <form @submit.prevent="submitForm">
            <!-- Interests Grid -->
            <div class="fade-in mb-8 rounded-2xl bg-white p-8 shadow-card">
                <div
                    class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4"
                >
                    <!-- Interest Buttons -->
                    <button
                        v-for="interest in interests"
                        :key="interest.id"
                        type="button"
                        :class="[
                            'interest-btn rounded-full px-6 py-4 font-medium transition-all duration-300',
                            isSelected(interest.id)
                                ? 'selected bg-blue-600 text-white shadow-lg'
                                : 'bg-gray-50 text-gray-800 hover:bg-gray-100',
                        ]"
                        @click="toggleInterest(interest.id)"
                    >
                        {{ interest.name }}
                        <i
                            :class="[
                                'fas fa-check checkmark ml-2 transition-all duration-300',
                                isSelected(interest.id)
                                    ? 'scale-100 opacity-100'
                                    : 'scale-0 opacity-0',
                            ]"
                        ></i>
                    </button>

                    <!-- Custom Interest Buttons -->
                    <button
                        v-for="customInterest in customInterests"
                        :key="customInterest.id"
                        type="button"
                        :class="[
                            'interest-btn rounded-full px-6 py-4 font-medium transition-all duration-300',
                            isSelected(customInterest.id)
                                ? 'selected bg-blue-600 text-white shadow-lg'
                                : 'bg-gray-50 text-gray-800 hover:bg-gray-100',
                        ]"
                        @click="toggleInterest(customInterest.id)"
                    >
                        {{ customInterest.name }}
                        <i
                            :class="[
                                'fas fa-check checkmark ml-2 transition-all duration-300',
                                isSelected(customInterest.id)
                                    ? 'scale-100 opacity-100'
                                    : 'scale-0 opacity-0',
                            ]"
                        ></i>
                        <button
                            type="button"
                            class="ml-2 text-red-500 hover:text-red-700"
                            @click.stop="
                                removeCustomInterest(customInterest.id)
                            "
                        >
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    </button>
                </div>

                <!-- Add Interest Button -->
                <div class="mt-8 text-center">
                    <button
                        type="button"
                        class="add-interest-btn w-full max-w-xs rounded-full border-2 border-dashed border-gray-300 px-8 py-4 text-lg font-medium text-gray-500 transition-all duration-300 hover:border-blue-500 hover:text-blue-500"
                        @click="showCustomModal = true"
                    >
                        <i class="fas fa-plus mr-2"></i> Add custom interest
                    </button>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="fade-in flex justify-between">
                <button
                    type="button"
                    class="rounded-full border border-gray-300 bg-white px-8 py-3 text-lg font-medium text-gray-700 shadow transition-all hover:border-gray-400 hover:bg-gray-50"
                    @click="$emit('prev-step')"
                >
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back
                </button>
                <button
                    type="submit"
                    :disabled="selectedInterests.length === 0 || isSubmitting"
                    :class="[
                        'submit-btn rounded-full px-8 py-3 text-lg font-medium text-white shadow-lg transition-all duration-300',
                        selectedInterests.length === 0 || isSubmitting
                            ? 'cursor-not-allowed opacity-60'
                            : 'bg-blue-600 hover:bg-blue-700 hover:shadow-xl',
                    ]"
                >
                    <span v-if="!isSubmitting" class="submit-text">
                        {{
                            selectedInterests.length > 0
                                ? `Continue with ${selectedInterests.length} Selection${selectedInterests.length > 1 ? 's' : ''}`
                                : 'Select interests to continue'
                        }}
                        <i class="fas fa-arrow-right ml-2"></i>
                    </span>
                    <span v-else class="flex items-center">
                        <i class="fas fa-spinner mr-2 animate-spin"></i>
                        Processing...
                    </span>
                </button>
            </div>
        </form>

        <!-- Custom Interest Modal -->
        <div
            v-if="showCustomModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
            @click.self="closeCustomModal"
        >
            <div
                class="mx-4 w-full max-w-md rounded-2xl bg-white p-8 shadow-2xl"
            >
                <h3 class="mb-6 text-2xl font-bold text-gray-800">
                    Add Custom Interest
                </h3>
                <input
                    v-model="customInterestInput"
                    type="text"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-transparent focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your interest..."
                    maxlength="30"
                    @keyup.enter="addCustomInterest"
                    ref="customInput"
                />
                <div class="mt-6 flex gap-4">
                    <button
                        type="button"
                        class="flex-1 rounded-lg bg-gray-100 px-6 py-3 text-gray-700 transition-all hover:bg-gray-200"
                        @click="closeCustomModal"
                    >
                        Cancel
                    </button>
                    <button
                        type="button"
                        class="flex-1 rounded-lg bg-blue-600 px-6 py-3 text-white transition-all hover:bg-blue-700"
                        @click="addCustomInterest"
                    >
                        Add Interest
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, nextTick, computed } from 'vue';
import { router } from '@inertiajs/vue3';

// Define emits
const emit = defineEmits(['prev-step', 'next-step', 'update-form-data']);

// Reactive data
const selectedInterests = ref([]);
const customInterests = ref([]);
const showCustomModal = ref(false);
const customInterestInput = ref('');
const isSubmitting = ref(false);
const customInterestCounter = ref(0);

// Default interests
const interests = ref([
    { id: 'must-see-attractions', name: 'Must-see Attractions' },
    { id: 'great-food', name: 'Great Food' },
    { id: 'hidden-gems', name: 'Hidden Gems' },
    { id: 'tours-experiences', name: 'Tours & Experiences' },
    { id: 'street-food', name: 'Street Food' },
    { id: 'temples-religious', name: 'Temples and Religious Sites' },
    { id: 'natural-attractions', name: 'Natural Attractions' },
    { id: 'art-galleries', name: 'Art Galleries' },
    { id: 'colonial-architecture', name: 'Colonial Architecture' },
    { id: 'night-markets', name: 'Night Markets' },
    { id: 'adventure-sports', name: 'Adventure and Sports' },
    { id: 'arts-theatre', name: 'Arts & Theatre' },
]);

// Methods
const isSelected = (interestId) => {
    return selectedInterests.value.includes(interestId);
};

const toggleInterest = (interestId) => {
    const index = selectedInterests.value.indexOf(interestId);
    if (index > -1) {
        selectedInterests.value.splice(index, 1);
    } else {
        selectedInterests.value.push(interestId);
    }
};

const addCustomInterest = () => {
    const customInterest = customInterestInput.value.trim();

    if (!customInterest) {
        alert('Please enter an interest.');
        return;
    }

    if (customInterest.length < 2) {
        alert('Interest must be at least 2 characters long.');
        return;
    }

    customInterestCounter.value++;
    const newInterest = {
        id: `custom-${customInterestCounter.value}`,
        name: customInterest,
    };

    customInterests.value.push(newInterest);
    selectedInterests.value.push(newInterest.id);

    closeCustomModal();
};

const removeCustomInterest = (interestId) => {
    // Remove from custom interests
    customInterests.value = customInterests.value.filter(
        (interest) => interest.id !== interestId,
    );
    // Remove from selected interests
    selectedInterests.value = selectedInterests.value.filter(
        (id) => id !== interestId,
    );
};

const closeCustomModal = () => {
    showCustomModal.value = false;
    customInterestInput.value = '';
};

const submitForm = async () => {
    if (selectedInterests.value.length === 0) {
        alert('Please select at least one interest before continuing.');
        return;
    }

    isSubmitting.value = true;

    try {
        // Get all selected interest names for submission
        const allInterests = [...interests.value, ...customInterests.value];
        const selectedInterestData = selectedInterests.value.map((id) => {
            const interest = allInterests.find((i) => i.id === id);
            return {
                id: id,
                name: interest ? interest.name : id,
            };
        });

        // Emit data to parent component
        emit('update-form-data', {
            interests: selectedInterestData,
        });
        emit('next-step');
    } catch (error) {
        console.error('Error submitting form:', error);
        alert('An error occurred. Please try again.');
    } finally {
        isSubmitting.value = false;
    }
};

// Focus custom input when modal opens
const customInput = ref(null);

const focusCustomInput = async () => {
    if (showCustomModal.value) {
        await nextTick();
        if (customInput.value) {
            customInput.value.focus();
        }
    }
};

// Watch for modal opening
import { watch } from 'vue';
watch(showCustomModal, focusCustomInput);

// Animation on mount
onMounted(() => {
    // Add any initialization logic here if needed
});
</script>

<style scoped>
.interest-btn {
    position: relative;
    overflow: hidden;
}

.interest-btn:hover {
    transform: translateY(-2px) scale(1.02);
    box-shadow:
        0 10px 25px -5px rgba(0, 0, 0, 0.1),
        0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.interest-btn.selected {
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    box-shadow:
        0 10px 25px -5px rgba(37, 99, 235, 0.4),
        0 4px 6px -2px rgba(37, 99, 235, 0.3);
    transform: translateY(-1px);
}

.interest-btn.selected::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(255, 255, 255, 0.1), transparent);
    pointer-events: none;
}

.checkmark {
    display: inline-block;
    transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.add-interest-btn {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
}

.add-interest-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px -5px rgba(0, 0, 0, 0.1);
    background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
}

.submit-btn {
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    position: relative;
    overflow: hidden;
}

.submit-btn:not(:disabled):hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 35px -5px rgba(37, 99, 235, 0.4);
}

.shadow-card {
    box-shadow:
        0 4px 6px -1px rgba(0, 0, 0, 0.1),
        0 2px 4px -2px rgba(0, 0, 0, 0.1);
}

.selection-counter {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 14px;
    box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.3);
    display: inline-block;
    transition: transform 0.2s ease;
}

.fade-in {
    animation: fadeInUp 0.6s ease-out forwards;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
