<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2 class="font-bold text-lg">{{ $job->title }}</h2>
    
    <p>
        This job pays {{ $job->salary }} per year.
    </p>

    <p class="mt-5">
        @can('edit', $job)
            <x-button href="/jobs/{{ $job->id }}/edit">
                Edit Job
            </x-button>            
        @endcan
        <div class="mt-1">
            <x-form-error name='edit'/>
        </div>
    </p>
</x-layout>