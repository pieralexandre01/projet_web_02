<x-public.layout>
    {{-- <x-slot name="titre"></x-slot> --}}
    <form action="{{ route('login') }}" method="post">
        @csrf
        <input name="email" type="text">
        <input name="password" type="password">
        <input type="submit">
    </form>

</x-public.layout>
