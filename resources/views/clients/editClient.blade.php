<form method="POST" action="{{ route('clients.update', ['client' => $client->id]) }}">
    @csrf
    @method('PUT')
    <!-- Hidden field for storing client ID -->
    <input type="hidden" id="clientId" name="clientId">


    <div class="form-group">
        <label for="edit_firstName">First Name:</label>
        <input type="text" class="form-control" id="edit_firstName" name="firstName" placeholder="Enter first name" required>
    </div>
    <div class="form-group">
        <label for="edit_lastName">Last Name:</label>
        <input type="text" class="form-control" id="edit_lastName" name="lastName" placeholder="Enter last name" required>
    </div>
    <div class="form-group">
        <label for="edit_address">Address:</label>
        <input type="text" class="form-control" id="edit_address" name="address" placeholder="Enter address" required>
    </div>
    <div class="form-group">
        <label for="edit_phoneNumber">Phone Number:</label>
        <input type="text" class="form-control" id="edit_phoneNumber" name="phoneNumber" placeholder="Enter phone number" required>
    </div>
    <!-- <div class="form-group">
        <label for="edit_userID">User ID:</label>
        <input type="text" class="form-control" id="edit_userID" name="userID" placeholder="Enter user ID" required>
    </div> -->
    <button type="submit" class="btn btn-primary">Update</button>
</form>
