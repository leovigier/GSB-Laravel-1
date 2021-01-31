<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Liste des fiches de frais (Hors Forfaits) de cet utilisateur')}}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach($ExpensesBis as $Expense)
            <div class="py-1">
                <div class="max-w-7xl mx-auto sm-px-6 lg:px-8">
                    <div class="bg-white overflow-hidder shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form method="get" action="modifyExpenseBis">
                                <input type="text" name="moisExpense" value="{{$Expense->mois}}">
                                <input type="text" name="libelleExpense" value="{{$Expense->libelle}}">
                                <input type="text" name="dateExpense" value="{{$Expense->date}}">
                                <input type="text" name="montantExpense" value="{{$Expense->montant}}">
                                <input type="submit" value="Modifier ma fiche de frais">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>

