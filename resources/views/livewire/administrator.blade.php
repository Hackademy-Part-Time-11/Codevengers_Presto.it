<!-- resources/views/tuavista.blade.php -->

<div>
    <div class="row">
        <div class="col-6">
            @foreach($admins as $admin)
                <div class="row">
                    <div class="col"> {{$admin->name}}</div>
                </div>
            @endforeach
        </div>
        <div class="col-6">
            @foreach($revisioners as $revisioner)
                <div class="row">
                    <div class="col-9"> {{$revisioner->name}}</div>
                    <div class="col-3">
                        <label for="dropdownRevisioner">Ruolo:</label>
                        <select wire:model="valoreSelezionato" id="dropdownRevisioner" wire:change="update({{ $revisioner->id, }})">
                            @foreach ($livels as $key => $livel)
                                <option value="{{ $key }}">{{ $livel }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-6">
            @foreach($users as $user)
                <div class="row">
                    <div class="col-9"> {{$user->name}}</div>
                    <div class="col-3">
                        <label for="dropdownUser">Ruolo:</label>
                        <select wire:model="valoreSelezionato" id="dropdownUser" wire:change="update({{ $user->id }})">
                            @foreach ($livels as $key => $livel)
                                <option value="{{ $key }}">{{ $livel }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
