<template>
    <div class="container mx-auto max-w-4xl px-4 py-12">
        <!-- Header -->
        <header class="mb-12 text-center">
            <h1
                class="mb-3 text-4xl font-bold leading-tight text-gray-800 md:text-5xl"
            >
                Kapan kamu akan pergi?
            </h1>
            <p class="mx-auto max-w-lg text-gray-500">
                Pilih rentang tanggal, maksimal 7 hari.
            </p>
        </header>

        <!-- Date Range Picker -->
        <div class="shadow-card mb-8 rounded-2xl bg-white p-6">
            <div class="flex justify-center">
                <div class="input-daterange input-group w-full max-w-md">
                    <input
                        type="text"
                        class="form-control h-14 rounded-lg border-gray-300 text-center"
                        ref="startDateInput"
                        placeholder="Tanggal Mulai"
                    />
                    <span
                        class="input-group-addon mx-2 flex items-center text-gray-500"
                        >sampai</span
                    >
                    <input
                        type="text"
                        class="form-control h-14 rounded-lg border-gray-300 text-center"
                        ref="endDateInput"
                        placeholder="Tanggal Akhir"
                    />
                </div>
            </div>

            <!-- Date info -->
            <div class="mt-8 text-center text-gray-500">
                <p v-if="dateRange.start && dateRange.end" class="text-sm">
                    Dipilih: {{ formatDate(dateRange.start) }} -
                    {{ formatDate(dateRange.end) }} ({{ dateDifference }} hari)
                </p>
                <p v-else class="text-sm">Pilih tanggal perjalanan Anda</p>
            </div>
        </div>

        <!-- I don't know my dates -->
        <div class="mb-10 text-center">
            <a
                href="#"
                class="text-primary text-lg font-medium hover:text-blue-700"
                @click.prevent="skipDates"
            >
                Saya belum tahu tanggalnya
            </a>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex justify-between">
            <button
                @click="$emit('prev-step')"
                class="rounded-full border border-gray-300 bg-white px-8 py-3 text-lg font-medium text-gray-700 shadow transition-all hover:bg-gray-50"
            >
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </button>
            <button
                @click="handleNext"
                :disabled="!isDateSelected"
                class="bg-primary rounded-full px-8 py-3 text-lg font-medium text-white shadow-lg transition-all hover:bg-blue-700 disabled:opacity-50"
            >
                Selanjutnya
                <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </div>
    </div>
</template>

<script>
import $ from 'jquery';
import 'bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js';
import 'bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css';

export default {
    props: {
        formData: Object,
    },
    emits: ['next-step', 'prev-step', 'update-form-data'],
    data() {
        return {
            dateRange: {
                start: null,
                end: null,
            },
        };
    },
    computed: {
        isDateSelected() {
            return this.dateRange.start && this.dateRange.end;
        },
        dateDifference() {
            if (!this.dateRange.start || !this.dateRange.end) return 0;

            const diffTime = Math.abs(
                this.dateRange.end - this.dateRange.start,
            );
            return Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
        },
    },
    mounted() {
        this.initDatePicker();
    },
    beforeUnmount() {
        this.destroyDatePicker();
    },
    methods: {
        initDatePicker() {
            const self = this;

            $(this.$refs.startDateInput)
                .datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true,
                    todayHighlight: true,
                    language: 'id',
                    templates: {
                        leftArrow: '<i class="fas fa-chevron-left"></i>',
                        rightArrow: '<i class="fas fa-chevron-right"></i>',
                    },
                })
                .on('changeDate', function (e) {
                    self.dateRange.start = e.date;
                    self.checkMaxRange();
                });

            $(this.$refs.endDateInput)
                .datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true,
                    todayHighlight: true,
                    language: 'id',
                    templates: {
                        leftArrow: '<i class="fas fa-chevron-left"></i>',
                        rightArrow: '<i class="fas fa-chevron-right"></i>',
                    },
                })
                .on('changeDate', function (e) {
                    self.dateRange.end = e.date;
                    self.checkMaxRange();
                });
        },

        destroyDatePicker() {
            $(this.$refs.startDateInput).datepicker('destroy');
            $(this.$refs.endDateInput).datepicker('destroy');
        },

        checkMaxRange() {
            if (!this.dateRange.start || !this.dateRange.end) return;

            const diffDays = this.dateDifference;
            if (diffDays > 7) {
                // Reset end date if range exceeds 7 days
                const newEndDate = new Date(this.dateRange.start);
                newEndDate.setDate(newEndDate.getDate() + 6);

                this.dateRange.end = newEndDate;
                $(this.$refs.endDateInput).datepicker('update', newEndDate);

                // Show warning
                alert('Maksimal pemilihan tanggal adalah 7 hari');
            }
        },

        formatDate(date) {
            if (!date) return '';
            return date.toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'short',
            });
        },

        skipDates() {
            this.dateRange = { start: null, end: null };
            this.handleNext();
        },

        handleNext() {
            this.$emit('update-form-data', {
                dateRange: {
                    start: this.dateRange.start,
                    end: this.dateRange.end,
                },
            });
            this.$emit('next-step');
        },
    },
};
</script>

<style>
/* Custom styling untuk datepicker */
.datepicker {
    border-radius: 0.5rem;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    padding: 10px;
    z-index: 1000 !important;
}

.datepicker table tr td.active,
.datepicker table tr td.active:hover {
    background-color: #2563eb;
    color: white;
}

.datepicker table tr td.range {
    background-color: #eff6ff;
}

.datepicker table tr td.today {
    background-color: #dbeafe;
    color: #2563eb;
}

.datepicker-dropdown:before {
    border-bottom-color: #e2e8f0;
}
.datepicker-dropdown:after {
    border-bottom-color: white;
}
</style>
