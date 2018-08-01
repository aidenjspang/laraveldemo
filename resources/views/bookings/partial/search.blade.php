<form method="get" action="{{ route('bookings.index') }}" role="search">
    <input type="text" name="qry" value="<?php echo isset($_GET['qry']) ? $_GET['qry'] : '' ?>" class="form-control" placeholder="Search by service ID or name.."/>
</form>