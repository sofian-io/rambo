<div class="card">
    <form wire:submit.prevent="attemptLogin">
        <p class="auth-form-error">{{ $error }}</p>

        <input
            type="text"
            placeholder="E-Mail"
            wire:model="email"
        >

        <input
            type="password"
            placeholder="Password"
            wire:model="password"
        >

        <input
            type="submit"
            value="Login"
        >
    </form>
</div>
