<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
            <div class="text-center">
                <h1 class="text-5xl font-bold tracking-tight text-gray-900 sm:text-6xl">Need somewhere to study ?
                </h1>
                <p class="mt-6 text-lg leading-8 text-gray-600">Univseek is the platform which is going is to help
                    you find somewhere to study</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="{{route('adminhome')}}"
                        class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get
                        started</a>
                    <a href="" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span
                            aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
