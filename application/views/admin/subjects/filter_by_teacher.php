<?php $this->load->view('admin/include/header'); ?>

<div class="container-fluid col-md-11" id="content">
    <div class="row">

        <div class="col-md-2">
            <?php $this->load->view('admin/include/sidebar'); ?>
        </div>

        <div class="col-md-10 mt-3">
            <div class="card shadow">
                <div class="card-header text-white d-flex justify-content-between align-items-center" style="background-color: #1A4870;">
                    <a href="<?= site_url('admin/dashboard'); ?>" class="btn btn-light btn-sm">Back</a>
                    <h6 class="mb-0 text-white small">*** Filter Subjects By Teacher ***</h6>
                    <a href="<?= site_url('AssignSubjectController/view_assignments'); ?>" class="btn btn-light btn-sm">Subject Details</a>
                </div>

                <div class="card-body">
                    <form action="<?= base_url('AssignSubjectController/filterByTeacher'); ?>" method="post">
                        <div class="row mt-3">
                            <div class="col-md-6 mb-3">
                                <label>Select Teacher</label>
                                <select name="teacher_id" class="form-control" required>
                                    <option value="">-- Select Teacher --</option>
                                    <?php foreach ($teachers as $teacher): ?>
                                        <option value="<?= $teacher->id ?>"><?= $teacher->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-6 mt-4">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>

                    <?php if (isset($assigned_subjects)): ?>
                        <h6 class=" text-success small">Subjects Assigned to <?= $teacher_name ?></h6>
                        <table class="table table-bordered mt-2">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Subject</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($assigned_subjects as $row): ?>
                                    <tr>
                                        <td><?= $row->class_name ?></td>
                                        <td><?= $row->section ?></td>
                                        <td><?= $row->subject_name ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/include/footer'); ?>
