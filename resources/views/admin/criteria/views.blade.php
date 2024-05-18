<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Admin Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-20 px-20">
        <div class="bg-white p-5 rounded-xl shadow-lg">
            <ul role="list" class="divide-y divide-gray-100">
                @if ($criteria->count() > 0)

                    @foreach ($criteria as $cur)
                        <li class="flex justify-between gap-x-6 py-5">
                            <div class="flex min-w-0 gap-x-4">
                                <div class="bg-gray-200 flex justify-center p-2 h-10 w-10 rounded-full w-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                                    </svg>

                                </div>

                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">Criteria
                                    </p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $cur->name }}</p>

                                </div>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-start">
                                <p class="text-sm leading-6 text-gray-900">Description</p>
                                <p class="mt-1 text-xs leading-5 w-56 text-gray-500">{{ $cur->description }}</p>
                            </div>
                            <div class="hidden lg:flex lg:flex-1 lg:justify-end items-center lg:gap-2">
                                <button>
                                    <a href="{{ route('criteria.show', $cur->id) }}"
                                        class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Details
                                    </a>
                                </button>
                                <form action="{{ route('criteria.destroy', $cur->id) }} " method="POST" type="button"
                                    onsubmit="return confirm('Sure you want to delete ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="rounded-md bg-red-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Delete
                                    </button>
                                </form>
                                <button>
                                    <a href="{{ route('criteria.edit', $cur->id) }}"
                                        class="rounded-md bg-gray-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300">Edit
                                    </a>
                                </button>
                            </div>
                        </li>
                    @endforeach
                @endif

            </ul>
        </div>


</x-app-layout>
