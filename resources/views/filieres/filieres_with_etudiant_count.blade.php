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
            {{-- Filières with Etudiant Count --}}
            <div style="padding: 1.5rem;">
                <h3 style="font-size: 1.5rem; font-weight: bold; color: #333; margin-bottom: 1rem;">Liste des Filières avec le Nombre d'Etudiants</h3>
                <div style="overflow-x: auto;">
                    <table style="width: 100%;">
                        <thead>
                            <tr style="background-color: #f2f2f2;">
                                <th style="border: 1px solid #ddd; padding: 8px;">Nom</th>
                                <th style="border: 1px solid #ddd; padding: 8px;">Nombre d'Etudiants</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($filieresWithCount as $filiere)
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $filiere->nom }}</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $filiere->etudiants_count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </x-app-layout>