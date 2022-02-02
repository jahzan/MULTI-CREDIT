<template>
    <div class="min-h-screen">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="relative bg-white">
            <div class="max-w-full mx-auto">
                <div
                    class="flex items-center justify-between px-4 py-1 border-b-2 border-gray-100 sm:px-6 md:justify-start md:space-x-10"
                >
                    <div class="flex justify-start lg:w-0 lg:flex-1">
                        <a href="#">
                            <span class="sr-only">Mutlicredito</span>
                            <img
                                src="http://creditos.fundacionmulticredito.com/images/multicredito.png"
                                alt=""
                                class="block w-auto h-14"
                            />
                        </a>
                        <div class="flex items-center h-16">
                            <div
                                class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex"
                            >
                                <a
                                    href="http://192.168.10.150:8000/"
                                    class="block py-1 pl-1 text-3xl font-medium text-blue-600 no-underline align-middle md:py-3"
                                >
                                    Multicredito
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="min-h-96">
            <slot></slot>
        </div>
        <div class="flex h-auto px-2 py-10 sm:px-28">
            <div class="h-full">
                <a class="text-indigo-700" href="https:\\www.fundacionmulticredito.com">Volver a la pagina</a>
            </div>
        </div>
    </div>
</template>