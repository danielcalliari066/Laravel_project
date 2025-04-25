<x-layout>
    <div class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-semibold mb-4 text-center">Modifica Studente #{{ $studente->ID }}</h2>

        <!-- Form to Edit Student -->
        <form action="{{ route('studenti.update', $studente->ID) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nome -->
            <div class="mb-4">
                <label for="Nome" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" id="Nome" name="Nome" value="{{ old('Nome', $studente->Nome) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" required>
                @error('Nome')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Cognome -->
            <div class="mb-4">
                <label for="Cognome" class="block text-sm font-medium text-gray-700">Cognome</label>
                <input type="text" id="Cognome" name="Cognome" value="{{ old('Cognome', $studente->Cognome) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" required>
                @error('Cognome')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Anno -->
            <div class="mb-4">
                <label for="Anno" class="block text-sm font-medium text-gray-700">Anno</label>
                <input type="number" id="Anno" name="Anno" value="{{ old('Anno', $studente->Anno) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" required>
                @error('Anno')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Sezione -->
            <div class="mb-4">
                <label for="Sezione" class="block text-sm font-medium text-gray-700">Sezione</label>
                <input type="text" id="Sezione" name="Sezione" value="{{ old('Sezione', $studente->Sezione) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" required>
                @error('Sezione')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Specializzazione -->
            <div class="mb-4">
                <label for="Specializzazione" class="block text-sm font-medium text-gray-700">Sezione</label>
                <input type="text" id="Specializzazione" name="Specializzazione" value="{{ old('Specializzazione', $studente->Specializzazione) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" required>
                @error('Specializzazione')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mb-4">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md">Aggiorna Studente</button>
            </div>
        </form>

        <!-- Back Button -->
        <div class="mt-4">
            <a href="{{ route('home') }}" class="block w-full text-center bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md">Indietro alla Lista Studenti</a>
        </div>
    </div>
</x-layout>
