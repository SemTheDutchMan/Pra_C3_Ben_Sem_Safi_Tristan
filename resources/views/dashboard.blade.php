<x-app-layout>

    <div class="p-6 text-gray-900">
        @if($user->isAdmin)
        <div class="adminDashboard">
            <div class="adminAccs">
                <h2>Alle admin accounts:</h2>
                <ul>
                    @foreach($all as $usr)
                    @if ($usr->isAdmin == 1)
                    <li> <a href="{{ route('profile.show', $usr->id) }}"> {{ $usr->name }} - {{ $usr->email }}</a></li>
                    @endif

                    @endforeach
                </ul>
            </div>


            <div class="nonAdminAccs">
                <h2>Alle non-admin accounts:</h2>
                <ul>
                    @foreach($all as $usr)
                    @if ($usr->isAdmin == 0)
                    <li> <a href="{{ route('profile.show', $usr->id) }}"> {{ $usr->name }} - {{ $usr->email }}</a></li>
                    @endif

                    @endforeach
                </ul>
            </div>


            <div class="inschrijvingen">
                <h2>Alle inschrijvingen:</h2>
                <ul>
                    @foreach($inschrijvingen as $inschrijving)
                    <li><a href="{{ route('school.show', $inschrijving->id) }}">{{ $inschrijving->name }} - {{ $inschrijving->email }} ({{ $inschrijving->referee_email }})</a></li>
                    @endforeach
            </div>
            <div class="contactMessages">
                <h2>Alle contact berichten:</h2>
                <ul>
                    @foreach($contact as $bericht)
                    <li><a href="{{ route('contact.show', $bericht->id) }}">{{ $bericht->name }} - {{ $bericht->email }}</a></li>
                    @endforeach
                </ul>
            </div>
            @else
            <h1>Access Denied</h1>
            <p>You do not have permission to access this page.</p>
            @endif
        </div>

</x-app-layout>