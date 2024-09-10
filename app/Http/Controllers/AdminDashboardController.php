<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Récupérer tous les utilisateurs ayant le rôle 'client'
        $clients = User::where('role', 'client')->get();

        // Passer les utilisateurs à la vue
        return view('admin.dashboard', ['clients' => $clients]);
    }


    public function edit($id){
        $clients = User::where('id', $id)->get();
        return view('admin.edit', ['clients'=>$clients]);
    }

    public function updateButtonPermissions(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->button_permissions = json_encode($request->input('button_permissions'));
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Permissions mises à jour.');
    }



    public function destroy($id)
    {
        // Trouver l'utilisateur par son ID et le supprimer
        $user = User::findOrFail($id);
        $user->delete();

        // Rediriger vers le tableau de bord avec un message de succès
        return redirect()->route('admin.dashboard')->with('success', 'l\'utilisateur a été supprimé avec succès!');
    }
}
