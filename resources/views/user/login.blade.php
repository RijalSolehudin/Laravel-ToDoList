<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ToDoList</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .animate-fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-purple-600 via-blue-500 to-indigo-700 flex items-center justify-center p-4">
    <div class="animate-fade-in w-full max-w-md">
        <div class="glass rounded-2xl shadow-2xl p-8">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Welcome Back</h1>
                <p class="text-white/80">Sign in to your ToDoList account</p>
                @if($errors->has('error'))
                    <p class="text-red-300 mt-4">{{ $errors->first('error') }}</p>
                @endif
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-white/90 mb-2">Email Address</label>
                    <div class="relative">
                        <input type="email" id="email" name="email" required
                               class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all duration-200"
                               placeholder="Enter your email">
                        <svg class="absolute right-3 top-3.5 w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                    </div>
                    @error('email')
                        <p class="mt-1 text-red-300 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-white/90 mb-2">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required
                               class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all duration-200"
                               placeholder="Enter your password">
                        <svg class="absolute right-3 top-3.5 w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    @error('password')
                        <p class="mt-1 text-red-300 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-white/20 bg-white/10 text-white focus:ring-white/50">
                        <span class="ml-2 text-sm text-white/80">Remember me</span>
                    </label>
                    <a href="#" class="text-sm text-white/80 hover:text-white transition-colors">Forgot password?</a>
                </div>

                <button type="submit" class="w-full bg-white text-indigo-600 py-3 px-4 rounded-lg font-semibold hover:bg-white/90 focus:outline-none focus:ring-2 focus:ring-white/50 transition-all duration-200 transform hover:scale-105">
                    Sign In
                </button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-white/80">Don't have an account?
                    <a href="{{ route('register') }}" class="text-white font-semibold hover:underline">Sign up</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        // Simple animation for form elements
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input');
            inputs.forEach((input, index) => {
                input.style.animationDelay = `${index * 0.1}s`;
                input.classList.add('animate-fade-in');
            });
        });
    </script>
</body>
</html> 