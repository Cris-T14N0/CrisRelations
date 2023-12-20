<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestor de Contactos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>

                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Insira dos dados do novo contacto para o criar.') }}
                            </h2>
                        </header>

                        <form method="post" action="{{ route('contacts.store') }}" class="mt-6 space-y-6">

                            @csrf

                            <div>
                                <x-input-label for="phone" :value="__('Contacto (Número de telemóvel)')" />
                                <x-text-input id="phone" name="phone" type="text" class="block w-full mt-1" :value="old('phone')" required autofocus autocomplete="nome" />
                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                            </div>

                            <div>
                                <x-input-label for="address" :value="__('Morada')" />
                                <x-text-input id="address" name="address" type="text" class="block w-full mt-1" :value="old('address')" required autofocus autocomplete="nome" />
                                <x-input-error class="mt-2" :messages="$errors->get('address')" />
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

                        <table class="mx-auto max-w-7xl sm:px-6 lg:px-8 w-full bg-white border border-spacing-2 border-slate-500 shadow-md">

                            <thead>
                                <tr class="bg-gray-800 text-white">
                                    <th class="px-4 py-2">#</th>
                                    <th class="px-4 py-2">Nome</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Telefone</th>
                                    <th class="px-4 py-2">Morada</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($users as $user)

                                    <tr class="bg-gray-800 text-white">
                                        
                                        <td class="px-4 py-2 border border-slate-700">{{ $user->id }}</td>
                                        <td class="px-4 py-2 border border-slate-700">{{ $user->name }}</td>
                                        <td class="px-4 py-2 border border-slate-700">{{ $user->email }}</td>
                                        
                                        <td class="px-4 py-2 border border-slate-700">
                                            @if ($user->contact)
                                                {{ $user->contact->phone ?: 'N/A' }}
                                            @else
                                                N/A
                                            @endif
                                        </td>

                                        <td class="px-4 py-2 border border-slate-700">
                                            
                                            @if ($user->contact)
                                                {{ $user->contact->address ?: 'N/A' }}
                                            @else
                                                N/A
                                            @endif
                                        </td>

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