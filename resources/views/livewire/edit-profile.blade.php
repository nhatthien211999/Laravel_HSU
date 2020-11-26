<div class="form-group">
    @if ($profile !== null)
        <label for="full_name"> Full Name:</label>
        <input type="text" class="form-control" value="{{$profile->full_name}}" name="full_name" >
        <br>
        <label for="address"> Address:</label>
        <input type="text" class="form-control" value="{{$profile->address}}" name="address" >
        <br>
        <label for="avatar"> Avatar:</label>
        <input type="file" class="form-control" value="{{$profile->avatar}}" name="avatar">
        <label for="birthday"> Birthday:</label>
        <input type="date" class="form-control" value="{{$profile->birthday}}" name="birthday">
    @else
        <label for="full_name"> Full Name:</label>
        <input type="text" class="form-control" name="full_name" >
        <br>
        <label for="address"> Address:</label>
        <input type="text" class="form-control" name="address" >
        <br>
        <label for="avatar"> Avatar:</label>
        <input type="text" class="form-control" name="avatar">
        <br>
        <label for="birthday"> Birthday:</label>
        <input type="date" class="form-control" name="birthday">
    @endif


</div>
