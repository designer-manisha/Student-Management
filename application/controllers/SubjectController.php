<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubjectController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SubjectModel');
        $this->load->model('ClassModel');
    }


    public function add() {
        $data['classes'] = $this->ClassModel->get_all_classes();
    
        // Load form validation library if not autoloaded
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('subject_name', 'Subject Name', 'required');
        $this->form_validation->set_rules('class_id', 'Class', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Form validation failed
            $this->load->view('admin/subjects/add_subject', $data);
            // echo $this->form_validation->error_string();
    
        } else {
            $subject_name = $this->input->post('subject_name');
            $class_id = $this->input->post('class_id');
    
            // Duplicate check
            if ($this->SubjectModel->is_duplicate_subject($subject_name, $class_id)) {
                $data['error'] = 'Subject already exists for this class!';
                $this->load->view('admin/subjects/add_subject', $data);
                echo "Subject already exists for this class!";

            } else {
                $subjectData = array(
                    'subject_name' => $subject_name,
                    'class_id' => $class_id
                );
                $this->SubjectModel->insert_subject($subjectData);
                $this->session->set_flashdata('success', 'Subject added successfully!');
                redirect('SubjectController/list');
            }
        }
    }
    

    // public function add() {
    //     $data['classes'] = $this->ClassModel->get_all_classes();

    //     if ($this->input->post()) {
    //         $subjectData = array(
    //             'subject_name' => $this->input->post('subject_name'),
    //             'class_id' => $this->input->post('class_id')
    //         );
    //         $this->SubjectModel->insert_subject($subjectData);
    //         $this->session->set_flashdata('success', 'Subject added successfully!');
    //         redirect('SubjectController/list');
    //     }

    //     $this->load->view('admin/subjects/add_subject', $data);
    // }

    public function list()
    {
        $data['subjects'] = $this->SubjectModel->get_all_subjects();
        $this->load->view('admin/subjects/subject_list', $data);
    }

    public function edit($id)
    {
        $data['classes'] = $this->ClassModel->get_all_classes();
        $data['subject'] = $this->SubjectModel->get_subject_by_id($id);

        if ($this->input->post()) {
            $updateData = array(
                'subject_name' => $this->input->post('subject_name'),
                'class_id' => $this->input->post('class_id')
            );
            $this->SubjectModel->update_subject($id, $updateData);
            $this->session->set_flashdata('success', 'Subject updated successfully!');
            redirect('SubjectController/list');
        }

        $this->load->view('admin/subjects/edit_subject', $data);
    }
}
