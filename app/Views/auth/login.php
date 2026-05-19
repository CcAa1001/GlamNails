<!DOCTYPE html>
<html>
<head>
    <title>Login - Glam Nails Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-gray-50 h-screen flex justify-center items-center">
    
    <div class="bg-white p-10 rounded-2xl shadow-xl w-full max-w-md border border-gray-100">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Welcome Back</h1>
            <p class="text-gray-400 text-sm mt-2">Enter your credentials to access the admin panel.</p>
        </div>
        
        <?php if(session()->getFlashdata('error')): ?>
            <div class="bg-red-50 border-l-4 border-red-500 text-red-600 p-4 rounded mb-6 text-sm flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('login/auth') ?>" method="POST" class="space-y-5">
            <div>
                <label class="block text-gray-700 text-xs font-bold mb-2 uppercase tracking-wide">Username</label>
                <input type="text" name="username" class="w-full p-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition bg-gray-50" placeholder="admin" required>
            </div>
            <div>
                <label class="block text-gray-700 text-xs font-bold mb-2 uppercase tracking-wide">Password</label>
                <input type="password" name="password" class="w-full p-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition bg-gray-50" placeholder="••••••••" required>
            </div>
            <button type="submit" class="w-full bg-black text-white font-bold py-4 rounded-xl hover:bg-gray-800 transition shadow-lg transform hover:-translate-y-1">SIGN IN</button>
        </form>
    </div>

</body>
</html>