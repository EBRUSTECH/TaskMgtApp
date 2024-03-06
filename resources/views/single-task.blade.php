<x-app-layout>
    <div id="app" data-example-route="{{ route('edit-task', $id) }}">
        <task :task="{{$task}}"></task>
    </div>

</x-app-layout>
