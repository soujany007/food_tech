<?php
/***** http://beski.wordpress.com ******/
/* Version 2: show some number of page links */
class paginator {
        var  $per_page, $cur_page, $tot_pages, $offset;
        
        function __construct($total=1, $per_page=10, $cur_page=1) {
                $this->per_page = $per_page;
                $this->cur_page = $cur_page;
                $this->tot_pages = ceil($total/$per_page);
        }
        
        function get_links($display=10) {
                $page_link = "<div id='pages' class='pagelist'><ul class='pagination'>";
                //if display is not odd make it odd
                if(!$display&1)
                {
                     $display++;
                }
                
                //previous link - if current page is first page: no link
                if ($this->cur_page > 1) {
                        $prev  = $this->cur_page - 1;
                        $page_link .= " <li><a href='javascript:void(0);' onclick=\"submitPagination('".$prev."')\">← Prev</a> </li>";
                }
                else {
                        $page_link .= "<li class='prev'><a href='#'>← Prev</a></li>";
                }
                
                //define the starting page no link and end
                $side_display = floor($display/2);
                $start = 1;
                $end = $this->tot_pages;
                if($this->tot_pages > $display)
                {
                        if($this->cur_page > $side_display)
                                $start = $this->cur_page - $side_display;
                        else
                                $end = $display;
                        
                        if(($this->cur_page + $side_display) < $this->tot_pages)
                        {
                                if($this->cur_page > $side_display)
                                        $end = $this->cur_page + $side_display;
                        }
                        else
                                $start = ($this->tot_pages - $display) + 1;
                }
                        
                //page links with number - current page number: no link
                for($i = $start; $i <= $end; $i++) {
                        if ($i == $this->cur_page)
                                $page_link .= "<li class='active'> <a href=''#'>$i</a> </li>";
                        else
                                $page_link .= " <li><a href='javascript:void(0);' onclick=\"submitPagination('".$i."')\">$i</a></li> ";
                }
                
                //next link - if current page is last page: no link
                if ($this->cur_page < $this->tot_pages) {
                        $next = $this->cur_page + 1;
                        $page_link .= " <li><a href='javascript:void(0);' onclick=\"submitPagination('".$next."')\" class='next'>Next → </a> </li>";
                }
                else {
                        $page_link .= "<li class='next'><a href='#'> Next → </a></li>";
                }
                $page_link .= "</ul></div>";
                return $page_link;
        }
}
?>
