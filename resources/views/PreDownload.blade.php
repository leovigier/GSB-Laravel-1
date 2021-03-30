<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Génération d\'une fiche de frais -> information du mois')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="py-1">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{route('download')}}" method="post">
                            @csrf
                            <h2>Informations</h2>
                            <input type="month" name="moisFF" required><br/>
                            <input type="submit" value="Telecharger la fiche de frais du mois sélectionné">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
