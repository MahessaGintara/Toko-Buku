<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-5 sm:rounded-lg">
                <div class="sm:flex sm:flex-row-reverse sm:justify-between">
                    <div class="flex justify-end relative sm:w-1/4 max-w-md">
                        <input class="border-2 mb-4 border-primary bg-red transition h-12 px-5 pr-12 rounded-md focus:outline-none w-full text-black text-lg " type="search" name="search" placeholder="Search" />
                        <button type="submit" class="absolute right-2 top-3 mr-2">
                            <svg class="text-black h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                            <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                            </svg>
                        </button>
                    </div>
                    <button class="mb-4 p-2 pl-5 pr-5 bg-blue-500 text-gray-100 text-md rounded-lg focus:border-4 border-blue-300">Tambah</button>
                </div>
                <div>

                    <article class="w-full sm:w-72 bg-white group relative rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform duration-200">
                        <div class="relative sm:w-full h-80 md:h-64 lg:h-44">
                            <img src="https://cdn.pixabay.com/photo/2021/07/24/01/42/zebra-dove-6488440_960_720.jpg"
                                alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug."
                                class="w-full h-full object-center object-cover">
                        </div>
                        <div class="px-3 py-4">
                            <h3 class="text-sm text-gray-500 pb-2">
                                <a class="bg-indigo-600 py-1 px-2 text-white rounded-lg" href="#">
                                    <span class="absolute inset-0"></span>
                                    Basic Level
                                </a>
                            </h3>
                            <p class="text-base font-semibold text-gray-900 group-hover:text-indigo-600">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}
</x-app-layout>
