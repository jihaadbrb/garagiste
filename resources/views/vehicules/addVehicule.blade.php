<form method="POST" id="addVehicleForm" action="{{ route('vehicules.store') }}">

    @csrf
    <div class="form-group">
        <label for="make">Make:</label>
        <input type="text" class="form-control" id="make" name="make" placeholder="Enter make" required>
    </div>
    <div class="form-group">
        <label for="model">Model:</label>
        <input type="text" class="form-control" id="model" name="model" placeholder="Enter model" required>
    </div>
    <div class="form-group">
        <label for="fuelType">Fuel Type:</label>
        <input type="text" class="form-control" id="fuelType" name="fuelType" placeholder="Enter fuel type" required>
    </div>
    <div class="form-group">
        <label for="registration">Registration:</label>
        <input type="text" class="form-control" id="registration" name="registration" placeholder="Enter registration" required>
    </div>
    <div class="form-group">
        <label for="client">ClientId:</label>
        <input type="text" class="form-control"  id="edit_client" name="clientID" placeholder="Enter client" required>
    </div>
    <!-- Additional fields if needed -->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>