<?php defined('BASEPATH') or exit('No direct script access allowed');
class Model_quiz extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database('external_teacher');
    }
    public function add_question($data)
    {
        if ($this->db->insert('add_quiz', $data)) {
            return true;
        }
    }
    public function add_quiz($data)
    {
            return $this->db->insert('new_quiz', $data);        
    }
    public function quiz_fetched($q_id)
    {
        return $this->db->select('*')->from('new_quiz')->where('q_id', $q_id)->get()->result_array();
    }
    public function show_quiz($u_id){
        return $this->db->select('*')->from('new_quiz')->where('user_id',$u_id)->get()->result_array();
    }
    function apply_quiz($q_id){
        $query = $this->db->select('*')->from('add_quiz')->where('q_id', $q_id)->get();
        $quiz['count'] = $query->num_rows();
        $quiz['result'] =  $query->result_array();
        return $quiz;
    }
    function save_result($data){
        return $this->db->insert('quiz_response', $data);
    }
    public function getQuestions()
    {
        $this->db->select("id,q_id,question, option_a, option_b, option_c,option_d, solution");
        $this->db->from("add_quiz");
        
        $query = $this->db->get();
        
        return $query->result();
        
        $num_data_returned = $query->num_rows;
        
        if ($num_data_returned < 1) {
          echo "There is no data in the database";
          exit();   
        }
    }
    
    public function fetch_single_details($q_id){
        $this->db->where('q_id',$q_id);
        $data = $this->db->get('add_quiz');
        $output = '<table width = 100% cellspacing = "5" cellpadding= "5">';
        foreach($data->result() as $row){
            $output .= '
            <tr>
            <td width ="75%">
            <p><b>Quiz_id : </b>'.$row->q_id.'</p>
            <p><b>Question_number : </b>'.$row->question.'</p>
            <p><b>Response : </b>'.$row->solution.'</p>
            </td>
            </tr>
            ';
        }
        $output .= '
        <tr>
        <td colspan ="2" align ="center"><a href = "'.base_url().'Quzies/applyquiz/2699" class = "btn btn-primary">Back</a></td>
        </tr>
        ';
        $output .= '</table>';
        return $output;
    }
}