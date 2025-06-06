<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PDO;

class AuthController extends Controller
{
    
    public function showLoginForm()
    {
        return view('login'); // Blade view in resources/views/
    }
    public function login(Request $request)
    {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=laravel",'root','');
            $stmt = $pdo->prepare("SELECT * FROM authentication WHERE email = ?");
            $stmt->execute([$request->email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$user) {
                return back()->withErrors(['Email not found']);
            }
            
            if ($user['password'] == $request->password) {
                session(['user' => $user['name']]);
                return redirect('welcome');
            }
            
            return back()->withErrors(['Invalid password']);
        } catch (\PDOException $e) {
            return back()->withErrors(['Database error: Please try again later']);
        } catch (\Exception $e) {
            return back()->withErrors(['An error occurred. Please try again']);
        }
    }
    public function showSignupForm()
    {
        return view('signup');
    }
    public function signup(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password'
            ]);

            $pdo = new PDO("mysql:host=localhost;dbname=laravel", 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Add this line

            // Check if email exists
            $checkStmt = $pdo->prepare("SELECT email FROM authentication WHERE email = ?");
            $checkStmt->execute([$request->email]);
            if ($checkStmt->fetch()) {
                return back()->withErrors(['email' => 'Email already registered'])->withInput();
            }

            // Insert new user
            $stmt = $pdo->prepare("INSERT INTO authentication (name, email, password) VALUES (?, ?, ?)");
            $success = $stmt->execute([
                $validated['name'],
                $validated['email'],
                $validated['password']
            ]);

            if (!$success) {
                Log::error('Database insert failed');
                return back()->withErrors(['database' => 'Failed to create account'])->withInput();
            }

            session([
                'user' => $validated['name'],
                'email' => $validated['email']
            ]);

            return redirect('/signin')->with('success', 'Registration successful!');

        } catch (\PDOException $e) {
            Log::error('Database error during signup: ' . $e->getMessage());
            return back()->withErrors(['database' => 'Database error: ' . $e->getMessage()])->withInput();
        } catch (\Exception $e) {
            Log::error('General error during signup: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()])->withInput();
        }
    }
    }
