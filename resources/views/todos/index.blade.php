<div class='flex space-x-12'>
    <h1 class='text-3xl'>Tasks</h1>

    @include('todos.create')
</div>
<ul role="list" class="divide-y divide-white/5">
    <li class="flex justify-between py-5">
        <p>Is Completed</p>
        <p class="basis-1/5">Title</p>
        <p class="basis-1/5">Description</p>
        <p style="width:50px;"></p>
        <p style="width:50px;"></p>
    </li>
    @foreach ($project->todos as $todo)
    <li class="flex justify-between gap-x-6 items-center rounded-xl bg-white/5 my-5 px-5 py-2 shadow-[10px_10px_5px_rgba(0,0,0,0.25)]">
        <div>
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
        <div>
            @include('todos.edit')
        </div>
        <div>
            @include('todos.delete')
        </div>
    </li>
    @endforeach
</ul>