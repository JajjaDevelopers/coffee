<?= $this->extend('partials/main') ?>
<?= $this->section('title') ?>
<?= $page_title ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->include('includes/staff/staffModal') ?>
<div class="row">
    <div class="col-md-12 mg-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Staff List</h4>
            <button class="btn btn-primary d-flex align-items-center" data-toggle="modal" data-target="#staffModal">
                <i class="typcn typcn-user-add"></i>
                <span class="ml-2">Add New Staff</span>
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-striped mg-b-0 staff_table">
                <thead style="background-color: #6f4e37; color: #f5f5f5;">
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $iteration = 1; ?>
                    <?php foreach ($staff as $member): ?>
                        <tr>
                            <td><?= $iteration++ ?></td>
                            <td><?= esc($member['fname']) ?></td>
                            <td><?= esc($member['lname']) ?></td>
                            <td><?= esc($member['middle_name']) ?: 'N/A' ?></td>
                            <td><?= esc($member['phone']) ?></td>
                            <td><?= esc($member['email']) ?></td>
                            <td><?= esc($member['role']) ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-sm btn-info d-flex align-items-center mr-2">
                                        <i class="typcn typcn-edit"></i>
                                        <span class="ml-1">Edit</span>
                                    </button>
                                    <button class="btn btn-sm btn-danger d-flex align-items-center">
                                        <i class="typcn typcn-trash"></i>
                                        <span class="ml-1">Delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $('#addStaffForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Gather form data
            const formData = $(this).serialize();

            // AJAX request
            $.ajax({
                url: '/staff/store', // The URL specified in the form action
                type: 'POST',
                data: formData,
                dataType: 'json',
                beforeSend: function() {
                    // Disable the submit button and show a loading message
                    $('.addStaff').prop('disabled', true).text('Submitting...');
                },
                success: function(response) {
                    if (response.success) {
                        // Display success notification
                        toastr.success('Staff added successfully!', 'Success');
                        // Reset the form
                        $('#addStaffForm')[0].reset();
                    } else {
                        // Display validation errors or failure messages
                        if (response.errors) {
                            for (const field in response.errors) {
                                toastr.error(response.errors[field], 'Validation Error');
                            }
                        } else {
                            toastr.error(response.message || 'An error occurred.', 'Error');
                        }
                    }
                },
                error: function(xhr, status, error) {
                    // Handle unexpected errors
                    toastr.error('An unexpected error occurred. Please try again.', 'Error');
                    console.error('Error:', error);
                },
                complete: function() {
                    // Re-enable the button and reset the text
                    $('.addStaff').prop('disabled', false).text('Submit');
                },
            });
        });
    });
</script>
<?= $this->endSection() ?>