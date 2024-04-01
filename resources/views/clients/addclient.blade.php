<form method="POST" action="{{ route('clients.store') }}">
    @csrf
    <div class="form-group">
        <label for="firstName">First Name:</label>
        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter first name" required>
    </div>
    <div class="form-group">
        <label for="lastName">Last Name:</label>
        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter last name" required>
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required>
    </div>
    <div class="form-group">
        <label for="phoneNumber">Phone Number:</label>
        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number" required>
    </div>
    <!-- <div class="form-group">
        <label for="userID">User ID:</label>
        <input type="text" class="form-control" id="userID" name="userID" placeholder="Enter user ID" required>
    </div> -->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
