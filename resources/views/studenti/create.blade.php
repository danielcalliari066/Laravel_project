<x-layout>
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Aggiungi Nuovo Studente</h1>

        <form action="{{ route('studenti.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="Cognome" class="block text-sm font-medium text-gray-700">Cognome</label>
                <input type="text" name="Cognome" id="Cognome" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div>
                <label for="Nome" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="Nome" id="Nome" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div>
                <label for="Anno" class="block text-sm font-medium text-gray-700">Classe</label>
                <input type="text" name="Anno" id="Anno" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div>
                <label for="Sezione" class="block text-sm font-medium text-gray-700">Sezione</label>
                <input type="text" name="Sezione" id="Sezione" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div>
                <label for="Specializzazione" class="block text-sm font-medium text-gray-700">Specializzazione</label>
                <input type="text" name="Specializzazione" id="Specializzazione" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md">
                    Salva Studente
                </button>
            </div>
        </form>
        <div class="mt-6 text-center">
            <a href="{{ route('home') }}" class="text-white bg-gray-500 hover:bg-gray-600 py-2 px-4 rounded-md">
                Indietro alla Lista Studenti
            </a>
        </div>
    </div>
</x-layout>
