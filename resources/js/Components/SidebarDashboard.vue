<template>
    <aside
        id="app-menu"
        class="hs-overlay z-60 w-sidenav min-w-sidenav border-default-200 hs-overlay-open:translate-x-0 rtl:hs-overlay-open:translate-x-0 fixed inset-y-0 start-0 hidden -translate-x-full transform overflow-y-auto border-e bg-white transition-all duration-300 [--body-scroll:true] [--overlay-backdrop:true] lg:bottom-0 lg:end-auto lg:z-30 lg:block lg:translate-x-0 lg:[--overlay-backdrop:false] rtl:translate-x-full rtl:lg:translate-x-0 print:hidden"
    >
        <!-- Sidenav Logo -->
        <div
            class="h-topbar border-default-200 .bg-primary/5 sticky top-0 flex items-center justify-center border-b px-6"
        >
            <a href="index.html">
                <img
                    src="assets/images/logo-dark.png"
                    alt="logo"
                    class="flex h-10"
                />
            </a>
        </div>

        <div class="p-4" data-simplebar>
            <ul
                class="admin-menu hs-accordion-group flex w-full flex-col gap-1.5"
            >
                <li class="menu-item">
                    <a
                        class="text-default-700 hover:bg-default-900/5 group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                        href="index.html"
                    >
                        <i class="i-solar-home-smile-bold-duotone text-2xl"></i>
                        Dashboard
                    </a>
                </li>

                <li class="text-default-600 px-5 py-2 text-sm font-medium">
                    Page
                </li>

                <li class="menu-item">
                    <a
                        class="text-default-700 hover:bg-default-900/5 group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                        href="app-calendar.html"
                    >
                        <i class="i-solar-calendar-bold-duotone text-2xl"></i>
                        Calendar
                    </a>
                </li>

                <li class="menu-item">
                    <a
                        href="starter-page.html"
                        class="text-default-700 hover:bg-default-900/5 hs-accordion-active:bg-default-900/5 group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                    >
                        <i class="i-solar-file-bold-duotone text-2xl"></i>
                        <span class="menu-text"> Starter Pages </span>
                    </a>
                </li>

                <li class="text-default-600 px-5 py-2 text-sm font-medium">
                    Elements
                </li>

                <li class="menu-item hs-accordion">
                    <a
                        href="javascript:void(0)"
                        class="hs-accordion-toggle text-default-700 hover:bg-default-900/5 hs-accordion-active:bg-primary/10 hs-accordion-active:text-primary group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                    >
                        <i
                            class="i-solar-box-minimalistic-bold-duotone text-2xl"
                        ></i>
                        <span class="menu-text"> Components </span>
                        <span
                            class="i-tabler-chevron-right hs-accordion-active:rotate-90 ms-auto text-sm transition-all"
                        ></span>
                    </a>

                    <div
                        class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                    >
                        <ul class="mt-2 space-y-2">
                            <li class="menu-item">
                                <a
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                    href="ui-accordion.html"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    Accordion
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                    href="ui-alerts.html"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    Alert
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                    href="ui-avatars.html"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    Avatars
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                    href="ui-buttons.html"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    Buttons
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                    href="ui-badges.html"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    Badges
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                    href="ui-breadcrumbs.html"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    Breadcrumbs
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                    href="ui-cards.html"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    Cards
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                    href="ui-collapse.html"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    Collapse
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                    href="ui-dropdowns.html"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    Dropdowns
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                    href="ui-progress.html"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    Progress
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                    href="ui-spinners.html"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    Spinners
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                    href="ui-skeleton.html"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    Skeleton
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                    href="ui-ratio.html"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    Ratio
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                    href="ui-modals.html"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    Modals
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                    href="ui-offcanvas.html"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    Offcanvas
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                    href="ui-popovers.html"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    Popovers
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                    href="ui-tooltips.html"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    Tooltips
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                    href="ui-typography.html"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    Typography
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-item hs-accordion">
                    <a
                        href="javascript:void(0)"
                        class="hs-accordion-toggle text-default-700 hover:bg-default-900/5 hs-accordion-active:bg-primary/10 hs-accordion-active:text-primary group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                    >
                        <i
                            class="i-solar-document-text-bold-duotone text-2xl"
                        ></i>
                        <span class="menu-text"> Forms </span>
                        <span
                            class="i-tabler-chevron-right hs-accordion-active:rotate-90 ms-auto text-sm transition-all"
                        ></span>
                    </a>

                    <div
                        class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                    >
                        <ul class="mt-2 space-y-2">
                            <li class="menu-item">
                                <a
                                    href="forms-inputs.html"
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    <span class="menu-text">Inputs</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    href="forms-check-radio.html"
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    <span class="menu-text"
                                        >Checkbox & Radio</span
                                    >
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    href="forms-masks.html"
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    <span class="menu-text">Input Masks</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    href="forms-file-upload.html"
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    <span class="menu-text">File Upload</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    href="forms-editor.html"
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    <span class="menu-text">Editor</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    href="forms-validation.html"
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    <span class="menu-text">Validation</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    href="forms-layout.html"
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    <span class="menu-text">Form Layout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-item">
                    <a
                        href="maps-vector.html"
                        class="text-default-700 hover:bg-default-900/5 group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                    >
                        <i
                            class="i-solar-map-point-wave-bold-duotone text-2xl"
                        ></i>
                        <span class="menu-text"> Maps </span>
                    </a>
                </li>

                <li class="menu-item">
                    <a
                        href="tables-basic.html"
                        class="text-default-700 hover:bg-default-900/5 hs-accordion-active:bg-primary/10 hs-accordion-active:text-primary group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                    >
                        <i
                            class="i-solar-server-minimalistic-bold-duotone text-2xl"
                        ></i>
                        <span class="menu-text"> Tables </span>
                    </a>
                </li>

                <li class="menu-item">
                    <a
                        href="charts-apex.html"
                        class="text-default-700 hover:bg-default-900/5 hs-accordion-active:bg-primary/10 hs-accordion-active:text-primary group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                    >
                        <i class="i-solar-chart-2-bold-duotone text-2xl"></i>
                        <span class="menu-text"> Chart </span>
                    </a>
                </li>

                <li class="menu-item">
                    <a
                        href="icons.html"
                        class="text-default-700 hover:bg-default-900/5 group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                    >
                        <i class="i-solar-pallete-2-bold-duotone text-2xl"></i>
                        <span class="menu-text"> Icons </span>
                    </a>
                </li>

                <li class="menu-item hs-accordion">
                    <a
                        href="javascript:void(0)"
                        class="hs-accordion-toggle text-default-700 hover:bg-default-900/5 hs-accordion-active:bg-primary/10 hs-accordion-active:text-primary group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                    >
                        <span class="i-solar-list-bold-duotone text-2xl"></span>
                        <span class="menu-text"> Level </span>
                        <span
                            class="i-tabler-chevron-right hs-accordion-active:rotate-90 ms-auto text-sm transition-all"
                        ></span>
                    </a>

                    <div
                        id="sidenavLevel"
                        class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                    >
                        <ul class="mt-2 space-y-2">
                            <li class="menu-item">
                                <a
                                    href="javascript: void(0)"
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    <span class="menu-text">Item 1</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a
                                    href="javascript: void(0)"
                                    class="text-default-700 hover:bg-default-900/5 flex items-center gap-x-3.5 rounded-md px-5 py-2 text-sm font-medium"
                                >
                                    <i
                                        class="i-tabler-circle-filled scale-[.25] text-lg opacity-75"
                                    ></i>
                                    <span class="menu-text">Item 2</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-item">
                    <a
                        href="javascript:void(0)"
                        class="hs-accordion-toggle text-default-700 hover:bg-default-900/5 hs-accordion-active:bg-primary/10 hs-accordion-active:text-primary group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium transition-all"
                    >
                        <span
                            class="i-solar-verified-check-bold-duotone text-2xl"
                        ></span>
                        <span class="menu-text"> Badge Items </span>
                        <span
                            class="ms-auto inline-flex items-center gap-x-1.5 rounded-md bg-gray-800 px-2 py-0.5 text-xs font-semibold text-white"
                            >Hot</span
                        >
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</template>
