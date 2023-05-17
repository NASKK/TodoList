<x-app-layout>

<div class="bg-gradient-to-r from-purple-800 to-indigo-600 py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row items-center justify-between">
    <div class="lg:text-left lg:w-1/2">
      <h2 class="text-xl leading-8 font-extrabold text-white sm:text-4xl sm:leading-10 font-montserrat">
        Bienvenue sur MyToTool !</br>Votre espace pour trier vos tâches de façon propre.
      </h2>
      <p class="mt-2 text-xl leading-7 text-white font-medium">
        Avec cette application web, vous allez pouvoir vous organiser de la meilleure des manières.
      </p>
    </div>
    <div class="lg:w-1/2 mt-10 lg:mt-0">
      <img src="https://edenjob.fr/wp-content/uploads/2023/03/illu-edenjob2.png" alt="Description de l'image" class="w-60 mx-auto">
    </div>
  </div>
</div>
<p class="text-white text-center font-black text-7xl"> MyToTool </p>
<div class="flex flex-col pt-12 pb-12">
  <div class="-my-2 overflow-x-auto">
    <div class="mx-auto max-w-xs sm:max-w-6xl">
      <div class="py-2 sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <ul class="bg-transparent divide-y divide-gray-200">
          <!-- Ajouter une tâche -->
          <li class="px-6 py-4 flex items-center bg-white">
  <form method="POST" action="{{ route('tasks.store') }}" class="flex items-center justify-between w-full">
    @csrf
    <div class="flex items-center">
      <div>
        <input type="text" name="name" placeholder="Nom de la tâche" class="border-2 border-purple-600 px-2 py-1 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-800 focus:border-transparent mr-4">
      </div>
      <div>
        <input type="text" name="description" placeholder="Description de la tâche" class="border-2 border-purple-600 px-2 py-1 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-800 focus:border-transparent mr-4">
      </div>
      <div>
                    <select name="status" class="border-2 border-purple-600 px-8 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-800 focus:border-transparent">
                        <option value="A faire">A faire</option>
                        <option value="En cours">En cours</option>
                        <option value="Terminé">Terminé</option>
                    </select>
                    
                </div>
    </div>
    <div class="ml-auto">
      <button type="submit" class="w-10 h-10 bg-white hover:bg-gray-200 text-purple-600 font-bold rounded-full transition-colors duration-300 shadow-md">
        <i class="fas fa-plus-circle"></i>
      </button>
    </div>
  </form>
</li>

          <!-- Liste des tâches existantes -->
@foreach($tasks as $task)
    <li class="px-6 py-4 bg-white mt-1">
        <div class="flex justify-between items-center">
            <div>
                <div class="text-2xl font-bold text-purple-700">
                    {{ $task->name }}
                </div>
                <div class="py-4">
                    <div class="whitespace-normal break-words text-sm font-medium w-96">{{ $task->description }}</div>
                  </div>
            </div>
            <div class="flex items-center">
        @if($task->status === 'A faire')
          <div class="w-4 h-4 bg-red-500 rounded-full mx-2"></div>
        @elseif($task->status === 'En cours')
          <div class="w-4 h-4 bg-orange-500 rounded-full mx-2"></div>
        @elseif($task->status === 'Terminé')
          <div class="w-4 h-4 bg-green-500 rounded-full mx-2"></div>
        @endif
            <div class="text-md text-black font-medium mr-12">
              {{ $task->status }}
            </div>
            <div>
                <form method="GET" action="{{ route('tasks.edit', $task) }}" class="inline">
                    @csrf
                    <button type="submit" class="w-10 h-10 bg-white hover:bg-gray-200 text-purple-600 font-bold rounded-full transition-colors duration-300 shadow-md">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                </form>
                <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-10 h-10 bg-white hover:bg-gray-200 text-red-600 font-bold rounded-full transition-colors duration-300 shadow-md">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </li>
@endforeach

        </ul>
      </div>
    </div>
  </div>
</div>



</x-app-layout>