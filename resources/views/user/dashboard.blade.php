{{-- Ce dashboard est celui du "client" --}}

<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/dashboard</x-slot>

    <style>
        :root {
            --color: var(--dark-turquoise);
            --color-hover: var(--vivid-turquoise);
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

    <x-public.header :page="$page" />

    <main>
        <p>Dashboard</p>
    </main>

    <x-public.footer />

</x-public.layout>
