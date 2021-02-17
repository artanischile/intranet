<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Post_Model extends CI_Model
{

    //protected $tableName = 'user';
    var $table = 'post';
    var $primary ='post.id';
    
    var $column_order = array(
        'id,',
        'name',
        'title',
        'date_add',
        'highlight',
        'status'
    );

    // set column field database for datatable orderable
    var $column_search = array(
        'id,',
        'name',
        'title',
        'date_add',
        'highlight',
        'status'
    );

    // set column field database for datatable searchable
    var $order = array(
        'id' => 'asc'
    );

    function __construct()
    {
        parent::__construct();
    }

    public function getAll(){
        $this->db
        ->select('*')
        ->from($this->table)
        ->where('post.status',1);
        $query = $this->db->get();
        return $query->result();
    } 

    public function getById($id=null){
        $this->db
        ->select('*')
        ->from($this->table)
        ->where('post.id',$id);
        $query = $this->db->get();
        return $query->result();
    } 


    function getHighlightPost($params=array())
    {
        $this->db
        ->select('*')
        ->from($this->table)
        ->where('post.status',1)
        ->where('post.highlight',1);
   
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        } 

        $query  = $this->db->get();
        return  $query->result();
    }
    
    
    
    
   

    public function Save($data = '')
    {
        if ($data->id > 0) {
            $status = $this->UpdateRecord($data);
        } else {
            $status = $this->AddRecord($data);
        }
        return $status;
    }

    public function Delete($id){
        
        
        
        return $this->__DeleteRecord($id);
    }

    private function AddRecord($info = array())
    {
        $this->db->insert($this->table, $info);
        return $this->db->insert_id();
    }

    private function UpdateRecord($info = array())
    {
        $this->db->trans_start();
        $this->db->where('id', $info->id);
        $this->db->update($this->table, $info);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return true;
        }
    }

    private function __DeleteRecord($id)
    {
       
       $file=$this->FilePerPost($id);
       if (count($file)>0){
           foreach($file as $f){
              unlink($f->save_folder.'/'.$f->name);
              $this->db->where('id',$i->id);   
              $this->db->delete('files');
           }
       }
       
       $Image=$this->ImagePerPost($id);
       if (count($Image)>0){
           foreach($Image as $i){
              unlink($i->save_folder.'/'.$i->name);
              $this->db->where('id',$i->id);   
              $this->db->delete('files');
           }
       }
       
        // categorias    
        $this->db->where('post_id',$id);   
        $this->db->delete('posts_categories');
        //archivos
        $this->db->where('post_id',$id);
        $this->db->delete('post_file');
        //videos
        $this->db->where('post_id',$id);
        $this->db->delete('post_video');

        // imagens
        $this->db->where('post_id',$id);
        $this->db->delete('post_image');
        //post
        $this->db->where('id', $id)->delete($this->table);
        
    }
    
    
    function FilePerPost($post_id){
       $this->db->select('
            files.id,
        	files.save_folder,
        	post_file.post_id,
        	post_file.file_id,
        	files.name
       ')
       ->from('files')
       ->join('post_file','post_file.file_id = files.id')
       ->where('post_id',$post_id);
       $query = $this->db->get();
       return $query->result();
    }
    
    function ImagePerPost($post_id){
       $this->db->select('
            image_id,
            files.id,
            files.name,
            files.save_folder
       ')
       ->from('post_image')
       ->join('files','post_image.image_id = files.id')
       ->where('post_id',$post_id);
       $query = $this->db->get();
       return $query->result();
    }
    


    function activatePost($status,$post_id)
    {
        $this->db->trans_start();
        $this->db->set('status', $status, FALSE);
        $this->db->where('id', $post_id);
        $this->db->update($this->table);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function highlightPost($status,$post_id)
    {
        $this->db->trans_start();
        $this->db->set('highlight', $status, FALSE);
        $this->db->where('id', $post_id);
        $this->db->update($this->table);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }


     public function isActivePost($post_id){
         $query=$this->db->select('id')->where('id',$post_id)->where('status',1)->get($this->table);
         if($query->num_rows()){
            return true;
         };

         return false;
     }  

    public function isHighlightPost($post_id)
    {
         $query=$this->db->select('id')->where('id',$post_id)->where('highlight',1)->get($this->table);
         if($query->num_rows()){
            return true;
         };
         return false;
    } 


    public function PostByCategory($params=array())
    {
      
        $this->db->select('
            post.id,
            post.title,
            post.slug post_slug,
            post.short_description,
            post.long_description,
            post.image,
            post.galery_id,
            post.files_id,
            post.inhome,
            post.date_add,
            post.date_update,
            post.created_by,
            post.highlight,
            post.`status`,
            posts_categories.post_id,
            posts_categories.category_id,
            categories.`name` category_name,
            categories.slug  category_slug
        ')
        ->from('post')
        ->join('posts_categories','post.id = posts_categories.post_id')
        ->join('categories','categories.id = posts_categories.category_id')
        ->where('post.status',1)
        ->where('categories.slug ',$params['slug']);

        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        } 

        $query = $this->db->get();
        return $query->result();
    }

    
    public function PostBySlug($post_slug)
    {
            $this->db->select('
                post.id,
                post.title,
                post.slug post_slug,
                post.short_description,
                post.long_description,
                post.image,
                post.galery_id,
                post.files_id,
                post.inhome,
                post.date_add,
                post.date_update,
                post.created_by,
                post.highlight,
                post.`status`
            ')
            ->from('post')
            ->where('post.status',1)
            ->where('post.slug ',$post_slug);
            $query = $this->db->get();
            return $query->result();
    }


    public function RecenPostHome()
    {
        $this->db->select('
            post.id,
            post.title,
            post.slug,
            post.image,
            post.date_add
        ')
        ->from('post')
        ->where('post.status',1)
        ->order_by('date_add', 'desc')
        ->limit(4);
        $query = $this->db->get();
        return $query->result();
    }

    function RecenPost($slug=''){
        
      
        $this->db->select(
          '
            post.id,
            post.title,
            post.slug,
            post.image,
            post.date_add
          '
        );
        $this->db->from($this->table);
        $this->db->join('posts_categories','post.id = posts_categories.post_id');
        $this->db->join('categories','posts_categories.category_id = categories.id');
        if ($slug!=""){
            $this->db->where('categories.slug',$slug);
        }
        $this->db->limit(4);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }
    
    function AttachedFiles($id)
    {
        $this->db->select('
            files.id,
            files.`name`,
            files.real_name,
            files.save_folder,
            files.type,
            files.`status`,
            files.upload_at,
            post_file.post_id,
            post_file.file_id
        ')
        ->from('files')
        ->join('post_file','files.id = post_file.file_id')
        ->where("post_id",$id);
        $query = $this->db->get();
        return $query->result();
    }


    function AttachedVideos($id)
    {
        $this->db->select('
            video.id,
            video.title,
            video.image,
            video.url,
            video.create_at,
            post_video.post_id,
            post_video.video_id
        ')
        ->from('video')
        ->join('post_video','post_video.video_id = video.id')
        ->where("post_id",$id);
        $query = $this->db->get();
        return $query->result();
    }
 

    function AttachedImages($id)
    {
        $this->db->select('
            files.id,
            files.name,
            files.thumb,
            files.save_folder,
            post_image.post_id,
            post_image.image_id
        ')
        ->from('post_image')
        ->join('files','post_image.image_id = files.id')
        ->where("post_id",$id);
        $query = $this->db->get();
        return $query->result();
    }
 


    public function get_datatables($param = array())
    {
        $this->_get_datatables_query($param);
        if ($param['length'] != - 1)
        $this->db->limit($param['length'], $param['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all()
    {
        $this->db
        ->select('*')
        ->from($this->table);
        return $this->db->count_all_results();
    }

    
    
    function count_filtered($param)
    {
        $this->_get_datatables_query($param);
        $query = $this->db->get();
        return $query->num_rows();
    }

    private function _get_datatables_query($params = null)
    {
        $this->db
        ->select('
            post.id,
            post.title,
            post.date_add,
            post.highlight,
            post.status
         ')
        ->from($this->table);
        
        $i = 0;
        foreach ($this->column_search as $item) // loop column
        {
            if ($params['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $params['search']['value']);
                } else {
                    $this->db->or_like($item, $params['search']['value']);
                }
                
                if (count($this->column_search) - 1 == $i) // last loop
                    $this->db->group_end(); // close bracket
            }
            $i ++;
        }
        
        if (isset($params['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$params['order']['0']['column']], $params['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
}