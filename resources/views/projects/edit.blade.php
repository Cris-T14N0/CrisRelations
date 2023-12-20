<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Projetos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-grey shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form method="post" action="{{ route('projects.update', $project->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <x-input-label for="name" :value="__('Edite o NOME do seu projeto.')" />
                                <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="$project->name" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div>
                            <label for="state" class="block mb-2 text-sm font-medium text-gray-900, dark:text-white">Selecione o state</label></label>
                            <select id="state" name="state" class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @if ($project->state == "Em Projeto")

                                    <option value="Em Projeto">Em Projeto</option>
                                    <option value="Em Curso">Em Curso</option>
                                    <option value="Feito">Feito</option>

                                @elseif ($project->state == "Em Curso") 

                                    <option value="Em Curso">Em Curso</option>
                                    <option value="Em Projeto">Em Projeto</option>
                                    <option value="Feito">Feito</option>    

                                @else

                                    <option value="Feito">Feito</option>
                                    <option value="Em Curso">Em Curso</option>
                                    <option value="Em Projeto">Em Projeto</option>
                                    
                                @endif
                            </select>
                        </div>
                        <div>
                            <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900, dark:text-white">Selecione o User que vai se tornar dono do projeto</label></label>
                            <select id="user_id" name="user_id" class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ auth()->user()->id == $user->id ? 'selected' : ''}}>        {{$user->name}}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Alterar') }}</x-primary-button>
                            @if (session('sucesso'))
                                <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600 dark:text-gray-400"
                                >{{ Session::get('sucesso') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>