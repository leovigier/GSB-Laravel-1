<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Liste des fiches de frais de cet utilisateur')}}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach($Expenses as $Expense)
            <div class="py-1">
            <div class="max-w-7xl mx-auto sm-px-6 lg:px-8">
                <div class="bg-white overflow-hidder shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form method="get" action="modifyExpense">
                            <input type="text" name="moisExpense" value="{{$Expense->mois}}" readonly>
                            <input type="text" name="typeExpense" value="{{$Expense->FraisForfait_id}}" readonly>
                            <input type="text" name="qteExpense" value="{{$Expense->quantité}}" readonly>
                            <input type="submit" value="Modifier ma fiche de frais">
                        </form>
                    </div>
                </div>
            </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
