@extends('layouts.layout')



@section('content')
    <section class="container mx-auto my-5  min-h-screen">
        <div class="max-w-4xl mx-auto mt-10">
            <h2 class="text-2xl font-semibold mb-6">Sepetiniz</h2>

            @if(count($cart) > 0)
                <table class="w-full text-left border">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Ürün</th>
                        <th class="px-4 py-2">Adet</th>
                        <th class="px-4 py-2">Fiyat</th>
                        <th class="px-4 py-2">İşlem</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $id => $item)
                        <tr>
                            <td class="px-4 py-2">{{ $item['title'] }}</td>
                            <td class="px-4 py-2">{{ $item['quantity'] }}</td>
                            <td class="px-4 py-2">{{ $item['price'] * $item['quantity'] }} ₺</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button class="text-red-600 hover:underline">Kaldır</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <form action="{{ route('cart.clear') }}" method="POST" class="mt-6">
                    @csrf
                    <button class="px-4 py-2 bg-red-600 text-white rounded">Sepeti Temizle</button>
                </form>
            @else
                <p>Sepetiniz boş.</p>
            @endif
        </div>
    </section>
@endsection
