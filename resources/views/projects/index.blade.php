<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Mes Projets') }}
            </h2>
            <a href="{{ route('projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
                + Nouveau Projet
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm" role="alert">
                    <p class="font-bold">Succès</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($projects as $project)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex flex-col border border-gray-100 dark:border-gray-700">
                        <div class="p-6 flex-grow">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $project->name }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-3">
                                {{ $project->description ?? 'Aucune description fournie.' }}
                            </p>
                        </div>
                        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-900 flex justify-between items-center">
                            <a href="{{ route('projects.show', $project) }}" class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Voir détails &rarr;</a>

                            <div class="flex space-x-3 items-center">
                                <a href="{{ route('projects.edit', $project) }}" class="text-gray-600 hover:text-indigo-600 text-sm font-medium mr-4">Éditer</a>

                                <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Supprimer ce projet de manière définitive ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10 text-center">
                        <p class="text-gray-500 dark:text-gray-400 mb-4 text-lg">Vous n'avez pas encore de projet.</p>
                        <a href="{{ route('projects.create') }}" class="text-blue-600 hover:underline font-semibold">Commencez par en créer un !</a>
                    </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $projects->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
