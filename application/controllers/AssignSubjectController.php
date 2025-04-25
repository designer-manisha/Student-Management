<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AssignSubjectController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AssignSubjectModel');
    }

    // Show assign subject form
    public function index()
    {
        $data['classes'] = $this->AssignSubjectModel->get_classes();
        $data['teachers'] = $this->AssignSubjectModel->get_teachers();
        $data['subjects'] = $this->AssignSubjectModel->get_subjects();

        $this->load->view('admin/subjects/assign_subject', $data);
    }

    // Handle form submit
    public function assign()
    {
        if ($this->input->post()) {
            $data = array(
                'class_id' => $this->input->post('class_id'),
                'section' => $this->input->post('section'),
                'teacher_id' => $this->input->post('teacher_id'),
                'subject_id' => $this->input->post('subject_id'),
            );

            $this->AssignSubjectModel->assign_subject($data);

            $this->session->set_flashdata('success', 'Subject Assigned Successfully!');
            redirect('AssignSubjectController/view_assignments');
        }
    }

    // NEW FUNCTION: Show all assigned subjects
    // public function manage() {
    //     $data['assigned_subjects'] = $this->AssignSubjectModel->get_all_assigned_subjects();

    //     $this->load->view('templates/header');
    //     $this->load->view('admin/subjects/manage_assign_subject', $data);
    //     $this->load->view('templates/footer');
    // }

    public function view_assignments()
    {
        $data['assignments'] = $this->AssignSubjectModel->get_all_assignments();
        $this->load->view('admin/subjects/view_assignments', $data);
    }

    public function edit($id)
    {
        $data['assignment'] = $this->AssignSubjectModel->get_assignment_by_id($id);
        $data['classes'] = $this->AssignSubjectModel->get_classes();
        $data['teachers'] = $this->AssignSubjectModel->get_teachers();
        $data['subjects'] = $this->AssignSubjectModel->get_subjects();
        $this->load->view('admin/subjects/edit_assignment', $data);
    }

    public function update($id)
    {
        if ($this->input->post()) {
            $data = array(
                'class_id' => $this->input->post('class_id'),
                'section' => $this->input->post('section'),
                'teacher_id' => $this->input->post('teacher_id'),
                'subject_id' => $this->input->post('subject_id'),
            );
            $this->AssignSubjectModel->update_assignment($id, $data);
            $this->session->set_flashdata('success', 'Assignment Updated!');
            redirect('AssignSubjectController/view_assignments');
        }
    }

    public function delete($id)
    {
        $this->AssignSubjectModel->delete_assignment($id);
        $this->session->set_flashdata('success', 'Assignment Deleted!');
        redirect('AssignSubjectController/view_assignments');
    }


    public function classWiseSubjects()
    {
        $data['classes'] = $this->AssignSubjectModel->get_classes(); // dropdown
        $data['assignments'] = [];

        if ($this->input->post('class_id')) {
            $class_id = $this->input->post('class_id');
            $data['assignments'] = $this->AssignSubjectModel->get_assignments_by_class($class_id);
        }

        $this->load->view('admin/subjects/class_wise_subjects', $data);
    }

    public function filter_by_teacher_view()
    {
        $this->load->model('Teacher_model');
        $data['teachers'] = $this->Teacher_model->get_all_teachers();
        $this->load->view('admin/subjects/filter_by_teacher', $data);
    }

    public function filterByTeacher()
    {
        $teacher_id = $this->input->post('teacher_id');

        $this->load->model('AssignSubjectModel');
        $this->load->model('Teacher_model');

        $data['teachers'] = $this->Teacher_model->get_all_teachers();
        $data['assigned_subjects'] = $this->AssignSubjectModel->get_subjects_by_teacher($teacher_id);
        $data['teacher_name'] = $this->Teacher_model->get_teacher_name($teacher_id);

        $this->load->view('admin/subjects/filter_by_teacher', $data);
    }
}
