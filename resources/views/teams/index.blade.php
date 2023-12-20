<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestor de Equipas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>

                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Todas as equipas') }}
                            </h2>
                        </header>

                        <table class="mx-auto max-w-7xl sm:px-6 lg:px-8 w-full bg-grey border border-spacing-2 border-slate-500 shadow-md">

                            <thead>
                                <tr class="bg-gray-800 text-white">
                                    <th class="px-4 py-2">#</th>
                                    <th class="px-4 py-2">Nome</th>
                                    <th class="px-4 py-2">Funções</th>
                                </tr>
                            </thead>
                    
                            @foreach ($teams as $team)
                                
                                <tr>
                                    <td class="px-3 py-2 border border-slate-700">{{ $team->id}}</td>
                                    <td class="px-3 py-2 border border-slate-700">{{ $team->name}}</td>
                                    <td class="px-3 py-2 border border-slate-700"><x-secondary-button><a href="{{route('teams.edit', $team->id)}}"> Gerir </x-secondary-button></a>

                                </tr>

                            @endforeach
                            
                        </tbody>
                    
                        </table>


                    </section>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>