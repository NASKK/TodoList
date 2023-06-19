<x-app-layout>
    <div class="bg-gradient-to-r from-purple-800 to-indigo-600 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-between">
            <div class="lg:text-center">
                <h2 class="text-xl leading-8 font-extrabold text-center text-white sm:text-4xl sm:leading-10 font-montserrat">
                    Bienvenue sur MyToTool !</br>Votre espace pour trier vos tâches de façon propre.
                </h2>
                <p class="mt-2 text-xl leading-7 text-white text-center font-medium">
                    Avec cette application web, vous allez pouvoir vous organiser de la meilleure des manières.
                </p>
            </div>
        </div>
    </div>
    <p class="text-white text-center font-black text-7xl"> MyToTool </p>
    <div class="flex flex-col pt-12 pb-12">
        <div class="-my-2 overflow-x-auto">
            <div class="mx-auto max-w-xs sm:max-w-5xl">
                <div class="py-2 sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <ul class="bg-transparent divide-y divide-gray-200">
                            <!-- Ajouter une tâche -->
                            <li class="px-6 py-4 flex items-center bg-white">
                                <form method="POST" action="{{ route('tasks.store') }}"
                                    class="flex flex-col sm:flex-row items-center justify-between w-full">
                                    @csrf
                                    <div class="flex flex-col sm:flex-row items-center">
                                        <div>
                                            <input type="text" name="name" placeholder="Nom de la tâche"
                                                class="border-2 border-purple-600 px-2 py-1 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-800 focus:border-transparent sm:mr-4">
                                            @error('name')
                                            <p class="text-red-500 text-xs mt-1">Le nom est obligatoire.</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <input type="text" name="description" placeholder="Description de la tâche"
                                                class="border-2 border-purple-600 px-2 py-1 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-800 focus:border-transparent sm:mr-4 mt-2 sm:mt-0">
                                            @error('description')
                                            <p class="text-red-500 text-xs mt-1">La description est obligatoire.</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <select name="status"
                                                class="border-2 border-purple-600 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-800 focus:border-transparent sm:mt-2 sm:ml-4 mb-2">
                                                <option value="A faire" class="text-red-500">A faire</option>
                                                <option value="En cours" class="text-amber-500">En cours</option>
                                                <option value="Terminé" class="text-green-500">Terminé</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="ml-auto mt-2 sm:mt-0">
                                        <button type="submit"
                                            class="w-10 h-10 bg-white hover:bg-gray-200 text-purple-600 font-bold rounded-full transition-colors duration-300 shadow-md">
                                            <i class="fas fa-plus-circle"></i>
                                        </button>
                                    </div>
                                </form>
                            </li>

                            <!-- Liste des tâches existantes -->
                            @foreach($tasks as $task)
                            <li class="px-6 py-4 bg-white mt-1">
                                <div class="flex flex-col sm:flex-row justify-between items-center">
                                    <div>
                                        <div class="text-2xl font-bold text-purple-700">
                                            {{ $task->name }}
                                        </div>
                                        <div class="py-4">
                                            <div
                                                class="whitespace-normal break-words text-sm font-medium sm:w-96">
                                                {{ $task->description }}</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center mt-2 sm:mt-0">
                                        @if($task->status === 'A faire')
                                        <div class="w-4 h-4 bg-red-500 rounded-full mx-2"></div>
                                        @elseif($task->status === 'En cours')
                                        <div class="w-4 h-4 bg-amber-500 rounded-full mx-2"></div>
                                        @elseif($task->status === 'Terminé')
                                        <div class="w-4 h-4 bg-green-500 rounded-full mx-2"></div>
                                        @endif
                                        <div
                                            class="text-md text-black font-medium mr-4 sm:mr-12">{{ $task->status }}</div>
                                        <div>
                                            <form method="GET" action="{{ route('tasks.edit', $task) }}"
                                                class="inline">
                                                @csrf
                                                <button type="submit"
                                                    class="w-10 h-10 bg-white hover:bg-gray-200 text-purple-600 font-bold rounded-full transition-colors duration-300 shadow-md">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('tasks.destroy', $task) }}"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="w-10 h-10 bg-white hover:bg-gray-200 text-red-600 font-bold rounded-full transition-colors duration-300 shadow-md"
                                                    onclick="confirmDeletion('{{ $task->name }}', '{{ route('tasks.destroy', $task) }}')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>