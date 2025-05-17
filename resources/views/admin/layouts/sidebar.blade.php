<aside class="bg-gray-800 text-white w-64 h-screen fixed left-0 top-14 overflow-y-auto">
    <div class="py-4">
        <ul class="space-y-2">
            <li>
                <a class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors" href="{{route('admin.categories.index')}}">
                    <i class="fa-solid fa-list mr-3"></i>
                    <span>{{__('Kategoriler')}}</span>
                </a>
            </li>
            <li>
                <a class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors" href="{{route('admin.books.index')}}">
                    <i class="fa-solid fa-book mr-3"></i>
                    <span>{{__('Kitaplar')}}</span>
                </a>
            </li>
            <li>
                <a class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors" href="{{route('admin.users.index')}}">
                    <i class="fa-solid fa-users mr-3"></i>
                    <span>{{__('Kullanıcılar')}}</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
