<?php 
class Queue_model extends CI_Model {

    public $id;
    public $queue_val;
    public $status=0;

    public function get_last_ten_entries()
    {
        $query = $this->db->get('queue', 10);
        return $query->result();
    }

    public function insert_entry($queue_val)
    {
        $this->queue_val  = $queue_val;

        $this->db->insert('queue', $this);
        return $this->db->insert_id();
    }

    public function getLast(){
        $this->db->where('status',0);
        $this->db->order_by('id','desc');
        $query = $this->db->get('queue');
        return $query->row();
    }

    public function update_queues($arr, $col)
    {
        if($this->db->update_batch('queue', $arr, $col)){
            return true;
        }else{
            return false;
        }
    }

    public function get_to_append_queue(){
        $this->db->where("status != 1");
        $this->db->order_by("id","ASC");
        $query = $this->db->get('queue');
        return $query->result();
    }
}