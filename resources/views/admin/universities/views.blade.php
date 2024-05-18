<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Admin Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-20 px-20">
        <div class="bg-white p-5 rounded-xl shadow-lg">
            <ul role="list" class="divide-y divide-gray-100">
                @if ($univ->count() > 0)

                    @foreach ($univ as $cur)
                        <li class="flex justify-between gap-x-6 py-5">
                            <div class="flex min-w-0 gap-x-4">
                                <div class="bg-gray-200 flex justify-center p-2 h-10 w-10 rounded-full w-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
                                    </svg>
                                </div>

                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">{{ $cur->name }}
                                    </p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $cur->email }}</p>

                                </div>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-start">
                                <p class="text-sm leading-6 text-gray-900">Locate at</p>
                                <p class="mt-1 text-xs leading-5 text-gray-500">{{ $cur->address }}</p>
                            </div>
                            <div class="hidden lg:flex lg:flex-1 lg:justify-end lg:gap-2">
                                <a href="{{ route('universities.show', $cur->id) }}"
                                    class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Details
                                </a>
                                <form action="{{ route('universities.destroy', $cur->id) }} " method="POST"
                                    type="button" onsubmit="return confirm('Sure you want to delete ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="rounded-md bg-red-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Delete
                                    </button>
                                </form>
                                
                                <a href="{{ route('universities.edit', $cur->id) }}"
                                    class="rounded-md bg-gray-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300">Edit
                                </a>
                            </div>
                        </li>
                    @endforeach
                @endif

            </ul>
        </div>


</x-app-layout>
