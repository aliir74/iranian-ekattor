<?php
$pending_book_requests = $this->db->get_where('book_request', array('status' => 0))->num_rows();

$this->db->select_sum('total_copies', 'total_copies');
$query = $this->db->get('book');
$result = $query->result();
$total_copies = $result[0]->total_copies;

$this->db->select_sum('issued_copies', 'issued_copies');
$query = $this->db->get('book');
$result = $query->result();
$issued_copies = $result[0]->issued_copies;
?>

<hr />

<div class="row">
    
    <div class="col-md-3">
    
        <div class="tile-stats tile-red">
            <div class="icon" style="margin-bottom: 20px;"><i class="entypo-book"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('book');?>" 
            		data-postfix="" data-duration="1500" data-delay="0">0</div>
            
            <h3><?php echo get_phrase('total_books');?></h3>
        </div>
        
    </div>

    <div class="col-md-3">
    
        <div class="tile-stats tile-green">
            <div class="icon" style="margin-bottom: 20px;"><i class="entypo-arrows-ccw"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $pending_book_requests; ?>" 
            		data-postfix="" data-duration="800" data-delay="0">0</div>
            
            <h3><?php echo get_phrase('pending_book_requests');?></h3>
        </div>
        
    </div>

    <div class="col-md-3">
    
        <div class="tile-stats tile-aqua">
            <div class="icon" style="margin-bottom: 20px;"><i class="entypo-docs"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $total_copies; ?>" 
            		data-postfix="" data-duration="500" data-delay="0">0</div>
            
            <h3><?php echo get_phrase('total_copies');?></h3>
        </div>
        
    </div>

    <div class="col-md-3">
    
        <div class="tile-stats tile-blue">
            <div class="icon" style="margin-bottom: 20px;"><i class="entypo-check"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $issued_copies; ?>" 
        		data-postfix="" data-duration="500" data-delay="0">0</div>
            
            <h3><?php echo get_phrase('issued_copies');?></h3>
        </div>
        
    </div>
	
</div>

  












