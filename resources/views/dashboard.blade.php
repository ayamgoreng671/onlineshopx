<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex">
        <div class="absolute z-10 bg-gradient-to-t from-slate-900">
            <img class="w-screen" src="{{ asset('images/backgrounds/hero-image.png') }}">
        </div>
        <div class="absolute inset-0 flex items-center justify-center z-20 shadow-lg shadow-slate-100/75">
            <div class="text-center text-7xl font-medium text-white ">
                <h1>Welcome to Online-Shopx !</h1>
            </div>
        </div>
        <form class="absolute top z-20 flex flex-col items-center justify-center" action="" method="">
            @csrf
            @method('POST')
            <input type="search" class="rounded-lg border-2 border-amber-600 w-full">
        </form>
    </div>
    <div class="flex mx-auto">
        <div>

        </div>
    </div>
</x-app-layout>
<x-preview-image></x-preview-image>
