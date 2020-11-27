<div>
    {{$profile->full_name}}
    {{$profile->address}}
    {{$profile->avatar}}
    <div>
        @if($profile->avatar !== null)
            <img src="../../../storage/app/public/avatar/{{$profile->avatar}}" alt="avatar" width="30px" height="30px"/>
        @endif
    </div>
 
    {{$profile->birthday}}
</div>
