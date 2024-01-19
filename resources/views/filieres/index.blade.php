<x-app-layout>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>

    <div style="padding: 3rem;">
        <div style="max-width: 800px; margin: 0 auto; padding: 2rem; border: 1px solid #ccc; border-radius: 8px;">
            {{-- Filières --}}
            <h3 style="font-size: 1.5rem; font-weight: bold; color: #333;">Liste des Filières</h3>
            <div style="text-align: center; overflow-x: auto;">
                <table style="width: 100%;">
                    <thead>
                        <tr style="background-color: #f2f2f2;">
                            <th style="border: 1px solid #ddd; padding: 8px;">ID</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Nom</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($filieres as $filiere)
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;">{{ $filiere->id }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px;">{{ $filiere->nom }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px;">
                                    <a href="{{ route('filieres.edit', $filiere->id) }}" style="margin-right: 10px;">Modifier</a>
                                    <form action="{{ route('filieres.destroy', $filiere->id) }}" method="post" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="cursor: pointer; color: #333; background: none; border: none;">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Lien vers la page de création --}}
            <div style="margin-top: 20px;">
                <a href="{{ route('filieres.create') }}" style="font-size: 1rem; color: #333;">Ajouter une Filière</a>
            </div>
        </div>
    </div>
</x-app-layout>
