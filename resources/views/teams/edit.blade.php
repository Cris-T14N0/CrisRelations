<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Equipa') }}
        </h2>
    </x-slot>

    <div class="mx-auto mt-3 max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Lista de Users Disponiveis') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Listagem de users que não pertencem à equipa.") }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('teams.update', $team->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900, dark:text-white">Selecione o User que vai adicionar a equipa</label></label>
                        <select multiple id="user_id" name="user_id[]" class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($usersNotInTeam as $user)
                                <option value="{{ $user->id }}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <div class="flex items-center gap-4 pt-4">
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

    <div class="mx-auto mt-3 max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Lista de Users Disponiveis') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Listagem de users que não pertencem à equipa.") }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('teams.remove', $team->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900, dark:text-white">Selecione o User que vai adicionar a equipa</label></label>
                        <select multiple id="user_id" name="user_id[]" class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($usersInTeam as $user)
                                <option value="{{ $user->id }}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <div class="flex items-center gap-4 pt-4">
                            <x-primary-button>{{ __('Remover') }}</x-primary-button>
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
</x-app-layout>