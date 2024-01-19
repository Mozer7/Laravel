<x-app-layout>
    <div style="padding: 3rem;">
        <div style="max-width: 800px; margin: 0 auto; padding: 2rem; border: 1px solid #ccc; border-radius: 8px;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 1.5rem;">
                <div style="padding: 0 0.5rem;">
                    <h3 style="font-size: 1.5rem; font-weight: bold; color: #333;">Filiere</h3>
                    <p style="margin-top: 0.5rem; font-size: 0.875rem; color: #666;">Modifier une filiere.</p>
                </div>
                <div style="padding: 0 0.5rem;"></div>
            </div>

            <form action="{{ isset($filiere) ? route('filieres.update', $filiere->id) : route('filieres.store') }}" method="post">
                <div style="padding: 1.5rem; background-color: #fff; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); border-radius: 4px;">
                    <div style="display: grid; grid-template-columns: repeat(6, 1fr); gap: 1rem;">
                        <!-- Name -->
                        <div style="grid-column: span 6;">
                            @csrf
                            @if(isset($filiere))
                                @method('PUT')
                            @endif
                            <label style="font-size: 0.875rem; font-weight: bold; color: #333;">Nom:</label>
                            <input style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px;" id="nom" name="nom" type="text" value="{{ isset($filiere) ? $filiere->nom : '' }}">
                        </div>
                    </div>
                </div>

                <div style="display: flex; justify-content: flex-end; margin-top: 1.5rem;">
                    <button type="submit" style="background-color: #333; color: #fff; padding: 0.5rem 1rem; border: none; border-radius: 4px; font-weight: bold; cursor: pointer;">
                        Modifier
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>