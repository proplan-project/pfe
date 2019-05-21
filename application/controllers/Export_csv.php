
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export_csv extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('export_csv_model');
    }

    function index()
    {
        $data['student_data'] = $this->export_csv_model->fetch_data();
        $this->load->view('export_csv', $data);
    }

    function export()
    {
        $file_name = 'student_details_on_'.date('Ymd').'.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/csv;");

        // get data
        $student_data = $this->export_csv_model->fetch_data();

        // file creation
        $file = fopen('php://output', 'w');

        $header = array("Id","Nom","PreNom","Entreprise","Adresse","Ville","Code_postal","¨Pays","Tel","site","Id");
        fputcsv($file, $header);
        foreach ($student_data->result_array() as $key => $value)
        {
            fputcsv($file, $value);
        }
        fclose($file);
        exit;
    }


}
