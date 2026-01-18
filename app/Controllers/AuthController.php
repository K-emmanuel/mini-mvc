<?php

declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\User;

final class AuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion
     */
    public function login(): void
    {
        // Si déjà connecté, rediriger vers l'accueil
        if (isset($_SESSION['user_id'])) {
            header('Location: /');
            exit;
        }

        $this->render('auth/login', params: [
            'title' => 'Connexion - 6 7 LABUBU',
            'error' => $_SESSION['login_error'] ?? null
        ]);
        
        // Nettoyer les messages d'erreur
        unset($_SESSION['login_error']);
    }

    /**
     * Traite la connexion
     */
    public function doLogin(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /login');
            exit;
        }

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        // Validation
        if (empty($email) || empty($password)) {
            $_SESSION['login_error'] = 'Veuillez remplir tous les champs';
            header('Location: /login');
            exit;
        }

        // Vérifier les identifiants
        $user = User::findByEmail($email);
        
        if (!$user || !password_verify($password, $user['password'])) {
            $_SESSION['login_error'] = 'Email ou mot de passe incorrect';
            header('Location: /login');
            exit;
        }

        // Connexion réussie
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_nom'] = $user['nom'];
        $_SESSION['user_email'] = $user['email'];
        
        header('Location: /');
        exit;
    }

    /**
     * Affiche le formulaire d'inscription
     */
    public function register(): void
    {
        // Si déjà connecté, rediriger vers l'accueil
        if (isset($_SESSION['user_id'])) {
            header('Location: /');
            exit;
        }

        $this->render('auth/register', params: [
            'title' => 'Inscription - 6 7 LABUBU',
            'error' => $_SESSION['register_error'] ?? null,
            'success' => $_SESSION['register_success'] ?? null
        ]);
        
        // Nettoyer les messages
        unset($_SESSION['register_error']);
        unset($_SESSION['register_success']);
    }

    /**
     * Traite l'inscription
     */
    public function doRegister(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /register');
            exit;
        }

        $nom = trim($_POST['nom'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        // Validation
        if (empty($nom) || empty($email) || empty($password)) {
            $_SESSION['register_error'] = 'Veuillez remplir tous les champs';
            header('Location: /register');
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['register_error'] = 'Email invalide';
            header('Location: /register');
            exit;
        }

        if (strlen($password) < 6) {
            $_SESSION['register_error'] = 'Le mot de passe doit contenir au moins 6 caractères';
            header('Location: /register');
            exit;
        }

        // Vérifier si l'email existe déjà
        if (User::findByEmail($email)) {
            $_SESSION['register_error'] = 'Cet email est déjà utilisé';
            header('Location: /register');
            exit;
        }

        // Créer le compte
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $userId = User::create([
            'nom' => $nom,
            'email' => $email,
            'password' => $hashedPassword
        ]);

        if ($userId) {
            $_SESSION['register_success'] = 'Compte créé avec succès ! Vous pouvez maintenant vous connecter.';
            header('Location: /login');
        } else {
            $_SESSION['register_error'] = 'Erreur lors de la création du compte';
            header('Location: /register');
        }
        exit;
    }

    /**
     * Déconnexion
     */
    public function logout(): void
    {
        session_destroy();
        header('Location: /');
        exit;
    }

    /**
     * Page de compte utilisateur
     */
    public function account(): void
    {
        // Vérifier si connecté
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $user = User::findById($_SESSION['user_id']);

        $this->render('auth/account', params: [
            'title' => 'Mon Compte - 6 7 LABUBU',
            'user' => $user
        ]);
    }
}
