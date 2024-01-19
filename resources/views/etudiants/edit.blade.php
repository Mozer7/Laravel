<x-app-layout>
    <style>
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .form-section {
            padding: 1.5rem;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }

        .form-label {
            font-size: 0.875rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .form-input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .form-select {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .form-button {
            background-color: #333;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="form-container">
                {{-- Étudiant --}}
                <div class="form-section">
                    <h3 class="text-lg font-medium text-gray-900">Étudiant</h3>
                    <p class="mt-1 text-sm text-gray-600">Modification d'Étudiant</p>

                    <form action="{{ isset($etudiant) ? route('etudiants.update', $etudiant->id) : route('etudiants.store') }}" method="post">
                        <div class="grid grid-cols-6 gap-6">
                            @csrf
                            @if(isset($etudiant))
                                @method('PUT')
                            @endif

                            <div class="col-span-6 sm:col-span-4">
                                <label class="form-label" for="nom">Nom de l'Étudiant:</label>
                                <input type="text" name="nom" class="form-input" value="{{ isset($etudiant) ? $etudiant->nom : '' }}" required>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label class="form-label" for="prenom">Prénom de l'Étudiant:</label>
                                <input type="text" name="prenom" class="form-input" value="{{ isset($etudiant) ? $etudiant->prenom : '' }}" required>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label class="form-label" for="sexe">Sexe de l'Étudiant:</label>
                                <select name="sexe" class="form-select" required>
                                    <option value="male" {{ isset($etudiant) && $etudiant->sexe == 'male' ? 'selected' : '' }}>Homme</option>
                                    <option value="female" {{ isset($etudiant) && $etudiant->sexe == 'female' ? 'selected' : '' }}>Femme</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label class="form-label" for="filiere_id">Filière de l'Étudiant:</label>
                                <select name="filiere_id" class="form-select" required>
                                    @foreach($filieres as $filiere)
                                        <option value="{{ $filiere->id }}" {{ isset($etudiant) && $etudiant->filiere_id == $filiere->id ? 'selected' : '' }}>{{ $filiere->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label class="form-label" for="user_id">Utilisateur associé:</label>
                                <select name="user_id" class="form-select" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ isset($etudiant) && $etudiant->user_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" class="form-button" wire:loading.attr="disabled" wire:target="photo">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
