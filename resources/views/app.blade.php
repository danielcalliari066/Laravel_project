<x-layout>
    <div class="container mx-auto py-10 flex">
        <!-- Sidebar for filters -->
        <div class="w-1/4 bg-white shadow-md p-4 rounded-lg mr-8">
            <h2 class="text-xl font-bold mb-4">Filtra Studenti</h2>
            <form method="GET" action="{{ route('studenti.index') }}" class="space-y-4">
                <!-- Filter by Nome -->
                <div class="relative">
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input type="text" id="nome" name="nome" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" value="{{ request('nome') }}">
                    @if(request('nome'))
                        <span class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500" onclick="clearFilter('nome')">&times;</span>
                    @endif
                </div>

                <!-- Filter by Cognome -->
                <div class="relative">
                    <label for="cognome" class="block text-sm font-medium text-gray-700">Cognome</label>
                    <input type="text" id="cognome" name="cognome" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" value="{{ request('cognome') }}">
                    @if(request('cognome'))
                        <span class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500" onclick="clearFilter('cognome')">&times;</span>
                    @endif
                </div>

                <!-- Filter by Classe -->
                <div class="relative">
                    <label for="classe" class="block text-sm font-medium text-gray-700">Classe</label>
                    <input type="text" id="classe" name="classe" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" value="{{ request('classe') }}">
                    @if(request('classe'))
                        <span class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500" onclick="clearFilter('classe')">&times;</span>
                    @endif
                </div>

                <!-- Filter by Sezione -->
                <div class="relative">
                    <label for="sezione" class="block text-sm font-medium text-gray-700">Sezione</label>
                    <input type="text" id="sezione" name="sezione" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" value="{{ request('sezione') }}">
                    @if(request('sezione'))
                        <span class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500" onclick="clearFilter('sezione')">&times;</span>
                    @endif
                </div>

                <!-- Filter by Specializzazione -->
                <div class="relative">
                    <label for="specializzazione" class="block text-sm font-medium text-gray-700">Specializzazione</label>
                    <input type="text" id="specializzazione" name="specializzazione" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" value="{{ request('specializzazione') }}">
                    @if(request('specializzazione'))
                        <span class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500" onclick="clearFilter('specializzazione')">&times;</span>
                    @endif
                </div>

                <!-- Filter Button -->
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md mt-4">Filtra</button>
            </form>

            <!-- Button to Add New Student -->
            <div class="mt-6 w-full">
                <a href="{{ route('studenti.create') }}" class="block text-center w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md text-center">
                    Aggiungi Nuovo Studente
                </a>
            </div>

            <!-- Toggle Switch for Enable Actions -->
            <div class="mt-4 w-full">
                <label for="enable-actions" class="flex items-center justify-between bg-white border border-gray-300 rounded-md p-2 shadow-sm">
                    <span class="text-sm font-medium text-gray-700">Abilita Modifica/Elimina</span>
                    <div class="relative inline-block w-11 h-6">
                        <input type="checkbox" id="enable-actions" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-300 rounded-full peer peer-checked:bg-blue-600 transition-colors duration-300"></div>
                        <div class="absolute top-0.5 left-0.5 bg-white w-5 h-5 rounded-full transition-transform duration-300 peer-checked:translate-x-5"></div>
                    </div>
                </label>
            </div>
        </div>

        <!-- Table Section -->
        <div class="flex-1">
            <h1 class="text-2xl font-bold mb-6 text-center">Elenco Studenti</h1>
            <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg overflow-hidden">
                <thead class="bg-blue-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left">Matricola</th>
                        <th class="px-6 py-3 text-left">Cognome</th>
                        <th class="px-6 py-3 text-left">Nome</th>
                        <th class="px-6 py-3 text-left">Classe</th>
                        <th class="px-6 py-3 text-left">Sezione</th>
                        <th class="px-6 py-3 text-left">Specializzazione</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($studenti as $studente)
                    <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }}">
                        <td class="px-6 py-4">{{ $studente->ID }}</td>
                        <td class="px-6 py-4">{{ $studente->Cognome }}</td>
                        <td class="px-6 py-4">{{ $studente->Nome }}</td>
                        <td class="px-6 py-4">{{ $studente->Anno }}</td>
                        <td class="px-6 py-4">{{ $studente->Sezione }}</td>
                        <td class="px-6 py-4">{{ $studente->Specializzazione }}</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <a href="{{ route('studenti.edit', $studente->ID) }}"
                                class="edit-btn bg-yellow-500 text-white px-3 py-1 rounded opacity-50 pointer-events-none cursor-not-allowed">
                                Modifica
                             </a>

                            <form action="{{ route('studenti.destroy', $studente->ID) }}" method="POST"
                                  onsubmit="return confirm('Confermare eliminazione?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="delete-btn bg-red-600 text-white px-3 py-1 rounded disabled:opacity-50"
                                        disabled>Elimina</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-6">
                {{ $studenti->links() }}
            </div>
        </div>
    </div>

    <script>
        const toggle = document.getElementById('enable-actions');
        const editButtons = document.querySelectorAll('.edit-btn');
        const deleteButtons = document.querySelectorAll('.delete-btn');
    
        toggle.addEventListener('change', () => {
            const enabled = toggle.checked;

            editButtons.forEach(btn => {
                if (enabled) {
                    btn.classList.remove('opacity-50', 'pointer-events-none', 'cursor-not-allowed');
                } else {
                    btn.classList.add('opacity-50', 'pointer-events-none', 'cursor-not-allowed');
                }
            });

            deleteButtons.forEach(btn => {
                btn.disabled = !enabled;
                if (enabled) {
                    btn.classList.remove('opacity-50', 'cursor-not-allowed');
                } else {
                    btn.classList.add('opacity-50', 'cursor-not-allowed');
                }
            });
        });

        function clearFilter(field) {
            let url = new URL(window.location.href);
            url.searchParams.delete(field); // Remove the specific field filter
            window.location.href = url.toString(); // Redirect to the new URL with updated filters
        }
    </script>
</x-layout>
