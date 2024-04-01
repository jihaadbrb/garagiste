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
        <form action="{{route('clients.search')}}" method="get">
          <div class="input-group mb-3">
            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Search..." name="search">

          </div>
          <input type="submit" class="form-control" value="search">
        </form>
      </div>

      <div>
        <!-- AddClient modal trigger button -->
        <button type="button" class="btn btn-primary" id="addClientBtn">Add Client</button>
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
          <a class="nav-link"  href="{{ route('vehicules.index') }}" >
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
          <h4 class="card-title">Clients table</h4>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> Full Name</th>
                <th> Address </th>
                <th> Progress </th>
                <th> Phone Number </th>
                <th> Update</th>
                <th> Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach($clients as $client)
              <tr>
                <td>{{ $client->firstName }} {{ $client->lastName }}</td>
                <td>{{ $client->address }}</td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="{{ $client->progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td>{{ $client->phoneNumber }}</td>
                <td>
                  <button class="btn btn-danger" onclick="openEditModal(  {{ $client->id }},{{ $client->toJson() }}) ">Edit</button>
                </td>

                <td>
                  <button type="button" class="btn btn-danger" id="deleteClientBtn" data-client-id="{{ $client->id }}">delete</button>

                </td>
              </tr>
              <!-- EditClient modal -->
              <div class="modal fade" id="editClientModal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="editClientModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editClientModalLabel">Edit Client</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{ route('clients.update', ['id' => $client->id]) }}">


                        @csrf
                        @method('PUT')
                        <!-- Hidden field for storing client ID -->
                        <input type="hidden" id="clientId" name="clientId">


                        <div class="form-group">
                          <label for="edit_firstName">First Name:</label>
                          <input type="text" class="form-control" value="{{$client->firstName}}" id="edit_firstName" name="firstName" placeholder="Enter first name" required>
                        </div>
                        <div class="form-group">
                          <label for="edit_lastName">Last Name:</label>
                          <input type="text" class="form-control" value="{{$client->lastName}}" id="edit_lastName" name="lastName" placeholder="Enter last name" required>
                        </div>
                        <div class="form-group">
                          <label for="edit_address">Address:</label>
                          <input type="text" class="form-control" value="{{$client->address}}" id="edit_address" name="address" placeholder="Enter address" required>
                        </div>
                        <div class="form-group">
                          <label for="edit_phoneNumber">Phone Number:</label>
                          <input type="text" class="form-control" value="{{$client->phoneNumber}}" id="edit_phoneNumber" name="phoneNumber" placeholder="Enter phone number" required>
                        </div>
                        <!-- <div class="form-group">
        <label for="edit_userID">User ID:</label>
        <input type="text" class="form-control" id="edit_userID" name="userID" placeholder="Enter user ID" required>
    </div> -->
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

  </div>
  <!-- page-body-wrapper ends -->
</div>

<!-- AddClient modal -->
<div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="addClientModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addClientModalLabel">Add Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Include your form here -->
        @include('clients.addclient')
      </div>

    </div>
  </div>
</div>


@endsection

@section('script')
<!-- Your custom script -->
<script>
  document.getElementById('addClientBtn').addEventListener('click', function() {
    var modal = document.getElementById('addClientModal');
    modal.classList.add('show');
    modal.style.display = 'block';
  });

  document.querySelectorAll('.close').forEach(function(element) {
    element.addEventListener('click', function() {
      var modal = document.getElementById('addClientModal');
      modal.classList.remove('show');
      modal.style.display = 'none';
    });
  });

  function openEditModal(clientId, clientData) {
    console.log("Clicked on Edit for client ID:", clientId);
    console.log("Clicked on Edit for client ID:", clientData);

    // Set the client ID in the form
    document.getElementById('clientId').value = clientId;

    // Open the edit client modal
    var modal = document.getElementById('editClientModal' + clientId);
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

  $(document).on('click', '#deleteClientBtn', function() {
    let clientId = $(this).data('client-id');
    if (confirm('Are you sure you want to delete this vehicule?')) {
      // Send an AJAX request to delete the vehicule
      $.ajax({
        type: 'DELETE',
        url: '/clients/' + clientId, // Replace this with your actual delete route URL
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