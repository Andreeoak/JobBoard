<x-layout>
    <x-card>
        <form action="{{ route('employer.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-label for="company_name" required>Nome da empresa</x-label>
                <x-text-input name="company_name" id="company_name" required />
            </div>
            <x-button  class="w-full">Create Employer</x-button>
        </form>
    </x-card>
</x-layout>
