<aside class="w-72 bg-white border-r border-gray-200 h-screen fixed left-0 top-0 overflow-y-auto flex flex-col z-30">
    <div class="h-24 flex items-center px-8 border-b border-gray-50">
        <h1 class="text-2xl font-serif font-bold tracking-tighter">Glam<span class="text-pink-500">Admin.</span></h1>
    </div>
    
    <nav class="flex-1 px-4 py-8 space-y-2">
        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4 px-4">Overview</p>
        
        <a href="<?= base_url('admin/dashboard') ?>" class="flex items-center gap-4 px-4 py-3 text-gray-600 rounded-xl hover:bg-pink-50 hover:text-pink-600 transition group">
            <div class="w-8 h-8 rounded-lg bg-gray-100 group-hover:bg-pink-200 flex items-center justify-center text-gray-500 group-hover:text-pink-600 transition"><i class="fa-solid fa-chart-pie"></i></div>
            <span class="text-sm font-semibold">Dashboard</span>
        </a>

        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4 mt-8 px-4">Management</p>

        <a href="<?= base_url('admin/reservations') ?>" class="flex items-center gap-4 px-4 py-3 text-gray-600 rounded-xl hover:bg-pink-50 hover:text-pink-600 transition group">
            <div class="w-8 h-8 rounded-lg bg-gray-100 group-hover:bg-pink-200 flex items-center justify-center text-gray-500 group-hover:text-pink-600 transition"><i class="fa-solid fa-calendar-check"></i></div>
            <span class="text-sm font-semibold">Reservations</span>
        </a>

        </nav>

    <div class="p-6 border-t border-gray-50">
        <a href="<?= base_url('logout') ?>" class="flex items-center gap-3 px-4 py-3 text-red-500 bg-red-50 rounded-xl hover:bg-red-100 transition justify-center">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> <span class="text-sm font-bold">Logout</span>
        </a>
    </div>
</aside>