<x-public.layout>
    <x-slot name="title"></x-slot>

    <style>
        :root {
            --active: var(--dark-pink);
            --active-hover: var(--vivid-pink);
        }

        .user_icon:hover,
        .user_icon:focus {
            background-image: url("../../media/icons/user_icon_pink.svg") !important;
        }

        .user_icon_connected {
            background-image: url("../../media/icons/user_icon_pink_connected.svg") !important;
        }

        .user_icon_connected:hover,
        .user_icon_connected:focus {
            background-image: url("../../media/icons/user_icon_pink_connected_hover.svg") !important;
        }
    </style>

    <x-public.header />

    <main></main>

    <x-public.footer />

</x-public.layout>
