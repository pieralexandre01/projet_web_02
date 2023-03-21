<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Article;
use App\Models\Reservation;
use App\Models\User;
use App\Rules\UniqueEmailNotSoftDeleted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminController extends Controller
{

    /**
     * Affiche le dashboard de l'administrateur
     *
     */
    public function showDashboardAdmin() {
        return view('admin.dashboard', [
            "title" => "MW | Admin | Dashboard",
            "page" => "admin-dashboard",
            'user_admin' => User::withTrashed()->where('privilege_id', 1)->orderByRaw('deleted_at IS NULL ASC, deleted_at ASC')->get(),
            'articles' => Article::all(),
            'activities' => Activity::all(),
            'reservations' => Reservation::all(),
            'user_public' => User::withTrashed()->where('privilege_id', 2)->orderByRaw('deleted_at IS NULL ASC, deleted_at ASC')->get()
        ]);
    }

    /**
     * Affiche le formulaire de modification de compte Public
     *
     * Le formulaire a besoin des informations sur le user à modifier
     *
     * @param int $id Id du user à modifier
     */
    public function editUser($id) {
        return view('admin.form.modify.user', [
            "title" => "MW | User | Modify",
            "page" => "edit-user",
            "user" => User::findOrFail($id),
        ]);
    }

    /**
     * Affiche le formulaire de modification de compte Public
     *
     * Le formulaire a besoin des informations sur le user à modifier
     *
     * @param int $id Id du user à modifier
     */
    public function editAdmin($id) {
        return view('admin.form.modify.admin', [
            "title" => "MW | Admin | Modify",
            "page" => "edit-admin",
            "user" => User::findOrFail($id),
        ]);
    }

    /**
     * Traite la modification d'un user
     *
     * @param Request $request Données pour la modification
     * @param int $id Id du user à modifier
     */
    public function updateUser(Request $request, $id) {
        // Valider
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', new UniqueEmailNotSoftDeleted],
            'password' => 'required',
            'password_confirm' => 'required|same:password'
        ], [
            'first_name.required' => 'Your first name is required',
            'last_name.required' => 'Your last name is required',
            'email.required' => 'Your e-mail is required',
            'email.email' => 'Your e-mail must be valid',
            'password.required' => 'The password is required',
            'password_confirm.required' => 'The password confirmation is required',
            'password_confirm.same' => 'The password confirmation does not match the password entered'
        ]);

        // Création d'un nouvel utilisateur
        $user = User::findOrFail($id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        // Encryption du mot de passe
        $user->password = Hash::make($request->password);

        // Gère le type de user qui est en train de se créer un compte
        if($request->privilege_type == 'admin') {
            $user->privilege_id = 1;
        } elseif ($request->privilege_type == 'public') {
            $user->privilege_id = 2;
        }

        $user->save();

        return redirect()
            ->route('admin-dashboard')
            ->with('account-created', "The user's account has been modified succesfully");
    }

    /**
     * Soft delete (bloque) un utilisateur
     *
     * @param int $id
     * @return void
     */
    public function block($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin-dashboard')
            ->with('user-blocked-success', 'The user has been blocked successfully');
    }

    /**
     * Débloque un utilisateur
     *
     * @param int $id
     * @return void
     */
    public function unblock($id) {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();
        return redirect()
            ->route('admin-dashboard')
            ->with('user-unblocked-success', 'The user has been unblocked successfully.');
    }
}
