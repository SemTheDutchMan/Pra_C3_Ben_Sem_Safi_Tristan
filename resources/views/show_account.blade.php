<x-base-layout>

    @php
    $auth = auth()->user();
    $isEditingOther = $auth && $auth->isAdmin == 1 && $auth->id !== $user->id;
    @endphp

    <div class="edit_admin">
        <form action="{{ $isEditingOther ? route('profile.updateById', ['id' => $user->id]) : route('profile.update') }}" method="POST">
            @method('PATCH')
            @csrf

            <h1>{{ $user->name }}</h1>
            <p>{{ $user->email }}</p>

            <div class="form-group">
                <label for="isAdmin">Is een admin:</label>
                <input type="checkbox" id="isAdmin" name="isAdmin" value="1" {{ $user->isAdmin ? 'checked' : '' }}>
            </div>

            <div class="form-group">
                <button type="submit">Update Account</button>
            </div>
        </form>
    </div>

</x-base-layout>