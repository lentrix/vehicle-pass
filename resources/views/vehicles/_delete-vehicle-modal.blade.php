<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteVehicleModal">
    <i class="fa-solid fa-trash-can"></i>
    Delete
</button>

<!-- Modal -->
<div class="modal fade" id="deleteVehicleModal" tabindex="-1" aria-labelledby="deleteVehicleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteVehicleModalLabel">Delete Vehicle Record</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{url('/vehicles/'.$vehicle->id)}}" method="POST">
          @csrf
          @method('DELETE')
        <div class="modal-body">
            <div class="alert alert-danger">
                Are you sure you want to delete this vehicle record? <br>
                <div><strong>Vehicle:</strong> {{ $vehicle->vehicle_make }} {{$vehicle->vehicle_model}}</div>
                <div><strong>Plate No.: </strong> {{ $vehicle->plate_no }}</div>
                <div><strong>Owner: </strong> {{ $vehicle->owner->full_name }}</div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">
                <i class="fa-solid fa-trash-can"></i>
                Delete Vehicle
            </button>
        </div>
      </form>
    </div>
  </div>
</div>
