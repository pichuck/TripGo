<template>
    <!-- Topbar Start -->
    <header
        class="app-header h-topbar border-default-200 sticky top-0 z-50 flex items-center border-b bg-white px-5"
    >
        <div class="container flex items-center gap-4">
            <!-- Topbar Brand Logo -->
            <a href="index.html" class="flex md:hidden">
                <img
                    src="assets/images/logo-sm.png"
                    class="h-6"
                    alt="Small logo"
                />
            </a>

            <!-- Sidenav Menu Toggle Button -->
            <button
                id="button-toggle-menu"
                class="text-default-500 hover:text-default-600 cursor-pointer rounded-full p-2"
                data-hs-overlay="#app-menu"
                aria-label="Toggle navigation"
            >
                <i class="i-tabler-menu-2 text-2xl"></i>
            </button>

            <!-- Topbar Search -->
            <div class="relative hidden items-center md:flex">
                <div
                    class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3"
                >
                    <i class="i-ph-magnifying-glass text-base"></i>
                </div>
                <input
                    type="search"
                    class="form-input w-80 rounded-lg border-transparent bg-gray-500/10 px-10 focus:border-transparent"
                    placeholder="Search..."
                />
                <button
                    type="button"
                    class="absolute inset-y-0 end-0 flex items-center pe-3"
                >
                    <i class="i-ph-microphone text-base hover:text-black"></i>
                </button>
            </div>

            <!-- Language Dropdown Button -->
            <div
                class="hs-dropdown relative ms-auto inline-flex [--placement:bottom-right]"
            >
                <button
                    type="button"
                    class="hs-dropdown-toggle inline-flex items-center"
                >
                    <img
                        src="assets/images/flags/us.jpg"
                        alt="user-image"
                        class="h-4 w-6"
                    />
                </button>

                <div
                    class="hs-dropdown-menu duration border-default-200 hs-dropdown-open:opacity-100 mt-2 hidden min-w-48 rounded-lg border bg-white p-2 opacity-0 shadow-md transition-[opacity,margin]"
                >
                    <a
                        href="javascript:void(0);"
                        class="text-default-800 flex items-center gap-2.5 rounded-md px-3 py-2 text-sm hover:bg-gray-100"
                    >
                        <img
                            src="assets/images/flags/germany.jpg"
                            alt="user-image"
                            class="h-4"
                        />
                        <span class="align-middle">German</span>
                    </a>

                    <!-- item-->
                    <a
                        href="javascript:void(0);"
                        class="text-default-800 flex items-center gap-2.5 rounded-md px-3 py-2 text-sm hover:bg-gray-100"
                    >
                        <img
                            src="assets/images/flags/italy.jpg"
                            alt="user-image"
                            class="h-4"
                        />
                        <span class="align-middle">Italian</span>
                    </a>

                    <!-- item-->
                    <a
                        href="javascript:void(0);"
                        class="text-default-800 flex items-center gap-2.5 rounded-md px-3 py-2 text-sm hover:bg-gray-100"
                    >
                        <img
                            src="assets/images/flags/spain.jpg"
                            alt="user-image"
                            class="h-4"
                        />
                        <span class="align-middle">Spanish</span>
                    </a>

                    <!-- item-->
                    <a
                        href="javascript:void(0);"
                        class="text-default-800 flex items-center gap-2.5 rounded-md px-3 py-2 text-sm hover:bg-gray-100"
                    >
                        <img
                            src="assets/images/flags/russia.jpg"
                            alt="user-image"
                            class="h-4"
                        />
                        <span class="align-middle">Russian</span>
                    </a>
                </div>
            </div>

            <!-- Fullscreen Toggle Button -->
            <div class="hidden md:flex">
                <button data-toggle="fullscreen" type="button" class="p-2">
                    <span class="sr-only">Fullscreen Mode</span>
                    <span class="flex size-6 items-center justify-center">
                        <i
                            class="i-tabler-maximize flex text-2xl group-[-fullscreen]:hidden"
                        ></i>
                        <i
                            class="i-tabler-minimize hidden text-2xl group-[-fullscreen]:flex"
                        ></i>
                    </span>
                </button>
            </div>

            <!-- Profile Dropdown Button -->
            <div class="relative">
                <div
                    class="hs-dropdown relative inline-flex [--placement:bottom-right]"
                >
                    <button type="button" class="hs-dropdown-toggle">
                        <img
                            src="assets/images/users/avatar-8.jpg"
                            alt="user-image"
                            class="h-10 rounded-full"
                        />
                    </button>
                    <div
                        class="hs-dropdown-menu duration border-default-200 hs-dropdown-open:opacity-100 mt-2 hidden min-w-48 rounded-lg border bg-white p-2 opacity-0 shadow-md transition-[opacity,margin]"
                    >
                        <a
                            class="text-default-800 flex items-center rounded-md px-3 py-2 text-sm hover:bg-gray-100"
                            href="#"
                        >
                            Profile
                        </a>
                        <a
                            class="text-default-800 flex items-center rounded-md px-3 py-2 text-sm hover:bg-gray-100"
                            href="#"
                        >
                            Feed
                        </a>
                        <a
                            class="text-default-800 flex items-center rounded-md px-3 py-2 text-sm hover:bg-gray-100"
                            href="#"
                        >
                            Analytics
                        </a>
                        <a
                            class="text-default-800 flex items-center rounded-md px-3 py-2 text-sm hover:bg-gray-100"
                            href="#"
                        >
                            Settings
                        </a>
                        <a
                            class="text-default-800 flex items-center rounded-md px-3 py-2 text-sm hover:bg-gray-100"
                            href="#"
                        >
                            Support
                        </a>
                        <hr class="my-2" />
                        <a
                            class="text-default-800 flex items-center rounded-md px-3 py-2 text-sm hover:bg-gray-100"
                            href="#"
                        >
                            Log Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>
