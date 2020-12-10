<div>
<form action="{{route('carts.search')}}" method="POST">
        @csrf
        <br>
        <div class="container">
            <div class="row">
                <div class="container-fluid">
                    <div class="form-group row">
                        <label for="date" class="col-form-label col-sm-1">From</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control input-sm" id="from" name="from" required/>
                        </div>
                        <label for="date" class="col-form-label col-sm-1">To</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control input-sm" id="to" name="to" required/>
                        </div>
                        <div class="col-sm-2">
                            <input type="submit" class="form-control" name="search" value="Search"/>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>