@extends('layouts.app-master')
@section('content')
<div class="container-scroller">
  <!-- partial:../../partials/_navbar.html -->
  <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="../../index.html"><img src="{{asset('images/logo.svg')}}" alt="logo" /></a>
      <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="{{asset('images/logo-mini.svg')}}" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">

      <div class="col-sm-8">
        <form action="{{route('vehicules.search')}}" method="get">
          <div class="input-group mb-3">
            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Search..." name="search">

          </div>
          <input type="submit" class="form-control" value="search">
        </form>
      </div>

      <div>
        <!-- AddClient modal trigger button -->
        <button type="button" class="btn btn-primary" id="addVehicleBtn">Add Vehicle</button>
        <a href="{{ route('logout.perform') }}" class="btn btn-primary">Logout</a>
      </div>
    </div>
  </nav>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="../../index.html">
            <span class="menu-title">Dashboard</span>
            <i class="mdi mdi-home menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="{{ route('clients.index') }}" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-title">Clients</span>
            <i class="menu-arrow"></i>
            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
          </a>
        
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('vehicules.index') }}">
            <span class="menu-title">Vehicules</span>
            <i class="mdi mdi-contacts menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../pages/forms/basic_elements.html">
            <span class="menu-title">-</span>
            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../pages/charts/chartjs.html">
            <span class="menu-title">-</span>
            <i class="mdi mdi-chart-bar menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../pages/tables/basic-table.html">
            <span class="menu-title">-</span>
            <i class="mdi mdi-table-large menu-icon"></i>
          </a>
        </li>
        <li class="nav-item sidebar-actions">
          <span class="nav-link">
            <div class="border-bottom">
              <h6 class="font-weight-normal mb-3">BY JIHAD</h6>
            </div>
            <button class="btn btn-block btn-lg btn-gradient-primary mt-4" disabled>Garagiste</button>
          </span>
        </li>
      </ul>
    </nav>
    <!-- partial -->

    <div class="col-lg-10 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Vehicles table</h4>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> Make </th>
                <th> Model </th>
                <th> Fuel Type </th>
                <th> Registration </th>
                <th> ClientId </th>
                <th> Update</th>
                <th> Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach($vehicules as $vehicle)
              <tr>
                <td>{{ $vehicle->make }}</td>
                <td>{{ $vehicle->model }}</td>
                <td>{{ $vehicle->fuelType }}</td>
                <td>{{ $vehicle->registration }}</td>
                <td>{{ $vehicle->clientID }}</td>
                <td>
                  <button class="btn btn-danger" onclick="openEditModal(  {{ $vehicle->id }},{{ $vehicle->toJson() }}) ">Edit</button>
                </td>

                <td>
                  <button type="button" class="btn btn-danger" id="deleteVehiculeBtn" data-vehicule-id="{{ $vehicle->id }}">
                    delete</button>
                </td>
              </tr>
              <!-- Edit Vehicle modal -->
              <div class="modal fade" id="editVehicleModal{{ $vehicle->id }}" tabindex="-1" role="dialog" aria-labelledby="editVehicleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editVehicleModalLabel">Edit Vehicle</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{ route('vehicules.update', ['id' => $vehicle->id]) }}">

                        @csrf
                        @method('PUT')
                        <!-- Hidden field for storing vehicle ID -->
                        <input type="hidden" id="vehicleId" name="vehicleId">

                        <div class="form-group">
                          <label for="edit_make">Make:</label>
                          <input type="text" class="form-control" value="{{ $vehicle->make }}" id="edit_make" name="make" placeholder="Enter make" required>
                        </div>
                        <div class="form-group">
                          <label for="edit_model">Model:</label>
                          <input type="text" class="form-control" value="{{ $vehicle->model }}" id="edit_model" name="model" placeholder="Enter model" required>
                        </div>
                        <div class="form-group">
                          <label for="edit_fuelType">Fuel Type:</label>
                          <input type="text" class="form-control" value="{{ $vehicle->fuelType }}" id="edit_fuelType" name="fuelType" placeholder="Enter fuel type" required>
                        </div>
                        <div class="form-group">
                          <label for="edit_registration">Registration:</label>
                          <input type="text" class="form-control" value="{{ $vehicle->registration }}" id="edit_registration" name="registration" placeholder="Enter registration" required>
                        </div>
                        <div class="form-group">
                          <label for="edit_registration">clientId:</label>
                          <input type="text" class="form-control" value="{{ $vehicle->clientID }}" readonly id="edit_client" name="clientID" placeholder="Enter client" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Add Vehicle modal -->
    <div class="modal fade" id="addVehicleModal" tabindex="-1" role="dialog" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addVehicleModalLabel">Add Vehicle</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Include your form here -->
            @include('vehicules.addVehicule')
          </div>
        </div>
      </div>
    </div>



    @endsection

    @section('script')
    <!-- Your custom script -->
    <script>
      document.getElementById('addVehicleBtn').addEventListener('click', function() {
        var modal = document.getElementById('addVehicleModal');
        modal.classList.add('show');
        modal.style.display = 'block';
      });

      document.querySelectorAll('.close').forEach(function(element) {
        element.addEventListener('click', function() {
          var modal = document.getElementById('addVehicleModal');
          modal.classList.remove('show');
          modal.style.display = 'none';
        });
      });


      function openEditModal(vehicleId, vehicleData) {
        console.log("Clicked on Edit for vehicle ID:", vehicleId);
        console.log("Vehicle data:", vehicleData);

        // Set the vehicle ID in the form
        document.getElementById('vehicleId').value = vehicleId;

        // Open the edit vehicle modal
        var modal = document.getElementById('editVehicleModal' + vehicleId);
        modal.classList.add('show');
        modal.style.display = 'block';
      }
      document.querySelectorAll('.close').forEach(function(element) {
        element.addEventListener('click', function() {
          var modal = element.closest('.modal');
          modal.classList.remove('show');
          modal.style.display = 'none';
        });
      });

      $(document).on('click', '#deleteVehiculeBtn', function() {
        let vehiculeId = $(this).data('vehicule-id');
        if (confirm('Are you sure you want to delete this vehicule?')) {
          // Send an AJAX request to delete the vehicule
          $.ajax({
            type: 'DELETE',
            url: '/vehicules/' + vehiculeId, // Replace this with your actual delete route URL
            data: {
              "_token": "{{ csrf_token() }}"
            },
            success: function(response) {
              // Handle success response (e.g., reload the page)
              location.reload();
            },
            error: function(xhr) {
              // Handle error response
              console.log(xhr.responseText);
            }
          });
        }
      });
    </script>

    @endsection