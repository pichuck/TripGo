<template>
    <DashboardLayouts>
        <main>
            <!-- Page Title Start -->
            <div
                class="mb-6 flex flex-wrap items-center gap-2 md:justify-between"
            >
                <h4 class="text-default-900 mb-2 text-lg font-medium">
                    Dashboard
                </h4>

                <div
                    class="hidden items-center gap-3 text-sm font-semibold md:flex"
                >
                    <a href="#" class="text-default-700 text-sm font-medium"
                        >OpenDash</a
                    >
                    <i
                        class="material-symbols-rounded text-default-500 flex-shrink-0 text-xl"
                        >chevron_right</i
                    >
                    <a href="#" class="text-default-700 text-sm font-medium"
                        >Menu</a
                    >
                    <i
                        class="material-symbols-rounded text-default-500 flex-shrink-0 text-xl"
                        >chevron_right</i
                    >
                    <a
                        href="#"
                        class="text-default-700 text-sm font-medium"
                        aria-current="page"
                        >Dashboard</a
                    >
                </div>
            </div>
            <!-- Page Title End -->

            <div class="mb-6 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                <div
                    class="card group overflow-hidden transition-all duration-500 hover:-translate-y-0.5 hover:shadow-lg"
                >
                    <div class="card-body">
                        <div class="items- flex justify-between">
                            <div>
                                <p class="mb-1 text-base">Total Order</p>
                                <h4 class="text-xl">2415</h4>
                            </div>

                            <div
                                class="bg-success/10 text-success flex size-16 items-center justify-center rounded-lg"
                            >
                                <i
                                    class="material-symbols-rounded group-hover:fill-1 text-4xl transition-all"
                                    >shopping_bag</i
                                >
                            </div>
                        </div>
                    </div>
                    <div id="total-order"></div>
                </div>

                <div
                    class="card group overflow-hidden transition-all duration-500 hover:-translate-y-0.5 hover:shadow-lg"
                >
                    <div class="card-body">
                        <div class="items- flex justify-between">
                            <div>
                                <p class="mb-1 text-base">Total Sale</p>
                                <h4 class="text-xl">$78.5K</h4>
                            </div>

                            <div
                                class="bg-primary/10 text-primary flex size-16 items-center justify-center rounded-lg"
                            >
                                <i
                                    class="material-symbols-rounded group-hover:fill-1 text-4xl transition-all"
                                    >payments</i
                                >
                            </div>
                        </div>
                    </div>
                    <div id="total-sale"></div>
                </div>

                <div
                    class="card group overflow-hidden transition-all duration-500 hover:-translate-y-0.5 hover:shadow-lg"
                >
                    <div class="card-body">
                        <div class="items- flex justify-between">
                            <div>
                                <p class="mb-1 text-base">Total Visits</p>
                                <h4 class="text-xl">145.2K</h4>
                            </div>

                            <div
                                class="bg-info/10 text-info flex size-16 items-center justify-center rounded-lg"
                            >
                                <i
                                    class="material-symbols-rounded group-hover:fill-1 text-4xl transition-all"
                                    >visibility</i
                                >
                            </div>
                        </div>
                    </div>
                    <div id="total-visits"></div>
                </div>
            </div>

            <div class="grid gap-6 xl:grid-cols-2">
                <div class="card overflow-hidden">
                    <div class="card-header flex items-center justify-between">
                        <h4 class="card-title">Recent Buyers</h4>
                        <a
                            href="#!"
                            class="btn btn-sm bg-light !text-sm text-gray-800"
                            >Export</a
                        >
                    </div>

                    <div class="custom-scroll overflow-x-auto">
                        <div
                            class="inline-block min-w-full whitespace-nowrap align-middle"
                        >
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead
                                        class="bg-light/40 border-b border-gray-200"
                                    >
                                        <tr>
                                            <th class="px-6 py-3 text-start">
                                                Product
                                            </th>
                                            <th class="px-6 py-3 text-start">
                                                Customers
                                            </th>
                                            <th class="px-6 py-3 text-start">
                                                Categories
                                            </th>
                                            <th class="px-6 py-3 text-start">
                                                Popularity
                                            </th>
                                            <th class="px-6 py-3 text-start">
                                                Amount
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-b border-gray-200">
                                            <td class="px-6 py-3">iPhone X</td>
                                            <td class="px-6 py-3">
                                                Tiffany W. Yang
                                            </td>
                                            <td class="px-6 py-3">
                                                <span
                                                    class="bg-success/10 text-success rounded px-2 py-1 text-xs"
                                                    >Mobile</span
                                                >
                                            </td>
                                            <td class="px-6 py-3">
                                                <div
                                                    class="bg-light flex h-1.5 w-full overflow-hidden rounded-full"
                                                >
                                                    <div
                                                        class="progress-bar progress-bar-striped bg-success"
                                                        role="progressbar"
                                                        aria-valuenow="85"
                                                        aria-valuemin="20"
                                                        aria-valuemax="100"
                                                        style="width: 85%"
                                                    ></div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-3">$ 1200.00</td>
                                        </tr>
                                        <tr class="border-b border-gray-200">
                                            <td class="px-6 py-3">iPad</td>
                                            <td class="px-6 py-3">
                                                Dale P. Warman
                                            </td>
                                            <td class="px-6 py-3">
                                                <span
                                                    class="bg-success/10 text-success rounded px-2 py-1 text-xs"
                                                    >Tablet</span
                                                >
                                            </td>
                                            <td class="px-6 py-3">
                                                <div
                                                    class="bg-light flex h-1.5 w-full overflow-hidden rounded-full"
                                                >
                                                    <div
                                                        class="progress-bar progress-bar-striped bg-success"
                                                        role="progressbar"
                                                        aria-valuenow="72"
                                                        aria-valuemin="20"
                                                        aria-valuemax="100"
                                                        style="width: 72%"
                                                    ></div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-3">$ 1190.00</td>
                                        </tr>
                                        <tr class="border-b border-gray-200">
                                            <td class="px-6 py-3">OnePlus</td>
                                            <td class="px-6 py-3">
                                                Garth J. Terry
                                            </td>
                                            <td class="px-6 py-3">
                                                <span
                                                    class="bg-success/10 text-success rounded px-2 py-1 text-xs"
                                                    >Electronics</span
                                                >
                                            </td>
                                            <td class="px-6 py-3">
                                                <div
                                                    class="bg-light flex h-1.5 w-full overflow-hidden rounded-full"
                                                >
                                                    <div
                                                        class="progress-bar progress-bar-striped bg-success"
                                                        role="progressbar"
                                                        aria-valuenow="43"
                                                        aria-valuemin="20"
                                                        aria-valuemax="100"
                                                        style="width: 43%"
                                                    ></div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-3">$ 999.00</td>
                                        </tr>
                                        <tr class="border-b border-gray-200">
                                            <td class="px-6 py-3">ZenPad</td>
                                            <td class="px-6 py-3">
                                                Marilyn D. Bailey
                                            </td>
                                            <td class="px-6 py-3">
                                                <span
                                                    class="bg-success/10 text-success rounded px-2 py-1 text-xs"
                                                    >Cosmetics</span
                                                >
                                            </td>
                                            <td class="px-6 py-3">
                                                <div
                                                    class="bg-light flex h-1.5 w-full overflow-hidden rounded-full"
                                                >
                                                    <div
                                                        class="progress-bar progress-bar-striped bg-success"
                                                        role="progressbar"
                                                        aria-valuenow="37"
                                                        aria-valuemin="20"
                                                        aria-valuemax="100"
                                                        style="width: 37%"
                                                    ></div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-3">$ 1150.00</td>
                                        </tr>
                                        <tr class="border-b border-gray-200">
                                            <td class="px-6 py-3">Pixel 2</td>
                                            <td class="px-6 py-3">
                                                Denise R. Vaughan
                                            </td>
                                            <td class="px-6 py-3">
                                                <span
                                                    class="bg-success/10 text-success rounded px-2 py-1 text-xs"
                                                    >Appliences</span
                                                >
                                            </td>
                                            <td class="px-6 py-3">
                                                <div
                                                    class="bg-light flex h-1.5 w-full overflow-hidden rounded-full"
                                                >
                                                    <div
                                                        class="progress-bar progress-bar-striped bg-success"
                                                        role="progressbar"
                                                        aria-valuenow="82"
                                                        aria-valuemin="20"
                                                        aria-valuemax="100"
                                                        style="width: 82%"
                                                    ></div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-3">$ 1180.00</td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-3">Pixel 2</td>
                                            <td class="px-6 py-3">
                                                Jeffery R. Wilson
                                            </td>
                                            <td class="px-6 py-3">
                                                <span
                                                    class="bg-success/10 text-success rounded px-2 py-1 text-xs"
                                                    >Mobile</span
                                                >
                                            </td>
                                            <td class="px-6 py-3">
                                                <div
                                                    class="bg-light flex h-1.5 w-full overflow-hidden rounded-full"
                                                >
                                                    <div
                                                        class="progress-bar progress-bar-striped bg-success"
                                                        role="progressbar"
                                                        aria-valuenow="36"
                                                        aria-valuemin="20"
                                                        aria-valuemax="100"
                                                        style="width: 36%"
                                                    ></div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-3">$ 1180.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-->

                <div class="card overflow-hidden">
                    <div class="card-header flex items-center justify-between">
                        <h4 class="card-title">Account Transactions</h4>
                        <a
                            href="#!"
                            class="btn btn-sm bg-light !text-sm text-gray-800"
                            >Export</a
                        >
                    </div>

                    <div class="overflow-x-auto">
                        <div
                            class="inline-block min-w-full whitespace-nowrap align-middle"
                        >
                            <div class="overflow-hidden">
                                <table class="min-w-full text-sm">
                                    <tbody>
                                        <tr class="border-b border-gray-200">
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    4257 **** **** 7852
                                                </div>
                                                <div class="text-xs">
                                                    11 April 2023
                                                </div>
                                            </td>
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    $79.49
                                                </div>
                                                <div class="text-xs">
                                                    Amount
                                                </div>
                                            </td>
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    Visa
                                                </div>
                                                <div class="text-xs">Card</div>
                                            </td>
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    Helen Warren
                                                </div>
                                                <div class="text-xs">Pay</div>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-200">
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    4427 **** **** 4568
                                                </div>
                                                <div class="text-xs">
                                                    28 Jan 2023
                                                </div>
                                            </td>
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    $1254.00
                                                </div>
                                                <div class="text-xs">
                                                    Amount
                                                </div>
                                            </td>
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    Visa
                                                </div>
                                                <div class="text-xs">Card</div>
                                            </td>
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    Kayla Lambie
                                                </div>
                                                <div class="text-xs">Pay</div>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-200">
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    4265 **** **** 0025
                                                </div>
                                                <div class="text-xs">
                                                    08 Dec 2022
                                                </div>
                                            </td>
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    $784.25
                                                </div>
                                                <div class="text-xs">
                                                    Amount
                                                </div>
                                            </td>
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    Master
                                                </div>
                                                <div class="text-xs">Card</div>
                                            </td>
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    Hugo Lavarack
                                                </div>
                                                <div class="text-xs">Pay</div>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-200">
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    7845 **** **** 5214
                                                </div>
                                                <div class="text-xs">
                                                    03 Dec 2022
                                                </div>
                                            </td>
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    $485.24
                                                </div>
                                                <div class="text-xs">
                                                    Amount
                                                </div>
                                            </td>
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    Stripe
                                                </div>
                                                <div class="text-xs">Card</div>
                                            </td>
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    Amber Scurry
                                                </div>
                                                <div class="text-xs">Pay</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    4257 **** **** 7852
                                                </div>
                                                <div class="text-xs">
                                                    12 Nov 2022
                                                </div>
                                            </td>
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    $8964.04
                                                </div>
                                                <div class="text-xs">
                                                    Amount
                                                </div>
                                            </td>
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    Maestro
                                                </div>
                                                <div class="text-xs">Card</div>
                                            </td>
                                            <td class="px-6 py-3">
                                                <div class="font-medium">
                                                    Caitlyn Gibney
                                                </div>
                                                <div class="text-xs">Pay</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-->
            </div>
        </main>
    </DashboardLayouts>
</template>

<script>
import DashboardLayouts from '../../Layouts/DashboardLayouts.vue'; // Sesuaikan path

export default {
    components: {
        DashboardLayouts,
    },
};
</script>
