<x-base-layout>

    @if($user->isAdmin)

    <div class="adminAccs">
        <h2>All admin accounts:</h2>
        <ul>
            @foreach($all as $usr)
            @if ($usr->isAdmin == 1)
            <li> <a href="{{ route('profile.show', $usr->id) }}"> {{ $usr->name }} - {{ $usr->email }}</a></li>
            @endif

            @endforeach
        </ul>
    </div>
    <div class="nonAdminAccs">
        <h2>All Non-admin accounts:</h2>
        <ul>
            @foreach($all as $usr)
            @if ($usr->isAdmin == 0)
            <li> <a href="{{ route('profile.show', $usr->id) }}"> {{ $usr->name }} - {{ $usr->email }}</a></li>
            @endif

            @endforeach
        </ul>
    </div>
    @else
    <h1>Access Denied</h1>
    <p>You do not have permission to access this page.</p>
    @endif


</x-base-layout>