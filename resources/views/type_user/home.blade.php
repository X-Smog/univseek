<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-20 px-20">
        {{-- @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif --}}
        @if ($univ->count() > 0)
            @foreach ($univ as $cur)
                <div class="container flex flex-wrap gap-3 " style="width: 900px;">
                    <!-- Carte de chaque université -->
                    <div class="bg-white rounded-lg p-4 shadow-md mb-2">
                        <!-- Nom de l'école -->
                        <h3 class="text-lg font-semibold mb-2">{{ $cur->name }}</h3>

                        <!-- Adresse -->
                        <p class="text-gray-600 mb-2">{{ $cur->address }}</p>

                        <!-- Moyenne de notation et icône d'étoile -->
                        <div class="flex items-center mb-2">
                            <span class="text-gray-600 mr-2">Moyenne de notation:</span>
                            <div class="flex items-center">
                                <!-- Icône d'étoile -->
                                <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 2a1 1 0 0 1 .777.37l2.714 3.393a1 1 0 0 0 .776.37h4.69a1 1 0 0 1 .786 1.618l-3.42 4.185a1 1 0 0 0-.277.888l.848 5.098a1 1 0 0 1-1.45 1.054L10 17.347l-4.849 2.552a1 1 0 0 1-1.45-1.054l.848-5.098a1 1 0 0 0-.277-.888L.146 7.38A1 1 0 0 1 .932 5.76l4.69-.37a1 1 0 0 0 .776-.37l2.714-3.393A1 1 0 0 1 10 2z">
                                    </path>
                                </svg>
                                <!-- Moyenne de notation en texte -->
                                <span class="text-gray-600 ml-2">{{ $cur->average_mark }}</span>
                            </div>
                        </div>

                        <!-- Bouton pour voir plus de détails -->
                        <a href="{{route('type_user.show', $cur->id)}}"
                            class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-blue-600 inline-block">Voir plus
                            de
                            détails</a>
                    </div>

                </div>
            @endforeach
        @endif

</x-app-layout>
