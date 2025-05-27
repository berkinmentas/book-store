<section class="bg-gray-800 shadow-md fixed top-0 left-0 right-0 z-50">
    <nav class="relative">

        <div class="flex justify-between py-3 pr-5">
            <a href="{{route('admin.dashboard')}}">
                <div class="ps-4 pt-2">
                    <h5 class="text-lg text-white font-medium">Yönetim Paneli</h5>

                </div>
            </a>
            <div class="relative">
                @auth()
                    <button class="flex items-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors" id="dropdownMenuButton" onclick="toggleDropdown()">
                        <span><i class="fa-solid fa-user"></i></span>
                        <span class="ml-2">{{\Illuminate\Support\Facades\Auth::guard('web')->user()->name}}</span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50" id="userDropdown">
                        <form action="{{route('admin.logout')}}" method="get">
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">Çıkış yap</button>
                        </form>
                    </div>

                    <script>
                        function toggleDropdown() {
                            const dropdown = document.getElementById('userDropdown');
                            dropdown.classList.toggle('hidden');
                        }

                        window.addEventListener('click', function(e) {
                            if (!document.getElementById('dropdownMenuButton').contains(e.target)) {
                                document.getElementById('userDropdown').classList.add('hidden');
                            }
                        });
                    </script>
                @endauth
            </div>
        </div>
    </nav>
</section>
