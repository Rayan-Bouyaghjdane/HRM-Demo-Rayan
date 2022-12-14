<?php
class Applicant extends BaseController
{
    private ApplicantModel $applicantModel;

    public function __construct()
    {
        $this->applicantModel = $this->model('ApplicantModel');
    }

    public function index()
    {
        $data = [
            'applicants' => $this->applicantModel->getApplicants()
        ];

        $this->view('Applicant/index', $data);
    }

    public function edit($id)
    {
        $data = [
            'applicant' => $this->applicantModel->getApplicantById((int)$id)
        ];

        $this->view('Applicant/show', $data);
    }

    public function create()
    {
        $this->view('Applicant/create');
    }

    public function store()
    {
        $this->applicantModel->createApplicant($_POST);
        $this->view('/applicant');
    }

    public function update()
    {
        $this->applicantModel->updateApplicant($_POST);
        $this->redirect('/applicant');
    }
    public function  delete(int $id)
    {
        $this->applicantModel->deleteApplicant($id);
        $this->redirect('/applicant/index');
    }
}