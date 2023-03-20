{{-- Ce dashboard est celui du "client" --}}

<x-public.layout>
    {{-- <x-slot name="title"></x-slot> --}}

    <style>
        :root {
            --active: var(--dark-turquoise);
            --active-hover: var(--vivid-turquoise);
        }

        .user_icon:hover,
        .user_icon:focus {
            background-image: url("../../media/icons/user_icon_turquoise.svg") !important;
        }

        .user_icon_connected {
            background-image: url("../../media/icons/user_icon_turquoise_connected.svg") !important;
        }

        .user_icon_connected:hover,
        .user_icon_connected:focus {
            background-image: url("../../media/icons/user_icon_turquoise_connected_hover.svg") !important;
        }
    </style>

    <x-public.header />

    <main>
        <p>Dashboard</p>
    </main>

    <x-public.footer />

</x-public.layout>
