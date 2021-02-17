<div class="shop-sidebar fix">
	<div class="sin-shop-sidebar shop-category">
		<h2>CATEGORIAS</h2>
	</div>

    <div class="sin-shop-sidebar shop-category">
       
            
            <?php
       echo "<ul class='sidebar-menu'>";
        $this->db
                ->select('category_id,category_name,category_parent_id,category_status,category_friendly_name')
                ->from('category')
                ->where('category_status', 1)
                ->where('category_parent_id', 0);
        $query = $this->db->get();
        $data = $query->result();


        foreach ($data as $lvl1) {
            echo "<li>";
            echo "<a href='javascript:;'><span>" .$lvl1->category_name. "</span>".  '<i class="fa fa-angle-left pull-right"></i>'  . "</a>";
            $this->db
                    ->select('category_id,category_name,category_parent_id,category_status,category_friendly_name')
                    ->from('category')
                    ->where('category_status', 1)
                    ->where('category_parent_id', $lvl1->category_id);
            $query = $this->db->get();
            $data2 = $query->result();
            echo "<ul class='sidebar-submenu'>";
            foreach ($data2 as $lvl2) {
                echo "<li><a href='javascript:;'>" . $lvl2->category_name . "</a>";
                
                $this->db
                    ->select('category_id,category_name,category_parent_id,category_status,category_friendly_name')
                    ->from('category')
                    ->where('category_status', 1)
                    ->where('category_parent_id', $lvl2->category_id);
                $query = $this->db->get();
                $data3 = $query->result();
                echo "<ul class='sidebar-submenu'>";
                foreach ($data3 as $lvl3){
                    echo "<li><a href='".base_url('/productos/') . $lvl1->category_friendly_name.'/'.$lvl2->category_friendly_name.'/'.$lvl3->category_friendly_name.   "'>" . $lvl3->category_name . "</a>";
                }
                echo "</ul>";
                echo "</li>";
                
                
            }
            echo "</ul>";
            echo "</li>"; 
            

        }    
            
        echo "</ul>";
       ?>
            
          <?php /*$base_categories=get_base_categories();?>
                  <?php foreach ($base_categories as $cat): ?>
                    <li >
                        <a href="javascript:;">
                            <span><?php echo $cat->category_name ?></span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                         <?php list_tree_cat_id($cat->category_id); ?>
                    </li>
                  <?php endforeach; */?>
       
    </div>

     
    
    
<!--
	<a<div class="sin-shop-sidebar shop-add">
		<h2>MARCAS</h2>
		<ul>
        <li><a href="#">Cannondale</span></a></li>
        <li><a href="#">GT</span></a></li>
        <li><a href="#">Caloi</span></a></li>
		</ul>
	</div>
    <div class="sin-shop-sidebar shop-brands">
        <h2>POR PRECIO</h2>
        <ul>
            <li><a href="#">1-500000</span></a></li>
            <li><a href="#">500001-1000000</a></li>
            <li><a href="#">1000001 - 1500000</a></li>
            <li><a href="#">1500001 - 2000000</a></li>
        </ul>
    </div>-->
</div>