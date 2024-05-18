<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Admin Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-20 px-20">
        <div class="bg-white p-5 rounded-xl shadow-lg">
            <ul role="list" class="divide-y divide-gray-100">
                @if ($users->count() > 0)

                    @foreach ($users as $cur)
                        <li class="flex justify-between gap-x-6 py-5">
                            <div class="flex min-w-0 gap-x-4">
                                <div class="bg-gray-200 flex justify-center p-2 h-10 w-10 rounded-full w-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                    </svg>

                                </div>

                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">{{ $cur->name }}
                                    </p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $cur->email }}</p>

                                </div>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-start">
                                <p class="text-sm leading-6 text-gray-900">Role</p>
                                <p class="mt-1 text-xs leading-5 text-gray-500">{{ $cur->usertype }}</p>
                            </div>
                            <div class="hidden lg:flex lg:flex-1 lg:justify-end lg:gap-2">
                                <a href="{{ route('users.show', $cur->id) }}"
                                    class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Details
                                </a>
                                <form action="{{ route('users.destroy', $cur->id) }} " method="POST" type="button"
                                    onsubmit="return confirm('Sure you want to delete ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="rounded-md bg-red-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Delete
                                    </button>
                                </form>

                                <a href="{{ route('users.edit', $cur->id) }}"
                                    class="rounded-md bg-gray-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300">Edit
                                </a>
                            </div>
                        </li>
                    @endforeach
                @endif

            </ul>
        </div>


</x-app-layout>
