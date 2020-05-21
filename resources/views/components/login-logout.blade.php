@if (Route::has('login'))
    <div class="space-x-4">
        @auth
            <a
                href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="ml-6 text-sm bg-red-900 px-3 py-1 rounded-full"
            >
                Log out
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth
@endif