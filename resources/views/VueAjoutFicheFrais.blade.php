<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Génération d\'une fiche de frais')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form id="submitRxpenseNuitee" action="{{route('ConfirmAjout')}}" method="POST">
                        @csrf
                        <h2>Renseignement Fiche des Frais de nuitée</h2>
                        <input type="text" name="visiteur" value="{{ Auth::user()->visiteur_id }}" readonly>
                        <input type="month" name="mois">
                        <input type="text" name="nuitee" placeholder="nombre de nuitée" required>
                        <input type="submit" class="myBtn" name="sub" value="Valider la note de frais">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form id="submitRxpenseRepas" action="{{route('ConfirmAjout')}}" method="POST">
                        @csrf
                        <h2>Renseignement Fiche des Frais de repas</h2>
                        <input type="text" name="visiteur" value="{{ Auth::user()->visiteur_id }}" readonly>
                        <input type="month" name="mois">
                        <input type="text" name="repas" placeholder="nombre de repas" required>
                        <input type="submit" class="myBtn" name="sub" value="Valider la note de frais">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form id="submitExpenseKm" action="{{route('ConfirmAjout')}}" method="POST">
                        @csrf
                        <h2>Renseignement Fiche des Frais de kilométrage</h2>
                        <input type="text" name="visiteur" value="{{ Auth::user()->visiteur_id }}" readonly>
                        <input type="month" name="mois">
                        <input type="text" name="Km" placeholder="nombre de Km" required>
                        <input type="submit" class="myBtn" name="sub" value="Valider la note de frais">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
