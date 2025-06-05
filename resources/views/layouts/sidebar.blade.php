<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<div class="fixed top-0 left-0 z-30 flex-col justify-between hidden w-64 h-screen p-6 transition-all duration-300 bg-purple-700 shadow-xl md:flex">
    <a href="{{ route('dashboard') }}" class="mb-6 text-2xl font-bold tracking-wide text-white transition-transform duration-200 hover:scale-105">
        {{ config('app.name') }}
    </a>
    <nav class="flex flex-col space-y-4">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
            class="flex items-center gap-3 px-5 py-3 text-lg rounded-xl font-semibold transition-all duration-200
            {{ request()->routeIs('dashboard')
                ? 'bg-white text-purple-700 shadow-lg scale-105'
                : 'text-white hover:bg-white hover:text-fuchsia-500/80 hover:scale-105' }}">
            <i class='text-2xl bx bx-home-alt'></i>
            Dashboard
        </x-nav-link>
        <x-nav-link :href="route('submissions.index')" :active="request()->routeIs('submissions.index')"
            class="flex items-center gap-3 px-5 py-3 text-lg rounded-xl font-semibold transition-all duration-200
            {{ request()->routeIs('submissions.index')
                ? 'bg-white text-purple-700 shadow-lg scale-105'
                : 'text-white hover:bg-white hover:text-fuchsia-500/80 hover:scale-105' }}">
            <i class='text-2xl bx bx-edit'></i>
            Pengajuan
        </x-nav-link>
        <x-nav-link :href="route('gaji.index')" :active="request()->routeIs('gaji.index')"
            class="flex items-center gap-3 px-5 py-3 text-lg rounded-xl font-semibold transition-all duration-200
            {{ request()->routeIs('gaji.index')
                ? 'bg-white text-purple-700 shadow-lg scale-105'
                : 'text-white hover:bg-white hover:text-fuchsia-500/80 hover:scale-105' }}">
            <i class='text-2xl bx bx-wallet'></i>
            Penggajian
        </x-nav-link>
        <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')"
            class="flex items-center gap-3 px-5 py-3 text-lg rounded-xl font-semibold transition-all duration-200
            {{ request()->routeIs('profile.edit')
                ? 'bg-white text-purple-700 shadow-lg scale-105'
                : 'text-white hover:bg-white hover:text-fuchsia-500/80 hover:scale-105' }}">
            <i class='text-2xl bx bx-cog'></i>
            Profile
        </x-nav-link>
    </nav>
    <form method="POST" action="{{ route('logout') }}" class="mt-8">
        @csrf
        <button type="submit" class="flex items-center justify-center w-full gap-2 py-3 text-lg font-semibold text-white transition-all duration-200 bg-red-500 rounded-xl hover:bg-red-600 hover:scale-105">
            <i class='text-2xl bx bx-log-out'></i>
            Log Out
        </button>
    </form>
</div>

<div class="fixed inset-x-0 bottom-0 z-30 flex justify-around p-2 bg-purple-700 shadow-xl md:hidden">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
        class="flex flex-col items-center justify-center text-sm font-semibold transition-all duration-200
        {{ request()->routeIs('dashboard')
            ? 'text-white' // Aktif: tetap putih
            : 'text-purple-200 hover:text-white' }}">
        <i class='text-2xl bx bx-home-alt'></i>
        <span>Home</span>
    </x-nav-link>
    <x-nav-link :href="route('submissions.index')" :active="request()->routeIs('submissions.index')"
        class="flex flex-col items-center justify-center text-sm font-semibold transition-all duration-200
        {{ request()->routeIs('submissions.index')
            ? 'text-white'
            : 'text-purple-200 hover:text-white' }}">
        <i class='text-2xl bx bx-edit'></i>
        <span>Ajuan</span>
    </x-nav-link>
    <x-nav-link :href="route('gaji.index')" :active="request()->routeIs('gaji.index')"
        class="flex flex-col items-center justify-center text-sm font-semibold transition-all duration-200
        {{ request()->routeIs('gaji.index')
            ? 'text-white'
            : 'text-purple-200 hover:text-white' }}">
        <i class='text-2xl bx bx-wallet'></i>
        <span>Gaji</span>
    </x-nav-link>
    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')"
        class="flex flex-col items-center justify-center text-sm font-semibold transition-all duration-200
        {{ request()->routeIs('profile.edit')
            ? 'text-white'
            : 'text-purple-200 hover:text-white' }}">
        <i class='text-2xl bx bx-cog'></i>
        <span>Profil</span>
    </x-nav-link>
    <form method="POST" action="{{ route('logout') }}" class="flex flex-col items-center justify-center text-sm font-semibold text-purple-200 transition-all duration-200 hover:text-white">
        @csrf
        <button type="submit" class="flex flex-col items-center justify-center">
            <i class='text-2xl bx bx-log-out'></i>
            <span>Keluar</span>
        </button>
    </form>
</div>