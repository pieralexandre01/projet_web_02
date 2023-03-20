<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/activities</x-slot>

    <style>
        :root {
            --color: var(--dark-pink);
            --color-hover: var(--vivid-pink);
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

    <x-public.header :page="$page" />

    <main></main>

    <x-public.footer />

</x-public.layout>
