<x-app-layout>

    @php
    $auth = auth()->user();
    $isEditingOther = $auth && $auth->isAdmin == 1 && $auth->id !== $user->id;
    @endphp

    <main style="max-width: 720px; margin: 40px auto; padding: 0 20px 60px; min-height: 70vh; display: grid; gap: 16px;">
        <header style="display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap; margin-bottom: 4px; padding: 16px; border-radius: 14px; background: linear-gradient(135deg, #ec4899, #d946ef); color: #fff; box-shadow: 0 14px 28px rgba(0,0,0,0.12);">
            <div>
                <span style="display: inline-block; margin: 0 0 6px; background: rgba(255,255,255,0.16); color: #ffe4f3; padding: 6px 10px; border-radius: 999px; font-weight: 700; font-size: 12px; letter-spacing: 0.08em; text-transform: uppercase;">Account</span>
                <h1 style="margin: 0; font-size: 28px;">{{ $user->name }}</h1>
                <p style="margin: 6px 0 0; color: #ffe4f3;">{{ $user->email }}</p>
            </div>
            <span style="background: #fdf2f8; color: {{ $user->isAdmin ? '#7e1f6b' : '#4338ca' }}; padding: 8px 12px; border-radius: 12px; font-weight: 700; font-size: 13px; box-shadow: inset 0 1px 0 rgba(255,255,255,0.4);">{{ $user->isAdmin ? 'Admin' : 'Gebruiker' }}</span>
        </header>

        <form action="{{ $isEditingOther ? route('profile.updateById', ['id' => $user->id]) : route('profile.update') }}" method="POST" style="background: #fff7fb; border: 1px solid #f3e8ff; border-radius: 14px; padding: 20px; box-shadow: 0 12px 24px rgba(0,0,0,0.08); display: flex; flex-direction: column; gap: 14px;">
            @method('PATCH')
            @csrf

            <div>
                <label for="isAdmin" style="display: flex; align-items: center; gap: 10px; font-weight: 700; color: #7e1f6b;">
                    <input type="checkbox" id="isAdmin" name="isAdmin" value="1" {{ $user->isAdmin ? 'checked' : '' }} style="width: 18px; height: 18px;">
                    Admin rechten toekennen
                </label>
                <p style="margin: 4px 0 0; color: #6b7280; font-size: 14px;">Schakel in om deze gebruiker beheerdersrechten te geven.</p>
            </div>

            <div style="display: flex; gap: 10px; justify-content: flex-end; flex-wrap: wrap;">
                <button type="submit" class="btn-details" style="padding: 10px 14px; min-width: 160px;">Opslaan</button>
            </div>
        </form>
    </main>

</x-app-layout>