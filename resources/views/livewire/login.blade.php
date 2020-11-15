<form wire:submit.prevent="attemptLogin">
    <p class="text-red-500 p-1 pb-4">{{ $error }}</p>

    <input
        type="text"
        class="w-full px-2 py-1 border rounded mb-4"
        placeholder="E-Mail"
        wire:model="email"
    >

    <input
        type="password"
        class="w-full px-2 py-1 border rounded mb-4"
        placeholder="Password"
        wire:model="password"
    >

    <button
        type="submit"
        class="w-full rambo-button"
    >
        Login
    </button>
</form>
