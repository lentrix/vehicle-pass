<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createOwnerModal">
    <i class="fa-solid fa-plus"></i>
    Create Owner
</button>

<!-- Modal -->
<div class="modal fade" id="createOwnerModal" tabindex="-1" aria-labelledby="createOwnerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createOwnerModalLabel">Create Owner Record</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('/owners') }}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="contact_no" class="form-label">Contact No.</label>
                <input type="text" name="contact_no" id="contact_no" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="license_no" class="form-label">License No.</label>
                <input type="text" name="license_no" id="license_no" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="expiry_date" class="form-label">Expiry Date</label>
                <input type="date" name="expiry_date" id="expiry_date" class="form-control" required>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
                Create Owner
            </button>
        </div>
      </form>
    </div>
  </div>
</div>
