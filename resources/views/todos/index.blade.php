<div class='flex space-x-12'>
    <h1 class='text-3xl'>Tasks</h1>

    @include('todos.create')
</div>
<ul role="list" class="divide-y divide-white/5">
    <li class="flex justify-between gap-x-6 py-5">
        <p class="basis-1/5">Is Completed</p>
        <p class="basis-1/5">Title</p>
        <p class="basis-1/5">Description</p>
        <p class="basis-1/5"></p>
        <p class="basis-1/5"></p>
    </li>
    @foreach ($project->todos as $todo)
    <li class="flex justify-between gap-x-6" style="padding: 10px;">
        <div class="basis-1/5">
            <form action="{{ route('todos.toggle', $todo->id) }}" method="post">
                @csrf
                @method("PATCH")
                
                <button>
                    @if($todo->is_completed)
                        @include('components.task-completed')
                    @else
                        @include('components.task-uncompleted')
                    @endif
                </button>
            </form>
        </div>
        <div class="basis-1/5">
            <p class="text-sm/6 font-semibold text-white">{{ $todo->title }}</p>
        </div>
        <div class="basis-1/5">
            <p class="text-sm/6 font-semibold text-white">{{ $todo->description }}</p>
        </div>
        <div class="basis-1/5">
            @include('todos.edit')
        </div>
        <div>
            @include('todos.delete')
        </div>
    </li>
    @endforeach
</ul>