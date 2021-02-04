<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Liste des fiches de frais de cet utilisateur')}}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach($modifyExpenses as $modif)
        <div class="max-w-7xl mx-auto sm-px-6 lg:px-8">
            <div class="bg-white overflow-hidder shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="get" action="{{route('applyModifyExpense')}}">
                        <input type="text" name="moisModif" value="{{$modif->mois}}" readonly>
                        <input type="text" name="typeModif" value="{{$modif->FraisForfait_id}}" readonly>
                        <input type="text" name="qteModif" value="{{$modif->quantite}}">
                        <input type="submit" value="Valider mes modifications">
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
