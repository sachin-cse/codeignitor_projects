<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Csv_model extends CI_model {

    public function insert_csv_data($data) {
        if (!empty($data)) {
            $column_names = array_shift($data); // Extract column names from the first row

            // Loop through CSV data and insert into the database
            foreach ($data as $row) {
                $insert_data = array();
                foreach ($row as $index => $value) {
                    $insert_data[$column_names[$index]] = $value;
                }
                $this->db->insert('file_upload', $insert_data);
            }
        }
    }
}

?>