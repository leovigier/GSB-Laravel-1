<?php

use App\Http\Controllers\ExpenseController;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/Expense/Generate', [ExpenseController::class, 'generateExpenseSheet'])->name('VueAjoutFicheFrais');
Route::post('/Expense/Generate/Verify', [ExpenseController::class, 'sendDataToDataBase'])->name('ConfirmAjout');
Route::post('/Expense/Generate/VerifyBis', [ExpenseController::class, 'sendDataToDataBaseBis'])->name('ConfirmAjoutBis');
Route::get('/Expense/ListForfaits', [ExpenseController::class, 'getAllExpenseOfCurrentUser'])->name('expenseList');
Route::get('/Expense/ListHorsForfaits', [ExpenseController::class, 'getAllExpenseOfCurrentUserBis'])->name('expenseListHF');
Route::get('/Expense/modifyExpense', [ExpenseController::class, 'modifyExpenseOfCurrentUser'])->name("modifyExpense");
Route::get('/Expense/modifyExpenseBis', [ExpenseController::class, 'modifyExpenseOfCurrentUserHF'])->name("modifyExpenseBis");
Route::get('/Expense/modifyExpense/apply', [ExpenseController::class, 'applyModifyExpenseOfCurrentUser'])->name("applyModifyExpense");
Route::get('/Expense/modifyExpenseBis/apply', [ExpenseController::class, 'applyModifyExpenseOfCurrentUserBis'])->name("applyModifyExpenseHF");
Route::get('/Expense/GenerateExpenseSheet', [ExpenseController::class, 'getValueToLoadOnPDF'])->name("PDFdownload");
Route::post("/Expense/GenerateExpenseSheet/Download", [ExpenseController::class, 'downloadPDF'])->name('download');
require __DIR__.'/auth.php';
