<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();

        if($user->role == 'admin') {
            $totalLeads = \App\Models\Lead::count();
            $pendingLeads = \App\Models\Lead::where('status', 'Pending')->count();
            $convertedLeads = \App\Models\Lead::where('status', 'Converted')->count();
            $rejectedLeads = \App\Models\Lead::where('status', 'Rejected')->count();
            $recentLeads = \App\Models\Lead::latest()->take(5)->get();
        } else {
            $totalLeads = \App\Models\Lead::where('assigned_to', $user->id)->count();
            $pendingLeads = \App\Models\Lead::where('assigned_to', $user->id)->where('status', 'Pending')->count();
            $convertedLeads = \App\Models\Lead::where('assigned_to', $user->id)->where('status', 'Converted')->count();
            $rejectedLeads = \App\Models\Lead::where('assigned_to', $user->id)->where('status', 'Rejected')->count();
            $recentLeads = \App\Models\Lead::where('assigned_to', $user->id)->latest()->take(5)->get();
        }

        return view('dashboard', compact(
            'totalLeads',
            'pendingLeads',
            'convertedLeads',
            'rejectedLeads',
            'recentLeads'
        ));
    })->name('dashboard');

    Route::resource('leads', LeadController::class);
    Route::resource('users', UserController::class)->only(['index', 'create', 'store', 'destroy']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
