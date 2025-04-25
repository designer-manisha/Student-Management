<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>

<div class="content" style="margin-left: 250px; padding: 20px;" id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Welcome to Admin Dashboard</h4>
                        <p>You have successfully logged in as an administrator.</p>

                    </div>

                    <div class="row col-md-12">
                        <!-- Stats Cards -->
                        <div class="col-md-3 mb-4">
                            <div class="card bg-info text-white">
                                <div class="card-body ">

                                    <a href="<?= site_url('student/view'); ?>" class="btn btn-info">
                                        <i class="bi bi-mortarboard-fill "></i> View Student</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-4">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <a href="<?= site_url('teacher/view'); ?>" class="btn btn-success bg-success">
                                        <i class="fa fa-users"></i> View Teacher</a>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-3 mb-4">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <a href="<?= site_url('parents/view'); ?>" class="btn btn-warning">
                                        <i class="fa fa-users"></i> View Parents</a>
                                    <!-- <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#userModal">View Parents
                                        <i class="fas fa-users fa-2x position-absolute end-0 bottom-0 mb-3 me-3 opacity-50"></i></button> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-4">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <a href="<?= site_url('classes/view'); ?>" class="btn btn-info bg-info">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                                                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
                                            </svg>
                                        </span>  
                                        View Class</a>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Stats -->

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

<?php $this->load->view('admin/include/footer'); ?>