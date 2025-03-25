<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>
        @hasSection('title')
            @yield('title') | {{ env('APP_NAME') }}
        @else
            {{ env('APP_NAME') }}
        @endif
    </title>
    @vite(['resources/js/app.js'])
</head>
<body class="flex flex-col h-screen justify-between">
<header>
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="text-xl font-bold text-indigo-600">Kitap Pazarı</a>
                </div>
                <div class="hidden md:flex md:items-center md:space-x-4">
                    <div class="relative group">
                        <button class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                            Roman
                            <svg class="w-4 h-4 ml-1 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden group-hover:block z-10">
                            <div class="py-1">
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Polisiye Roman</a>
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tarihî Roman</a>
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Macera Romanı</a>
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bilim Kurgu</a>
                            </div>
                        </div>
                    </div>

                    <div class="relative group">
                        <button class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                            Hikaye
                            <svg class="w-4 h-4 ml-1 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden group-hover:block z-10">
                            <div class="py-1">
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kısa Hikayeler</a>
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Çocuk Hikayeleri</a>
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Klasik Hikayeler</a>
                            </div>
                        </div>
                    </div>

                    <div class="relative group">
                        <button class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                            Kişisel Gelişim
                            <svg class="w-4 h-4 ml-1 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden group-hover:block z-10">
                            <div class="py-1">
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Motivasyon</a>
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kariyer</a>
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Liderlik</a>
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Psikoloji</a>
                            </div>
                        </div>
                    </div>

                    <div class="relative group">
                        <button class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                            Diğer
                            <svg class="w-4 h-4 ml-1 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden group-hover:block z-10">
                            <div class="py-1">
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Biyografi</a>
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Şiir</a>
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tarih</a>
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bilim</a>
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Felsefe</a>
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Çocuk Kitapları</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden md:flex md:items-center">
                    <div class="relative ml-3 group">
                        <button class="flex items-center text-sm rounded-full focus:outline-none">
                            <img class="h-8 w-8 rounded-full" src="https://via.placeholder.com/40" alt="Kullanıcı">
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden group-hover:block z-10">
                            <div class="py-1">
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profilimi Düzenle</a>
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Siparişlerim</a>
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Favorilerim</a>
                                <hr class="my-1">
                                <a href="{{route('comingSoon')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Çıkış Yap</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden fixed inset-0 bg-black bg-opacity-50 z-40">
            <div class="fixed inset-y-0 left-0 w-64 bg-white shadow-xl transform transition-transform duration-300 ease-in-out">
                <div class="flex items-center justify-between h-16 px-4 border-b">
                    <a href="/" class="text-xl font-bold text-indigo-600">Kitap Pazarı</a>
                    <button id="close-sidebar" class="p-2 rounded-md text-gray-500 hover:text-gray-900 hover:bg-gray-100">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="overflow-y-auto h-full pb-20">
                    <div class="px-4 py-3 border-b">
                        <div class="flex items-center">
                            <img class="h-10 w-10 rounded-full mr-3" src="https://via.placeholder.com/40" alt="Kullanıcı">
                            <div>
                                <div class="text-sm font-medium text-gray-900">Kullanıcı Adı</div>
                                <div class="text-xs text-gray-500">kullanici@email.com</div>
                            </div>
                        </div>
                    </div>

                    <div class="px-2 py-3">
                        <div class="space-y-1">
                            <div x-data="{ open: false }">
                                <button @click="open = !open" class="w-full flex justify-between items-center px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
                                    <span>Roman</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="open" class="pl-4 mt-1 space-y-1">
                                    <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Polisiye Roman</a>
                                    <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Tarihî Roman</a>
                                    <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Macera Romanı</a>
                                    <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Bilim Kurgu</a>
                                </div>
                            </div>

                            <div x-data="{ open: false }">
                                <button @click="open = !open" class="w-full flex justify-between items-center px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
                                    <span>Hikaye</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="open" class="pl-4 mt-1 space-y-1">
                                    <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Kısa Hikayeler</a>
                                    <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Çocuk Hikayeleri</a>
                                    <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Klasik Hikayeler</a>
                                </div>
                            </div>

                            <div x-data="{ open: false }">
                                <button @click="open = !open" class="w-full flex justify-between items-center px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
                                    <span>Kişisel Gelişim</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="open" class="pl-4 mt-1 space-y-1">
                                    <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Motivasyon</a>
                                    <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Kariyer</a>
                                    <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Liderlik</a>
                                    <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Psikoloji</a>
                                </div>
                            </div>

                            <div x-data="{ open: false }">
                                <button @click="open = !open" class="w-full flex justify-between items-center px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
                                    <span>Diğer</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="open" class="pl-4 mt-1 space-y-1">
                                    <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Biyografi</a>
                                    <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Şiir</a>
                                    <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Tarih</a>
                                    <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Bilim</a>
                                    <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Felsefe</a>
                                    <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Çocuk Kitapları</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t px-2 py-3">
                        <div class="space-y-1">
                            <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Profil</a>
                            <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Profilimi Düzenle</a>
                            <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Siparişlerim</a>
                            <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Favorilerim</a>
                            <hr class="my-1">
                            <a href="{{route('comingSoon')}}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Çıkış Yap</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeSidebarButton = document.getElementById('close-sidebar');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.remove('hidden');
                document.querySelector('#mobile-menu > div').classList.add('translate-x-0');
                document.querySelector('#mobile-menu > div').classList.remove('-translate-x-full');
            });

            closeSidebarButton.addEventListener('click', function() {
                document.querySelector('#mobile-menu > div').classList.add('-translate-x-full');
                document.querySelector('#mobile-menu > div').classList.remove('translate-x-0');
                setTimeout(function() {
                    mobileMenu.classList.add('hidden');
                }, 300);
            });

            mobileMenu.addEventListener('click', function(e) {
                if (e.target === mobileMenu) {
                    document.querySelector('#mobile-menu > div').classList.add('-translate-x-full');
                    document.querySelector('#mobile-menu > div').classList.remove('translate-x-0');
                    setTimeout(function() {
                        mobileMenu.classList.add('hidden');
                    }, 300);
                }
            });
        });
    </script>
    @push("js-stack")
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const profileButton = document.getElementById("user-menu-button");
                const dropdownMenu = document.getElementById("user-dropdown-menu");

                if (!profileButton || !dropdownMenu) {
                    console.error("Profil butonu veya dropdown menü bulunamadı!");
                    return;
                }

                profileButton.addEventListener("click", function () {
                    dropdownMenu.classList.toggle("hidden");
                });

                document.addEventListener("click", function (event) {
                    if (!profileButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                        dropdownMenu.classList.add("hidden");
                    }
                });
            });

        </script>
    @endpush
</header>
<section class="h-screen">
    @yield('body')
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">KitapDünyası</h3>
                    <p class="text-gray-300">İkinci el kitapların güvenilir adresi. Binlerce kitaba uygun fiyatlarla ulaşabilirsiniz.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Hızlı Erişim</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">Ana Sayfa</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Kategoriler</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">En Çok Satanlar</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Yeni Eklenenler</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Yardım</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">Sipariş Takibi</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">İade Koşulları</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Sıkça Sorulan Sorular</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">İletişim</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Bültenimize Abone Olun</h3>
                    <p class="text-gray-300 mb-3">Yeni eklenen kitaplardan haberdar olun</p>
                    <div class="flex">
                        <input type="email" placeholder="E-posta adresiniz" class="px-4 py-2 rounded-l-lg w-full focus:outline-none text-gray-800">
                        <button class="bg-blue-600 px-4 py-2 rounded-r-lg hover:bg-blue-700 transition duration-300">Abone Ol</button>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 KitapDünyası - Tüm hakları saklıdır.</p>
            </div>
        </div>
    </footer>
</section>
@stack('js-stack')


</body>
</html>
