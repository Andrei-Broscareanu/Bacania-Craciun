<!-- resources/views/livewire/notification.blade.php -->
<div x-data="{ show: false }" x-show="show" x-on:show-notification.window="show = true" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed top-0 right-0 m-4 p-4 bg-blue-500 text-white rounded shadow">
    {{ $message }}
    <button @click="show = false" class="absolute top-0 right-0 m-3 text-lg font-bold">&times;</button>
</div>
