<x-layout>
    <x-card>
        <form action="{{ route('employer.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-label for="name" required>Name</x-label>
                <x-input name="name" id="name" required />
            </div>
            <x-button  class="w-full">Create Employer</x-button>
        </form>
    </x-card>
</x-layout>
