<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $project->name }}
            </h2>
            <a href="{{ route('projects.index') }}" class="text-gray-500 hover:text-gray-700 font-medium">&larr; Retour aux projets</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white border-b pb-2 mb-4 border-gray-200 dark:border-gray-700">Description du projet</h3>
                <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line">
                    {{ $project->description ?? 'Aucune description fournie pour ce projet.' }}
                </p>
                <div class="mt-6 text-sm text-gray-500">
                    Créé le : {{ $project->created_at->format('d/m/Y à H:i') }}
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Tâches associées ({{ $project->tasks->count() }})</h3>
                </div>

                @if($project->tasks->count() > 0)
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($project->tasks as $task)
                            <li class="py-4 flex items-center justify-between">
                                <div class="flex flex-col">
                                    <span class="font-medium text-gray-900 dark:text-white {{ $task->is_completed ? 'line-through text-gray-400' : '' }}">
                                        {{ $task->title }}
                                    </span>

                                    <div class="flex mt-2 space-x-2">
                                        @foreach($task->tags as $tag)
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                                {{ $tag->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                                <span class="text-sm {{ $task->is_completed ? 'text-green-500 font-bold' : 'text-yellow-500 font-bold' }}">
                                    {{ $task->is_completed ? 'Terminée' : 'En cours' }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500 italic">Aucune tâche dans ce projet pour le moment.</p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
