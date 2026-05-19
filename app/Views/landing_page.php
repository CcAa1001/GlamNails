<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glam Nails - Luxury Beauty Salon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { 'glam-cream': '#F9F4ED', 'glam-dark': '#1A1A1A', 'glam-pink': '#F5D0FE' },
                    fontFamily: { serif: ['"Playfair Display"', 'serif'], sans: ['"Poppins"', 'sans-serif'] }
                }
            }
        }
    </script>
</head>
<body class="bg-glam-cream font-sans text-glam-dark antialiased">

    <?php if(session()->getFlashdata('success')): ?>
    <div class="fixed top-5 right-5 bg-green-500 text-white px-6 py-4 rounded-xl shadow-2xl z-50 flex items-center gap-3 animate-bounce">
        <i class="fa-solid fa-check-circle text-xl"></i> 
        <span class="font-bold"><?= session()->getFlashdata('success') ?></span>
    </div>
    <?php endif; ?>

    <nav class="container mx-auto px-6 py-4 flex justify-between items-center sticky top-0 bg-glam-cream/95 z-40 backdrop-blur-md shadow-sm transition-all">
        <div class="font-serif font-bold text-2xl tracking-tighter">Glam<span class="text-pink-500">Nails.</span></div>
        <div class="hidden md:flex space-x-8 font-medium text-sm tracking-widest text-gray-500">
            <a href="#home" class="hover:text-black transition">HOME</a>
            <a href="#services" class="hover:text-black transition">SERVICES</a>
            <a href="#reservation" class="hover:text-black transition text-pink-600 font-bold">RESERVATION</a>
        </div>
        <a href="<?= base_url('login') ?>" class="text-xs font-bold border border-black px-6 py-2 hover:bg-black hover:text-white transition uppercase tracking-widest rounded-full">Admin Login</a>
    </nav>

    <header class="container mx-auto px-6 py-16 md:py-24 grid md:grid-cols-2 gap-12 items-center" id="home">
        <div class="space-y-6">
            <span class="bg-pink-100 text-pink-600 text-xs font-bold px-3 py-1 rounded-full tracking-widest">PREMIUM SALON</span>
            <h1 class="text-5xl md:text-7xl font-serif leading-tight">Elevate Your <br> <span class="italic text-pink-500">Elegance</span></h1>
            <p class="text-gray-600 text-lg leading-relaxed">Experience the finest nail care and artistry in town.</p>
            <a href="#reservation" class="inline-block bg-black text-white px-8 py-4 text-sm font-bold hover:bg-gray-800 transition shadow-lg rounded-full tracking-widest">BOOK NOW</a>
        </div>
        <div class="relative">
            <div class="absolute -inset-4 bg-pink-200 rounded-full blur-2xl opacity-30"></div>
            <img src="https://images.unsplash.com/photo-1516975080664-ed2fc6a32937?q=80&w=800" class="relative w-full rounded-tr-[80px] rounded-bl-[80px] shadow-2xl object-cover h-[500px]">
        </div>
    </header>

    <section class="container mx-auto px-6 py-20 bg-white rounded-3xl" id="services">
        <div class="text-center mb-16">
            <p class="text-pink-500 text-xs font-bold tracking-widest mb-2">WHAT WE DO</p>
            <h2 class="text-4xl md:text-5xl font-serif">Our Services</h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach($services as $service): ?>
            <div class="group relative h-[450px] rounded-2xl overflow-hidden shadow-lg cursor-pointer hover:-translate-y-2 transition duration-500">
                <img src="<?= $service['image_url'] ?>" alt="<?= $service['name'] ?>" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-80"></div>
                <div class="absolute bottom-0 left-0 p-8 w-full text-white">
                    <h3 class="text-3xl font-serif mb-2"><?= $service['name'] ?></h3>
                    <p class="text-pink-300 font-bold mb-2 text-xl">Rp <?= number_format($service['price'], 0, ',', '.') ?></p>
                    <p class="text-sm text-gray-300 opacity-0 group-hover:opacity-100 transition duration-500">
                        <?= $service['description'] ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="container mx-auto px-6 py-20" id="reservation">
        <div class="bg-[#FCE7F3] rounded-[3rem] p-10 md:p-20 relative overflow-hidden">
            <div class="relative z-10 grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl md:text-6xl font-serif text-[#9D5C8F] mb-4">Book Your <br> Appointment</h2>
                    <p class="text-gray-600 mb-8 text-lg">Ready to shine? Fill out the form and we'll confirm your slot immediately.</p>
                </div>
                
                <form action="<?= base_url('book') ?>" method="POST" class="bg-white/90 backdrop-blur-md p-8 rounded-3xl shadow-xl space-y-4">
                    <input type="text" name="name" placeholder="Your Name" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-pink-300" required>
                    <input type="text" name="phone" placeholder="Phone Number (WhatsApp)" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-pink-300" required>
                    
                    <div class="flex gap-4">
                        <input type="datetime-local" name="time" class="w-2/3 bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-pink-300" required>
                        <input type="number" name="people" value="1" min="1" class="w-1/3 bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-pink-300" required>
                    </div>

                    <select name="service" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 outline-none cursor-pointer focus:ring-2 focus:ring-pink-300">
                        <?php foreach($services as $s): ?>
                            <option value="<?= $s['name'] ?>"><?= $s['name'] ?> - Rp <?= number_format($s['price']) ?></option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit" class="w-full bg-[#1A1A1A] text-white font-bold py-4 rounded-xl hover:bg-[#9D5C8F] transition duration-300 shadow-lg tracking-widest">CONFIRM BOOKING</button>
                </form>
            </div>
        </div>
    </section>

    <footer class="bg-black text-white py-12 text-center mt-12">
        <h2 class="font-serif text-2xl mb-4">Glam<span class="text-pink-500">Nails.</span></h2>
        <p class="text-gray-500 text-sm">&copy; 2024 GlamNails Luxury Salon. All rights reserved.</p>
    </footer>

</body>
</html>