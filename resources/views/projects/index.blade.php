<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestor de Projetos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>

                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Insira dos dados do seu novo projeto.') }}
                            </h2>
                        </header>

                        <form method="post" action="{{ route('projects.store') }}" class="mt-6 space-y-6">

                            @csrf

                            <div>
                                <x-input-label for="name" :value="__('Insira o NOME do seu projeto.')" />
                                <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="state" :value="__('Insira o ESTADO do seu projeto.')" />
                                <x-text-input id="state" name="state" type="text" class="block w-full mt-1" :value="old('state')" required autofocus autocomplete="state" />
                                <x-input-error class="mt-2" :messages="$errors->get('state')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Adicionar') }}</x-primary-button>
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
                        
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>

                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Os meus projetos') }}
                            </h2>
                        </header>

                        <table class="mx-auto max-w-7xl sm:px-6 lg:px-8 w-full bg-grey border border-spacing-2 border-slate-500 shadow-md">

                            <thead>
                                <tr class="bg-gray-800 text-white">
                                    <th class="px-4 py-2">#</th>
                                    <th class="px-4 py-2">Nome</th>
                                    <th class="px-4 py-2">Estado</th>
                                    <th class="px-4 py-2">Editar</th>
                                </tr>
                            </thead>
                    
                            @foreach ($projects as $project)

                                @if ($project->user->id == auth()->user()->id)
                                    <tr>
                                        <td class="px-3 py-2 border border-slate-700">{{ $project->id }}</td>
                                        <td class="px-3 py-2 border border-slate-700">{{ $project->name }}</td>
                                        <td class="px-3 py-2 border border-slate-700">{{ $project->state }}</td>
                                        <td class="px-3 py-2 border border-slate-700"> 
                                        <x-secondary-button><a href="{{route('projects.edit', $project->id)}}"> Gerir </x-secondary-button></a>
                                        </td>
                                    </tr>

                                @endif

                            @endforeach
                            
                        </tbody>
                    
                        </table>


                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>

                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Todos os projetos') }}
                            </h2>
                        </header>

                        <table class="mx-auto max-w-7xl sm:px-6 lg:px-8 w-full bg-white border border-spacing-2 border-slate-500 shadow-md">

                            <thead>
                                <tr class="bg-gray-800 text-white">
                                    <th class="px-4 py-2">#</th>
                                    <th class="px-4 py-2">Dono</th>
                                    <th class="px-4 py-2">Nome</th>
                                    <th class="px-4 py-2">Estado</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                    
                                @forelse ($projects as $project)
                    
                                    <tr class="bg-gray-800 text-white">
                                        
                                        <td class="px-4 py-2 border border-slate-700">{{ $project->id }}</td>
                                        <td class="px-4 py-2 border border-slate-700">{{ $project->user->name }}</td>
                                        <td class="px-4 py-2 border border-slate-700">{{ $project->name }}</td>
                                        <td class="px-4 py-2 border border-slate-700">{{ $project->state }}</td>
                                        
                    
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                    
                        </table>


                    </section>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>