<?php $this->load->view('admin/include/header'); ?>

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show mt-2 " role="alert">
        <?php echo $this->session->flashdata('success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<div class="container-fluid" id="content">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2">
            <?php $this->load->view('admin/include/sidebar'); ?>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 mt-4">

            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <!-- <h5 class="mb-0">Manage Telecallers</h5> -->
                    <a href="<?= site_url('admin/dashboard'); ?>" class="btn btn-light btn-sm">Back</a>

                    <a href="<?= site_url('teacher/download_all_pdf'); ?>" class="btn btn- btn-sm">
                        <i class="bi bi-download"></i> Download All PDF
                    </a>

                    <a href="<?= site_url('teacher/download_all_teacher_excel'); ?>" class="btn btn- btn-sm">
                        <i class="bi bi-download"></i> Download All Excel
                    </a>

                    <a href="<?= site_url('teacher/add'); ?>" class="btn btn-light btn-sm">
                        + Add Teacher
                    </a>
                </div>
                <div class="card-body">
                    <!-- <?php //if (!empty($telecallers)) : 
                            ?> -->
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-hover align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Gender</th>
                                    <th>Subject</th>
                                    <th>Joining Date</th>
                                    <th>Action</th>
                                </tr>


                            </thead>
                            <tbody class="text-center">
                                <?php foreach ($teachers as $teacher): ?>
                                    <tr>
                                        <td><?php echo $teacher->id; ?></td>
                                        <td><?php echo $teacher->name; ?></td>
                                        <td><?php echo $teacher->email; ?></td>
                                        <td><?php echo $teacher->phone; ?></td>
                                        <td><?php echo $teacher->gender; ?></td>
                                        <td><?php echo $teacher->subject; ?></td>
                                        <td><?php echo $teacher->joining_date; ?></td>

                                        <td>
                                            <a href="<?php echo site_url('teacher/edit/' . $teacher->id); ?>" class="btn btn-warning btn-sm me-1">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a> |
                                            <a href="<?php echo site_url('teacher/delete/' . $teacher->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this record?')">
                                                <i class="bi bi-trash3"></i> Delete
                                            </a> |

                                            <button type="button" data-toggle="dropdown" class="btn btn-sm dropdown-toggle" style="background-color: #804674;">Download</button>
                                            <div class="dropdown-menu">
                                                <!-- <a class="dropdown-item" href="<?php echo site_url(''); ?>">PDF Download</a> -->

                                                <a href="<?= site_url('teacher/generate_pdf/' . $teacher->id); ?>" class="dropdown-item">PDF Download</a>

                                                <a class="dropdown-item" href="<?= site_url('teacher/download_excel/' . $teacher->id); ?>">Excel Download</a>


                                            </div>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<?php $this->load->view('admin/include/footer'); ?>