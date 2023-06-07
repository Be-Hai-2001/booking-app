@livewireStyles
<div>
    <div>
        <input wire:model="" type="text" placeholder="Search users..."/>
        <ul>
            @foreach($users as $user)
                <li>{{ $user->email }}</li>
            @endforeach
        </ul>
    </div>
</div>

@livewireScripts
