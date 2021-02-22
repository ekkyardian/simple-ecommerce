<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    protected $table                = '';
    protected $maxContentPerPage    = 5;

    public function __construct()
    {
        parent::__construct();
        
        /**
         * Fungsi berikut digunakan untuk mendefinisikan nama tabel yang akan
         * digunakan secara otomatis apabila variabel $tabel tidak didefinisikan
         * atau berisi data kosong.
         */
        if (!$this->table) {
            $this->table = strtolower(
                str_replace('_model', '', get_class($this))
            );
        }
    }

    /**
     * Fungsi validate berikut merupakan template pesan error yang akan diguna-
     * kan. Untuk rules nya sendiri akan mengambil dan didelarasikan pada
     * masing-masing model yang akan menggunakannya
     */
    public function validate()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters(
            '<small class="form-text text-danger">', '</small>'
        );
        
        $validationRules = $this->getValidationRules();
        $this->form_validation->set_rules($validationRules);
        
        return $this->form_validation->run();
    }

    public function select($columns)
    {
        $this->db->select($columns);
        return $this;
    }

    public function where($column, $pattern)
    {
        $this->db->where($column, $pattern);
        return $this;
    }

    public function like($column, $pattern)
    {
        $this->db->like($column, $pattern);
        return $this;
    }

    public function orLike($column, $pattern)
    {
        $this->db->or_like($column, $pattern);
        return $this;
    }

    public function join($tableTarget, $joinType = 'left')
    {
        $this->db->join(
            $tableTarget, "$this->table.id_$tableTarget = $tableTarget.id",
            $joinType
        );
        
        return $this;
    }

    public function order($column, $orderType)
    {
        $this->db->order($column, $orderType);
        return $this;
    }

    public function first()
    {
        return $this->db->get($this->table)->row();
    }

    public function get()
    {
        return $this->db->get($this->table)->result();
    }

    public function count()
    {
        return $this->db->count_all_results($this->table);
    }

    public function create($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($data)
    {
        return $this->db->update($this->table, $data);
    }

    public function delete()
    {
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function pagination($currentPageNumber)
    {
        $this->db->limit(
            $this->maxContentPerPage,
            $this->calculateRealOffset($currentPageNumber)
        );
        
        return $this;
    }

    public function calculateRealOffset($currentPageNumber)
    {
        if (is_null($currentPageNumber) || empty($currentPageNumber)) {
            $offset = 0;
        } else {
            $offset = ($currentPageNumber * $this->maxContentPerPage) -
                $this->maxContentPerPage;
        }
        
        return $offset;
    }

    public function createPagination($baseUrl, $uriSegment, $totalRows = null)
    {
        $this->load->library('pagination');
        
        $configPagination = [
            'base_url'          => $baseUrl,
            'uri_segment'       => $uriSegment,
            'per_page'          => $this->maxContentPerPage,
            'total_rows'        => $totalRows,
            'use_page_numbers'  => true,
            
            'full_tag_open'     => '<ul class="pagination">',
            'full_tag_close'    => '</ul>',
            'attributes'        => ['class' => 'page-link'],
            'first_link'        => false,
            'last_link'         => false,
            'first_tag_open'    => '<li class="page-item">',
            'first_tag_close'   => '</li>',
            'prev_link'         => '&laquo',
            'prev_tag_open'     => '<li class="page-item">',
            'prev_tag_close'    => '</li>',
            'next_link'         => '&raquo',
            'next_tag_open'     => '<li class="page-item">',
            'next_tag_close'    => '</li>',
            'last_tag_open'     => '<li class="page-item">',
            'last_tag_close'    => '</li>',
            'cur_tag_open'  => '<li class="page-item active">
                                    <a href="#" class="page-link">',
            'cur_tag_close' => '<span class="sr-only">(current)</span>
                                    </a></li>',
            'num_tag_open'      => '<li class="page-item">',
            'num_tag_close'     => '</li>'
        ];
        
        $this->pagination->initialize($configPagination);
        return $this->pagination->create_links();
    }
}

